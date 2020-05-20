class Flipbook {
    constructor({
        wrap, 
        next,
        prev,
        delay = 500,
        startBtn
    }) {
        this.wrap = document.querySelector(wrap)
        this.children = document.querySelector(wrap).children
        this.next = document.querySelector(next)
        this.prev = document.querySelector(prev)
        this.position = null
        this.maxPosition = this.children.length
        this.delay = delay
        this.startBtn = startBtn ? document.querySelector(startBtn) : ''
    }

    init() {
        this.prev.addEventListener('click', this.prevPage)
        this.next.addEventListener('click', this.nextPage)


        if (this.position == null) {
            this.prev.classList.add('disabled')
            this.next.classList.add('disabled')
        }
        for(let index = 0; index < this.children.length; index++) {
            this.children[index].style.zIndex = 1
            this.delay ? this.children[index].style.transition = 'transform ' + this.delay/1000 + 's ease, opacity ' + this.delay/2000 + 's ease' : ''
        }
    }

    prevPage = () => {
        if ( this.position >= 2) {
            this.position -= 2
        }
        let prev = this.position
        let current = this.position + 1
        let next = this.position + 2
        
        this.children[prev].style.transform = 'rotateY(0)'
        this.children[current].style.transform = 'rotateY(0)'

        this.children[prev].style.zIndex = parseInt(this.children[prev].dataset.count) - 1
        this.children[current].style.zIndex = parseInt(this.children[current].dataset.count) - 1
        this.children[next].style.zIndex = parseInt(this.children[next].dataset.count) - 1

        this.children[current].style.opacity = 0
        setTimeout(() => {
          this.children[next].style.opacity = 0
        }, 100);

        this.controls()
        
    }
    nextPage = () => {
        if ( this.position < this.maxPosition - 2) {
            this.position += 2
        }
        let prev = this.position - 2
        let current = this.position - 1
        let next = this.position
        
        this.children[prev].style.transform = 'rotateY(-180deg)'
        this.children[current].style.transform = 'rotateY(-180deg)'

        this.children[prev].style.zIndex = parseInt(this.children[prev].dataset.count) + 1
        this.children[current].style.zIndex = parseInt(this.children[current].dataset.count) + 1
        this.children[next].style.zIndex = parseInt(this.children[next].dataset.count) + 1

        this.children[current].style.opacity = 1
        setTimeout(() => {
          this.children[next].style.opacity = 1
        }, 100);

        this.controls()
    }

    controls = () => {
        
        if (this.position == 0) {
            this.prev.classList.add('disabled')
            this.next.classList.add('disabled')
        } else {
            this.prev.classList.contains('disabled') ? this.prev.classList.remove('disabled') : ''
            this.next.classList.contains('disabled') ? this.next.classList.remove('disabled') : ''
        }

        if (this.position >= this.maxPosition - 2) {
            this.next.classList.add('disabled')
        } 

        if (this.startBtn && this.position > 0) {
            this.startBtn.classList.add('disabled')
        } else if (this.startBtn && this.position == 0) {
            this.startBtn.classList.remove('disabled')
        }
    }
}