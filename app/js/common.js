let width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth
const preventDefault = (e) => {
    e.preventDefault();
}
const disableScroll = () => {
    if ( width < 767 ) {
        document.body.classList.add('no-scroll')
    } else {
        document.body.addEventListener('touchmove', preventDefault, { passive: false });
        window.addEventListener('DOMMouseScroll', preventDefault, false);
        document.addEventListener('wheel', preventDefault, {passive: false});
    }
}
const enableScroll = () => {
    if ( width < 767 ){
        document.body.classList.remove('no-scroll')
    } else {
        document.body.removeEventListener('touchmove', preventDefault, { passive: false });
        window.removeEventListener('DOMMouseScroll', preventDefault, false);
        document.removeEventListener('wheel', preventDefault, {passive: false});
    }
}

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
        this.children[next].style.opacity = 0

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
        this.children[next].style.opacity = 1

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

document.addEventListener("DOMContentLoaded", function() {

    const navMenu = document.querySelector('.navbar-menu')
    const hamburger = document.querySelector('.hamburger')

    const openMenu = () => {
        const close = document.createElement('span')
        close.classList.add('closeMenu')

        navMenu.classList.add('fade')
        hamburger.classList.add('open')
        setTimeout(() => {
            navMenu.classList.add('open')
            navMenu.appendChild(close)
        }, 100);
        close.addEventListener('click', closeMenu)
        document.addEventListener('click', (e) => { 
            navMenu.classList.contains('open') && !e.target.contains(navMenu) ? closeMenu() : '' 
        })
    }

    const closeMenu = () => {
        const close = document.querySelector('.navbar-menu .closeMenu')
        navMenu.classList.remove('open')
        hamburger.classList.remove('open')
        setTimeout(() => {
            navMenu.classList.remove('fade')
            close.parentNode.removeChild(close)
        }, 100);
        // close.removeEventListener('click', closeMenu)
    }
    
    hamburger.addEventListener('click', openMenu)


    const anchors = document.querySelectorAll('.line-hover');
    for (let anchor of anchors) {
        anchor.addEventListener('click', function (e) {
            e.preventDefault()
            let block = anchor.getAttribute('href');

            const blockID = block.replace('/','');
            
            document.querySelector('' + blockID).scrollIntoView({
            behavior: 'smooth',
            block: 'start'
            })
        })
    };
    
    const form = document.querySelectorAll('.callback__form');
    form.forEach(item => {
        const formBtn = item.querySelector('.callback__form__button');
        const checkBtn = item.querySelector('.robot__check');

        formBtn.disabled = true;
        checkBtn.addEventListener('click', () => {
            checkBtn.classList.add('active');
        
            item.action = '/thankyou.php';
            const input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", "human");
            input.setAttribute("value", "human");
            input.classList.add('human');
            item.appendChild(input);
            formBtn.disabled = false;
        })
    })

    const photoGallery = document.querySelectorAll('.photo--item')

    const openGallery = (e) => {
        e.preventDefault();
        const div = document.createElement('div')
        const sliderBlock = document.createElement('div')
        const sliderTitle = document.createElement('div')
        const sliderProgress = document.createElement('div')
        div.classList.add('js-gallery')
        sliderTitle.classList.add('js-gallery-title')
        sliderBlock.classList.add('js-gallery-block')
        sliderProgress.classList.add('js-gallery-progress')
        
        let currentIndex = parseInt(e.target.dataset.count)
        let maxIndex
        width > 991 ? maxIndex = photoGallery.length-2 : maxIndex = photoGallery.length-1

        document.body.appendChild(div)
        div.innerHTML = '<div class="close"></div>'
        div.appendChild(sliderTitle)
        div.appendChild(sliderBlock)

        photoGallery.forEach(item => {
            const wrap = document.createElement('div')
            const link = document.createElement('span')
            wrap.appendChild(item.querySelector('img').cloneNode(true))
            link.innerHTML = '<a href="'+ item +'" download></a>'
            wrap.appendChild(link)
            sliderBlock.appendChild(wrap)
        })

        sliderTitle.appendChild(photoGallery[currentIndex].querySelector('.text-bottom').cloneNode(true))

        $('.js-gallery-block').slick({
            draggable: true,
            slidesToShow: 2,
            swipeToSlide: true,
            infinite: false,
            dots: false,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
        $('.js-gallery-block').slick('slickGoTo', currentIndex)

        disableScroll()

        div.appendChild(sliderProgress)
        sliderProgress.innerHTML = `<div class="js-gallery-thumb"></div><div class="js-gallery-count"><p class="start">0</p><p class="end">${width > 991 ? maxIndex+2 : maxIndex + 1}</p></div>`
        currentIndex != 0 ? sliderProgress.querySelector('.js-gallery-thumb').style.width = (currentIndex/maxIndex)*100 + '%' : sliderProgress.querySelector('.js-gallery-thumb').style.width = ''


        $('.js-gallery-block').on('beforeChange', function(event, slick, currentSlide, nextSlide){
            nextSlide != 0 ? sliderProgress.querySelector('.js-gallery-thumb').style.width = (nextSlide/maxIndex)*100 + '%' : sliderProgress.querySelector('.js-gallery-thumb').style.width = ''
            sliderTitle.innerHTML = ''
            sliderTitle.appendChild(photoGallery[nextSlide].querySelector('.text-bottom').cloneNode(true))
        });

        document.querySelector('.close').addEventListener('click', closeGallery)
    }

    const closeGallery = (e) => {
        const jsGallery = document.querySelector('.js-gallery')
        jsGallery.parentElement.removeChild(jsGallery)
        $('.js-gallery-block').slick('unslick')
        enableScroll()
    }

    photoGallery.forEach((item,i) => {
        item.addEventListener('click', openGallery)
    })

    const myFlipbook = new Flipbook({
        wrap: '#flipbook',
        prev: 'button.prev',
        next: 'button.next',
        delay: 500,
        startBtn: '.open-menu'
    });
    myFlipbook.init()

    document.querySelector('.open-menu').addEventListener('click', function() {
        document.querySelector('.open-menu').classList.add('disabled')        
        myFlipbook.nextPage()
    })



    // const openFlipbook = document.querySelector('.open-menu')
    // openFlipbook.addEventListener('click', function() {
    //     flipbookChildren[0].classList.add('last')
    // })
    

});


$( document ).ready(function() {

    $('#navbarToggle').on('show.bs.collapse', function () {
        $('.hamburger').addClass('open')
    })
    $('#navbarToggle').on('hide.bs.collapse', function () {
        $('.hamburger').removeClass('open')
    })

    // $(".phone_mask").mask("8-999-999-99-99");

    // $('.lazy').Lazy();
});