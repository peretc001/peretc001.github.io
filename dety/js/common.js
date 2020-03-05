document.addEventListener("DOMContentLoaded", function() {

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
    if ( width < 767 ) { 
        document.body.classList.remove('no-scroll') 
    } else {
        document.body.removeEventListener('touchmove', preventDefault, { passive: false });
        window.removeEventListener('DOMMouseScroll', preventDefault, false);
        document.removeEventListener('wheel', preventDefault, {passive: false});
    }
}
//Modal
if (document.querySelector('.modal')) {
    const   modal = document.querySelector('.modal')
            modalList = document.querySelectorAll('[data-toggle="modal"]')
            openCityList = document.querySelector('.open-city-list')
            userHelp = document.querySelector('.nav-top__right__user')

            const hideModalCloseBtn = () => {
                if ( event.target.dataset.close == 'close' ) {
                    hModal()
                    document.removeEventListener('click', hideModalEsc())
                }
            }
            const hideModalEsc = () => {
                if (event.keyCode == 27) {
                    hModal()
                    document.removeEventListener('click', hideModalCloseBtn())
                }
            }
            
            const hModal = () => {
                modal.querySelector('.is-active') ? modal.querySelector('.is-active').classList.remove('is-active') : ''
                setTimeout(() => {
                    modal.querySelector('.is-fade') ? modal.querySelector('.is-fade').classList.remove('is-fade') : ''
                }, 200);
                setTimeout(() => {
                    modal.classList.remove('is-active')
                }, 200);
                setTimeout(() => {
                    modal.classList.contains('in') ? modal.classList.remove('in') : ''
                    modal.classList.contains('in-menu') ? modal.classList.remove('in-menu') : ''
                    if (modal.style.background) modal.style.background = ''
                }, 200);
                document.querySelector('.hamburger').classList.remove('open')
                enableScroll()
            }
            const hideModal = () => {
                hModal()
                document.removeEventListener('keydown', hideModalEsc())
                document.removeEventListener('click', hideModalCloseBtn())
            }
            const showModal = (event) => {
                event.target.dataset.target == 'menu' ? '' : disableScroll()
                event.target.dataset.target == 'menu' ? document.querySelector('.hamburger').classList.add('open') : ''
                if (event.target.dataset.target == 'review') {
                    document.querySelector('.rating-area').addEventListener('mouseover', () => {
                        document.querySelector('#star-5').checked = false
                    })
                }
                const current = document.querySelector('[data-modal="'+ event.target.dataset.target +'"]')
                event.target.dataset.target == 'menu' ? modal.classList.add('in-menu') : modal.classList.add('in')
                current.classList.add('is-fade')
                setTimeout(() => {
                    modal.classList.add('is-active')
                    current.classList.add('is-active')
                    current.getAttribute('data-modal') == 'login' ? current.querySelector('.phone-mask').focus() : ''
                    current.getAttribute('data-modal') == 'oneclick' ? current.querySelector('.name').focus() : ''
                }, 150);
                document.addEventListener('keyup', hideModalEsc)
                document.addEventListener('click', hideModalCloseBtn)
            }

            let userHovered = false
            const showModalOnHover = (event) => {
                if (userHovered == false && !modal.classList.contains('is-active')) {
                    showModal(event)
                    userHovered = true
                    modal.addEventListener('mouseover', hideModalOnHover)
                }
            }
            const hideModalOnHover = (event) => {
                if (userHovered == true && event.target.contains(modal)) {
                    hideModal()
                    userHovered = false
                    modal.removeEventListener('mouseover', hideModalOnHover)
                }
            }

            userHelp.addEventListener('mouseenter', showModalOnHover)
            


            const showCityList = () => {

            }
            
            loginForm = document.querySelector('.modal-body .signin')
            phone = loginForm.querySelector('#phone')
            inputSMS = modal.querySelectorAll('.sms-input')
            
            loginForm.addEventListener('submit', (e) => {
                e.preventDefault()
                console.log(phone.value)
                //////// ЗАПРОС НА API /////////
                modal.querySelector('.is-active').classList.remove('is-active')
                setTimeout(() => {
                    modal.querySelector('.is-fade').classList.remove('is-fade')
                }, 200);
                modal.querySelector('.modal-body.sms').classList.add('is-fade')
                setTimeout(() => {
                    modal.querySelector('.modal-body.sms').classList.add('is-active')
                }, 200);

                inputSMS[0].focus();
                inputSMS[0].addEventListener('keyup', function() {
                    this.value != '' ? inputSMS[1].focus() : ''
                })
                inputSMS[1].addEventListener('keyup', function() {
                    this.value != '' ? inputSMS[2].focus() : inputSMS[0].focus()
                })
                inputSMS[2].addEventListener('keyup', function() {
                    this.value != '' ? inputSMS[3].focus() : inputSMS[1].focus()
                })
                inputSMS[3].addEventListener('keyup', function() {
                    if (this.value != '') {
                        modal.querySelector('.modal-body.sms').classList.remove('is-active')
                        setTimeout(() => {
                            modal.querySelector('.modal-body.sms').classList.remove('is-fade')
                            this.blur()
                        }, 200);
                        setTimeout(() => {
                            modal.classList.remove('is-active')
                        }, 200);
                        setTimeout(() => {
                            modal.classList.remove('in')
                        }, 200);
                        enableScroll()
                    } else inputSMS[2].focus()
                })
            })

            openCityList.addEventListener('click', () => {
                hideModal()
            })
            
            modalList.forEach(elem => {
                elem.addEventListener('click', (event) => {
                    event.preventDefault()
                    if ( modal.classList.contains('is-active') ) {
                        hideModal()
                    } else {
                        showModal(event)
                    }
                })
            })
            modal.addEventListener('click', (event) => event.target == modal ? hideModal() : '')

            const showCityOnLoad = () => {
                let city = localStorage.getItem('city')
                if (!city) {
                    disableScroll()
                    const current = document.querySelector('[data-modal="city"]')
                    modal.classList.add('in')
                    current.classList.add('is-fade')
                    setTimeout(() => {
                        modal.classList.add('is-active')
                        current.classList.add('is-active')
                    }, 200);
                    document.addEventListener('keyup', hideModalEsc)
                    document.addEventListener('click', hideModalCloseBtn)
                    localStorage.setItem('city', 'Санкт-Петербург')
                }
            }

            window.onload = showCityOnLoad()

            const btnInModalMenu = document.querySelectorAll('[data-mobile="yes"]')
            btnInModalMenu.forEach(elem => {
                elem.addEventListener('click', (event) => {
                    event.preventDefault()
                    hModal()
                    setTimeout(() => {
                        showModal(event)
                        event.target.dataset.target == 'login' ? modal.querySelector('.phone-mask').blur() : ''
                    }, 300);
                    setTimeout(() => {
                        event.target.dataset.target == 'login' ? modal.querySelector('.phone-mask').focus() : ''
                    }, 600);
                    
                })
            });
            

}

//Show Hide Elem
{
    if ( document.querySelector('.hideElem') ) {
        const   hElem = document.querySelectorAll('.hideElem')
                sElem = document.querySelectorAll('.showElem')
                sMore = document.querySelectorAll('.showMore')

        hElem.forEach((item, i) => {
            function scrollStart() {
                let x = window.pageYOffset;
                if ( item.getAttribute('data-scroll') && item.classList.contains('active') ) {
                    for (let i = 0; i < 500; i++) {
                        if ( i < 500) {
                            x = x + i;
                        }
                        setTimeout(() => {
                            window.scroll(window.pageXOffset, x);
                        }, 300);
                    }
                }
            }
            item.addEventListener('click', scrollStart)
            item.addEventListener('click', () => {
                !item.classList.contains('active') ? item.classList.add('active') : item.classList.remove('active')
                !sElem[i].classList.contains('active') ? sElem[i].classList.add('active') : sElem[i].classList.remove('active')
            })
            if (sMore[i]) {
                sMore[i].addEventListener('click', () => {
                    !item.classList.contains('active') ? item.classList.add('active') : item.classList.remove('active')
                    !sElem[i].classList.contains('active') ? sElem[i].classList.add('active') : sElem[i].classList.remove('active')
                    !sMore[i].classList.contains('active') ? sMore[i].classList.add('active') : sMore[i].classList.remove('active')  
                })
            }
        })
    }
}

     
//Products-page Tabs
{
    if ( document.querySelector('.tabs') ) {
        const   tabs = [...document.querySelector('.tabs').children]
                tabsItem = document.querySelectorAll('.tabs-item')

                tabs.forEach((item,i) => {
                    item.addEventListener('click', () => {
                        tabs.forEach(item => item.classList.contains('active') ? item.classList.remove('active') : '')
                        tabsItem.forEach(item => item.classList.contains('active') ? item.classList.remove('active') : '')
                        item.classList.add('active')
                        tabsItem[i].classList.add('active')
                    })
                })
    }
}
    

//Phone mask
{
    function setCursorPosition(pos, elem) {
        elem.focus();
        if (elem.setSelectionRange) elem.setSelectionRange(pos, pos);
        else if (elem.createTextRange) {
            var range = elem.createTextRange();
            range.collapse(true);
            range.moveEnd("character", pos);
            range.moveStart("character", pos);
            range.select()
        }
    }
    function mask(event) {
        var matrix = "+7 (___) ___ ____",
            i = 0,
            def = matrix.replace(/\D/g, ""),
            val = this.value.replace(/\D/g, "");
        if (def.length >= val.length) val = def;
        this.value = matrix.replace(/./g, function(a) {
            return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? "" : a
        });
        if (event.type == "blur") {
            if (this.value.length == 2) this.value = ""
        } else setCursorPosition(this.value.length, this)
    };
    var input = document.querySelectorAll(".phone-mask")
    input.forEach(elem => {
        elem.addEventListener("input", mask, false);
        elem.addEventListener("focus", mask, false);
        elem.addEventListener("blur", mask, false);
    })
}








    
});

$( document ).ready(function() {
    // Back to top button
	var backToTop = function() {
        var el = $( '#toTop' );
        el.hide()
		$( window ).scroll(function() {
			if( $( this ).scrollTop() < 50 ) {
				el.fadeOut();
			} else {
				el.fadeIn();
			}
		});
		el.click( function() {
			$( 'body,html' ).animate({
				scrollTop: 0
			}, 500);
			return false;
		});
    }
    backToTop()
    $('.lazy').Lazy();
});




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