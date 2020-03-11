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

            loginForm = document.querySelector('.modal-body .signin')
            inputSMS = modal.querySelectorAll('.sms-input')

            let city = localStorage.getItem('city')
            
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
                }, 200);
                document.querySelector('.hamburger').classList.remove('open')
                modal.querySelectorAll('input').forEach(item => item.blur())
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
                    current.getAttribute('data-modal') == 'review' ? current.querySelector('[name="user"]').focus() : ''
                    current.getAttribute('data-modal') == 'question' ? current.querySelector('[name="user"]').focus() : ''
                    current.getAttribute('data-modal') == 'oneclick' ? current.querySelector('.name').focus() : ''
                }, 150);
                document.addEventListener('keyup', hideModalEsc)
                document.addEventListener('click', hideModalCloseBtn)
            }  
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

            //document.body.ontouchend = function() { document.querySelector('.phone-mask').focus(); };
            const showCityList = () => {}
            
            loginForm.addEventListener('submit', (e) => {
                e.preventDefault()
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
            
            const showCityOnLoad = () => {
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

            !city ? window.onload = showCityOnLoad() : ''

            const btnInModalMenu = document.querySelectorAll('[data-mobile="yes"]')
            btnInModalMenu.forEach(elem => {
                elem.addEventListener('click', (event) => {
                    event.preventDefault()
                    hModal()
                    setTimeout(() => {
                        showModal(event)
                    }, 300);                    
                })
            })

            modal.addEventListener('click', (event) => event.target == modal || event.target == modal.children[0] ? hideModal() : '')
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
    $('.lazy').Lazy({
        effect: "fadeIn",
        effectTime: 500,
        threshold: 0
    });
});