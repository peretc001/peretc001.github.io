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

            loginForm = document.querySelector('.modal-body .login-form')
            smsForm = document.querySelector('.modal-body .sms-form')
            smsInput = smsForm.querySelectorAll('.sms-input')
            smsComplete = document.querySelector('.modal-body .complete')

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
                if (event.target.dataset.target == 'login') {
                    smsForm.classList.remove('active')
                    smsForm.classList.remove('fade')
                    smsComplete.classList.remove('active')
                    smsComplete.classList.remove('fade')
                    loginForm.classList.add('fade')
                    loginForm.classList.add('active')
                }
                if (event.target.dataset.target == 'review') {
                    document.querySelector('.rating-area').addEventListener('mouseover', () => {
                        document.querySelector('#star-5').checked = false
                    })
                }
                const current = document.querySelector('[data-modal="'+ event.target.dataset.target +'"]')
                event.target.dataset.target == 'menu' || event.target.dataset.target == 'city' ? modal.classList.add('in-menu') : modal.classList.add('in')
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

            const showCityList = () => {}
            
            loginForm.addEventListener('submit', (event) => {
                event.preventDefault()
                loginForm.querySelector('.phone-mask').blur()
                loginForm.classList.remove('active')
                smsInput[0].value = ''; smsInput[1].value = ''; smsInput[2].value = ''; smsInput[3].value = ''
                setTimeout(() => {
                    setTimeout(() => {
                        smsForm.classList.add('fade')
                    }, 100);
                    loginForm.classList.remove('fade')
                    setTimeout(() => {
                        smsForm.classList.add('active')
                    }, 200);
                }, 100);
                
                setTimeout(() => {
                    smsInput[0].focus();
                    smsInput[0].addEventListener('keyup', function() {
                        this.value != '' ? smsInput[1].focus() : ''
                    })
                    smsInput[1].addEventListener('keyup', function() {
                        this.value != '' ? smsInput[2].focus() : smsInput[0].focus()
                    })
                    smsInput[2].addEventListener('keyup', function() {
                        this.value != '' ? smsInput[3].focus() : smsInput[1].focus()
                    })
                    smsInput[3].addEventListener('keyup', function() {
                        if (this.value != '') {
                            smsInput[3].blur()
                            smsForm.classList.remove('active')
                            setTimeout(() => {
                                setTimeout(() => {
                                    smsComplete.classList.add('fade')
                                }, 100);
                                smsForm.classList.remove('fade')
                                setTimeout(() => {
                                    smsComplete.classList.add('active')
                                }, 200);
                                setTimeout(() => {
                                   hModal()
                                }, 1000);
                            }, 100);
                        } else smsInput[2].focus()
                    })
                }, 500);
                
            })

            openCityList.addEventListener('click', (event) => {
                hModal()
                setTimeout(() => {
                    showModal(event)
                }, 300); 
            })
            
            const showCityOnLoad = () => {
                disableScroll()
                const current = document.querySelector('[data-modal="city"]')
                modal.classList.add('in-menu')
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

if ( document.querySelector('.hideElem') ) {
    const   hElem = document.querySelectorAll('.hideElem')
            sElem = document.querySelectorAll('.showElem')
            sMore = document.querySelectorAll('.showMore')

    hElem.forEach((item, i) => {
        function scrollStart() {
            let x = window.pageYOffset;
            if ( item.getAttribute('data-scroll') && item.classList.contains('active') ) {
                for (let i = 0; i < 1000; i++) {
                    if ( i < 1000) {
                        x = x + i;
                    }
                    setTimeout(() => {
                        window.scroll(window.pageXOffset, x);
                    }, 500);
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
    
//Products-page Tabs
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

});

$( document ).ready(function() {
    $('.lazy').Lazy({
        effect: "fadeIn",
        effectTime: 500,
        threshold: 0
    });

    $.fn.setCursorPosition = function(pos) {
        if ($(this).get(0).setSelectionRange) {
          $(this).get(0).setSelectionRange(pos, pos);
        } else if ($(this).get(0).createTextRange) {
          var range = $(this).get(0).createTextRange();
          range.collapse(true);
          range.moveEnd('character', pos);
          range.moveStart('character', pos);
          range.select();
        }
    };
    $('.phone-mask').on('click', function(){
        if ($(this).val() == '+7 (___) ___-__-__') $(this).setCursorPosition(4);
    })
    $('.phone-mask').mask("+7 (999) 999-99-99");
});