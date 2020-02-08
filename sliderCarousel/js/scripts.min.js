'use strict'
// common.js => BABEL => sliderCarousel.js

class SliderCarousel {
    constructor({
        id,
        main, 
        wrap, 
        next,
        prev,
        infinity = false,
        position = 0,
        slideToShow = 3,
        responsive = [] 
    }) {
        this.id = id,
        this.main = document.querySelector(main)
        this.wrap = document.querySelector(wrap)
        this.slides = document.querySelector(wrap).children
        this.postX1 = 0,
        this.postX2 = 0,
        this.next = document.querySelector(next)
        this.prev = document.querySelector(prev)
        this.slideToShow = slideToShow,
        this.options = {
            position,
            maxPosition: this.slides.length - this.slideToShow,
            infinity,
            slideCount : 100 / this.slideToShow
        },
        this.responsive = responsive;
    }

    init() {
        this.addSliderClass()
        this.addStyle(this.options.slideCount)

        if (this.prev && this.next) {
            this.controlSlider()
        } else {
            this.addArrow()
            this.controlSlider()
        }
        !this.options.infinity && this.options.position == 0 ? this.prev.classList.add('hidden') : this.prev.classList.remove('hidden')
        !this.options.infinity && this.options.maxPosition == 0 ? this.next.classList.add('hidden') : this.next.classList.remove('hidden')
        this.responsive ? this.responseInit() : ''
    }

    addSliderClass() {
        this.main.classList.add(`${this.id}-slider`)
        this.wrap.classList.add(`${this.id}-slider-wrap`)
        for( const item of this.slides) {
            item.classList.add(`${this.id}-slider-wrap--item`)
        }
    }

    addStyle(count) {
        const style = document.getElementById(`${this.id}-slider`) || document.createElement('style')
        style.id = this.id + '-slider'
        style.innerHTML = `
            .${this.id}-slider {
                overflow: hidden;
            }
            .${this.id}-slider-wrap {
                display:-webkit-box;
                display:-webkit-flex;
                display:-ms-flexbox;
                display: flex;
                transition: transform .5s ease;
                will-change: transform;
            }
            .${this.id}-slider-wrap--item {
                margin: auto 0;
                -webkit-box-flex:0;
                -webkit-flex:0 0 ${count}%;
                -ms-flex:0 0 ${count}%;
                flex:0 0 ${count}%
            }
        `;
        const body = document.body || document.querySelector('body')
        body.appendChild(style)
    }

    controlSlider() {
        this.prev.addEventListener('click', this.prevSlider)
        this.next.addEventListener('click', this.nextSlider)

        for( const item of this.slides) {
            item.addEventListener('touchstart', this.dragStart)
            item.addEventListener('touchmove',  this.dragAction)
            item.addEventListener('touchend',   this.dragEnd)
        }
    }

    prevSlider = () => {
        if ( this.options.infinity || this.options.position > 0 ) {
            --this.options.position
            if ( this.options.position < 0 ) {
                this.options.position = this.options.maxPosition
            }
            this.wrap.style.transform = `translateX(-${this.options.position * this.options.slideCount}%)`
            !this.options.infinity && this.options.position == 0 ? this.prev.classList.add('hidden') : this.prev.classList.remove('hidden')
            !this.options.infinity && this.options.position == this.options.maxPosition ? this.next.classList.add('hidden') : this.next.classList.remove('hidden')
        }
    }
    nextSlider = () => {
        if ( this.options.infinity || this.options.position < this.options.maxPosition) {
            ++this.options.position
            if ( this.options.position > this.options.maxPosition ) {
                this.options.position = 0
            }
            this.wrap.style.transform = `translateX(-${this.options.position * this.options.slideCount}%)`
            !this.options.infinity && this.options.position == 0 ? this.prev.classList.add('hidden') : this.prev.classList.remove('hidden')
            !this.options.infinity && this.options.position == this.options.maxPosition ? this.next.classList.add('hidden') : this.next.classList.remove('hidden')
        }
    }
    dragStart = (e) => {
        e = e || window.event
        if (e.type == 'touchstart') {
            this.postX1 = e.touches[0].clientX
        } else {
            this.postX1 = e.clientX
        }
    }
    dragAction = (e) => {
        e = e || window.event
        if(e.type == 'touchmove') {
            this.postX2 = this.postX1 - e.touches[0].clientX
            this.postX1 = e.touches[0].clientX
        } else {
            this.postX2 = this.postX1 - e.clientX
            this.postX1 = e.clientX
        }
    }
    dragEnd = () => {
        this.postX2 < 0 ? this.prevSlider() : this.nextSlider()
    }

    addArrow() {
        this.prev = document.createElement('button')
        this.next = document.createElement('button')

        this.prev.className = 'prev'
        this.next.className = 'next'

        this.prev.textContent = 'prev'
        this.next.textContent = 'next'

        this.main.appendChild(this.prev)
        this.main.appendChild(this.next)

        const style = document.createElement('style')
        style.id = this.id+'-slider--button'
        style.textContent = `
            ${this.id}-slider .prev.hidden,
            ${this.id}-slider .next.hidden {
                opacity: 0
            }
        `;
        const body = document.body || document.querySelector('body')
        body.appendChild(style)
    }

    responseInit() {
        const slidesToShowDefault = this.slideToShow
        const allBreakpoint = this.responsive.map(item => item.breakpoint)
        const maxResponse = Math.max(...allBreakpoint)
        
        const checkResponse = () => {
            const widthWindow = window.innerWidth || document.documentElement.clientWidth;
            if ( widthWindow < maxResponse ) {
                for (let i = 0; i < allBreakpoint.length; i++ ) {
                    if ( widthWindow < allBreakpoint[i] ) {
                        this.slideToShow = this.responsive[i].slideToShow
                        this.options.slideCount = 100 / this.slideToShow
                    }
                } 
            } else {
                this.slideToShow = slidesToShowDefault
                this.options.slideCount = 100 / this.slideToShow
            }
            this.addStyle(this.options.slideCount)
        }
        document.addEventListener("DOMContentLoaded", function() {
            checkResponse()
        })
        window.addEventListener('resize', () => {
            checkResponse()
        })

    }
}
