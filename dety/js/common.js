document.addEventListener("DOMContentLoaded", function() {

let width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth
let iOS = !!navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform)

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


//Menu 
if ( document.querySelector('nav') ) {
    const   catalogBtn = document.querySelectorAll('.hover-link')
            catalog = document.querySelector('.nav-catalog')
            div = document.createElement('div');

    div.classList.add('layout')
    function closeCatalogEvt(event) { event.target = div ? closeCatalog() : '' }

    let timer
    openCatalog = (e)  => event => {
        e.stopPropagation();
        if (catalog.querySelector('.nav-catalog__submenu.active')) {
            catalog.querySelector('.nav-catalog__submenu.active').classList.remove('active')
        }
        if (catalog.querySelector('.nav-catalog__submenu.fade')) {
            catalog.querySelector('.nav-catalog__submenu.fade').classList.remove('fade')
        }
        const current = catalog.querySelector('[data-submenu="'+e.target.dataset.menu+'"]')
        document.body.append(div)
        current.classList.add('fade')
        setTimeout(() => {
            current.classList.add('active')
        }, 100);
        div.addEventListener('mouseover', closeCatalogEvt)

        showParent = (e) => {
            if ( current.querySelector('.nav-catalog__general .active') ) current.querySelector('.nav-catalog__general .active').classList.remove('active')
            if (current.querySelector('.nav-catalog__parent.active')) {
                current.querySelector('.nav-catalog__parent.active').classList.remove('active')
            }
            if (current.querySelector('.nav-catalog__parent.fade')) {
                current.querySelector('.nav-catalog__parent.fade').classList.remove('fade')
            }
            current.querySelector(('[data-id="'+e.target.dataset.id+'"]')).classList.add('active')
            
            current.querySelector('[data-parent="'+e.target.dataset.id+'"]').classList.add('fade')
            current.querySelector('[data-parent="'+e.target.dataset.id+'"]').classList.add('active')
        }
        const catalogGeneral = current.querySelectorAll('.nav-catalog__general li a')
        // if ( current.querySelector('.nav-catalog__general a.active') ) current.querySelector('.nav-catalog__general .active').classList.remove('active')
        if ( !current.querySelector('.nav-catalog__general a.active') ) {
            catalogGeneral[0].classList.add('active')
        }
        if ( !current.querySelector('.nav-catalog__parent.active') ) {
            current.querySelector('.nav-catalog__parent').classList.add('fade')
            current.querySelector('.nav-catalog__parent').classList.add('active')
        }
        catalogGeneral.forEach(item => {
            item.addEventListener('mouseenter', showParent) 
        })
        
    }
    closeCatalog = () => {
        if (catalog.querySelector('.nav-catalog__submenu.active')) {
            catalog.querySelector('.nav-catalog__submenu.active').classList.remove('active')
        }
        setTimeout(() => {
            if (catalog.querySelector('.nav-catalog__submenu.fade')) {
                catalog.querySelector('.nav-catalog__submenu.fade').classList.remove('fade')
            }
            document.body.removeChild(div)
            div.removeEventListener('mouseover', closeCatalogEvt)
        }, 100)
    }
    catalogBtn.forEach(item => {
        item.addEventListener('mouseover', (e) => { timer = setTimeout(openCatalog(e), 300) })
        item.addEventListener('mouseout', () => { clearTimeout(timer) }) 
    })
    
}


//Modal
if (document.querySelector('.modal')) {
    const   modal = document.querySelector('.modal')
            modalList = document.querySelectorAll('[data-toggle="modal"]')
            
            openCityList = document.querySelector('.open-city-list')
            cityWrapp = modal.querySelector('.city-wrapper')
            citList = modal.querySelector('.city-list')

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
                document.body.classList.contains('no-scroll') ? document.body.classList.remove('no-scroll')  : ''
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
                enableScroll()
            }
            const hideModal = () => {
                hModal()
                document.removeEventListener('keydown', hideModalEsc())
                document.removeEventListener('click', hideModalCloseBtn())
            }
            const showModal = (event) => {
                event.target.dataset.target == 'menu' || event.target.dataset.target == 'size' ? '' : disableScroll()
                event.target.dataset.target == 'size' ? document.body.classList.add('no-scroll')  : ''
                event.target.dataset.target == 'menu' ? document.querySelector('.hamburger').classList.add('open') : ''
                if (event.target.dataset.target == 'login') {
                    smsForm.classList.remove('active')
                    smsForm.classList.remove('fade')
                    smsComplete.classList.remove('active')
                    smsComplete.classList.remove('fade')
                    loginForm.classList.add('fade')
                    loginForm.classList.add('active')
                }
                if (event.target.dataset.target == 'city') {
                    citList.classList.remove('active')
                    citList.classList.remove('fade')
                    cityWrapp.classList.add('fade')
                    cityWrapp.classList.add('active')
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
                }, 300);
                event.target.dataset.target == 'login' ? current.querySelector('.phone-mask').focus() : ''
                event.target.dataset.target == 'review' ? current.querySelector('[name="user"]').focus() : ''
                event.target.dataset.target == 'question' ? current.querySelector('[name="user"]').focus() : ''
                event.target.dataset.target == 'oneclick' ? current.querySelector('.name').focus() : ''

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
            
            openCityList.addEventListener('click', (event) => {
                cityWrapp.classList.remove('active')
                if (!iOS) {
                    setTimeout(() => {
                        setTimeout(() => {
                            citList.classList.add('fade')
                        }, 100);
                        cityWrapp.classList.remove('fade')
                        setTimeout(() => {
                            citList.classList.add('active')
                            citList.querySelector('input').focus()
                        }, 200);
                    }, 100);
                } else {
                    citList.classList.add('fade')
                    cityWrapp.classList.remove('fade')
                    citList.classList.add('active')
                    citList.querySelector('input').focus()
                }
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

            const smsInsert = (event) => {
                smsInput[0].focus();
                smsInput[0].addEventListener('keydown', function() {
                    this.value != '' ? smsInput[1].focus() : ''
                })
                smsInput[1].addEventListener('keydown', function() {
                    this.value != '' ? smsInput[2].focus() : smsInput[0].focus()
                })
                smsInput[2].addEventListener('keydown', function() {
                    this.value != '' ? smsInput[3].focus() : smsInput[1].focus()
                })
                smsInput[3].addEventListener('keyup', function() {
                    if (this.value != '') {
                        smsInput[3].blur()
                        smsForm.classList.remove('active')
                        setTimeout(() => {
                            setTimeout(() => {
                                smsComplete.classList.add('fade')
                                //Desctop
                                document.querySelector('.nav-top__right__login').classList.add('hidden')
                                document.querySelector('.nav-top__right__lk').classList.add('fade')
                                //Mobile
                                modal.querySelector('.menu .login').classList.add('hidden')
                                modal.querySelector('.menu .lk').classList.remove('hidden')
                                setTimeout(() => {
                                    document.querySelector('.nav-top__right__lk').classList.add('active')
                                }, 100);
                            }, 100);
                            smsForm.classList.remove('fade')
                            setTimeout(() => {
                                smsComplete.classList.add('active')
                            }, 200);
                            setTimeout(() => {
                                smsComplete.classList.add('rotate')
                                setTimeout(() => {
                                    hModal()
                                }, 1000);
                            }, 1000);
                        }, 100);
                    } else smsInput[2].focus()
                })
            }
            loginForm.addEventListener('submit', (event) => {
                event.preventDefault()
                loginForm.classList.remove('active')
                smsInput[0].value = ''; smsInput[1].value = ''; smsInput[2].value = ''; smsInput[3].value = ''
                if (!iOS) {
                    setTimeout(() => {
                        setTimeout(() => {
                            smsForm.classList.add('fade')
                        }, 100);
                        loginForm.classList.remove('fade')
                        setTimeout(() => {
                            smsForm.classList.add('active')
                            setTimeout(() => {
                                smsInsert()
                            }, 300);
                        }, 200);
                    }, 100);
                } else {
                    smsForm.classList.add('fade')
                    loginForm.classList.remove('fade')
                    smsForm.classList.add('active')
                    smsInsert()
                }
            })

            const hFastModal = () => {
                modal.querySelector('.is-active') ? modal.querySelector('.is-active').classList.remove('is-active') : ''
                modal.querySelector('.is-fade') ? modal.querySelector('.is-fade').classList.remove('is-fade') : ''
                modal.classList.remove('is-active')
                modal.classList.contains('in') ? modal.classList.remove('in') : ''
                modal.classList.contains('in-menu') ? modal.classList.remove('in-menu') : ''
                document.querySelector('.hamburger').classList.remove('open')
            }
            const btnShowLoginInMenu = modal.querySelector('.button.login')
            btnShowLoginInMenu.addEventListener('click', (event) => {
                event.preventDefault()
                if (iOS) {
                    hFastModal()
                    disableScroll()
                    const current = document.querySelector('.modal-body.login')
                    modal.classList.add('in')
                    current.classList.add('is-fade')
                    loginForm.classList.add('fade')
                    loginForm.classList.add('active')
                    modal.classList.add('is-active')
                    current.classList.add('is-active')
                    current.querySelector('.phone-mask').setAttribute('autofocus', 'autofocus');
                    current.querySelector('.phone-mask').focus()
                } else {
                    event.target.dataset.target = 'login'
                    hModal()
                    setTimeout(() => {
                        showModal(event)
                    }, 300);
                }
            })

            const btnShowCityInMenu = modal.querySelector('.button.city')
            btnShowCityInMenu.addEventListener('click', (event) => {
                event.preventDefault()
                setTimeout(() => {
                    showModal(event)
                }, 300);
            })

            modal.addEventListener('click', (event) => event.target == modal || event.target == modal.children[0] ? hideModal() : '')
}

if ( document.querySelector('.hideElem') ) {
    const   hElem = document.querySelectorAll('.hideElem')
            sElem = document.querySelectorAll('.showElem')
            sMore = document.querySelectorAll('.showMore')

    hElem.forEach((item, i) => {
        item.addEventListener('click', () => {
            !item.classList.contains('active') ? item.classList.add('active') : item.classList.remove('active')
            !sElem[i].classList.contains('active') ? sElem[i].classList.add('active') : sElem[i].classList.remove('active')
        })
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


let inputs = document.querySelectorAll('.phone-mask');

Array.prototype.forEach.call(inputs, function(input) {
    new InputMask({
        selector: input,
        layout: input.dataset.mask
    })
    input.addEventListener('click', function() {
        if (this.value == '+7') this.setSelectionRange(2,2);
    })
})

if ( document.querySelector('input[name="promo-code"]') ) {
    const promoCode = document.querySelector('input[name="promo-code"]')
    promoCode.addEventListener('focus', () => { promoCode.placeholder = '' })
    promoCode.addEventListener('blur', () => { promoCode.placeholder = 'Ваш промо-код' })
    new InputMask({
        selector: promoCode,
        layout: promoCode.dataset.mask
    })
}


});

function InputMask(options) {
    this.el = this.getElement(options.selector);
    if (!this.el) return console.log('Что-то не так с селектором');
    if (this.el == document.querySelector('input[name="promo-code"]')) {
        this.layout = options.layout || '____-____';
    }
    else {
        this.layout = options.layout || '+7 (___) ___-__-__';
    }

    this.maskreg = this.getRegexp();

    this.setListeners();
}

InputMask.prototype.getRegexp = function() {
    var str = this.layout.replace(/_/g, '\\d')
    str = str.replace(/\(/g, '\\(')
    str = str.replace(/\)/g, '\\)')
    str = str.replace(/\+/g, '\\+')
    str = str.replace(/\s/g, '\\s')

    return str;
}

InputMask.prototype.mask = function(e) {
    var _this = e.target,
        matrix = this.layout,
        i = 0,
        def = matrix.replace(/\D/g, ""),
        val = _this.value.replace(/\D/g, "");

    if (def.length >= val.length) val = def;

    _this.value = matrix.replace(/./g, function(a) {
        return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? "" : a
    });

    if (e.type == "blur") {
        var regexp = new RegExp(this.maskreg);
        if (!regexp.test(_this.value)) _this.value = "";
    } else {
        this.setCursorPosition(_this.value.length, _this);
    }
}

InputMask.prototype.setCursorPosition = function(pos, elem) {
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

InputMask.prototype.setListeners = function() {
    this.el.addEventListener("input", this.mask.bind(this), false);
    this.el.addEventListener("focus", this.mask.bind(this), false);
    this.el.addEventListener("blur", this.mask.bind(this), false);
}

InputMask.prototype.getElement = function(selector) {
    if (selector === undefined) return false;
    if (this.isElement(selector)) return selector;
    if (typeof selector == 'string') {
        var el = document.querySelector(selector);
        if (this.isElement(el)) return el;
    }
    return false
}

InputMask.prototype.isElement = function(element) {
    return element instanceof Element || element instanceof HTMLDocument;
}

$( document ).ready(function() {
    $('.lazy').Lazy({
        effect: "fadeIn",
        effectTime: 500,
        threshold: 0
    });
});