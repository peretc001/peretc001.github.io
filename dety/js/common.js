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
    const   catalogBtn = document.querySelectorAll('.nav .hover-link')
            catalogLink = document.querySelectorAll('.nav .link')
            catalog = document.querySelector('.nav-catalog')
            
            mCatalogBtn = document.querySelector('.nav-mobile .catalog-btn')
            parrentLink = document.querySelectorAll('.nav a.parrent')
            childrenLink = document.querySelectorAll('.nav a.children')
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
        // setTimeout(() => {
            current.classList.add('active')
        // }, 100);
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
        // setTimeout(() => {
            if (catalog.querySelector('.nav-catalog__submenu.fade')) {
                catalog.querySelector('.nav-catalog__submenu.fade').classList.remove('fade')
            }
            if (document.contains(div)) document.body.removeChild(div)
            div.removeEventListener('mouseover', closeCatalogEvt)
        // }, 50)
    }

    openMobileMenu = () => {
        catalog.querySelector('.nav-catalog__menu').classList.add('fade')
        catalog.querySelector('.nav-catalog__menu').classList.add('active')
        mCatalogBtn.children[0].classList.add('active')
        document.body.append(div)
        localStorage.setItem('menu', 'general')
    }
    closeMobileMenu = () => {
        catalog.querySelector('.nav-catalog__menu').classList.remove('active')
        setTimeout(() => {
            catalog.querySelector('.nav-catalog__menu').classList.remove('fade')
            mCatalogBtn.children[0].classList.remove('active')
            if (document.contains(div)) document.body.removeChild(div)
        }, 100);   
        
        catalog.querySelectorAll('.nav-catalog__submenu').forEach(item => {
            item.classList.contains('sub') ? item.classList.remove('sub') : ''
            item.classList.contains('child') ? item.classList.remove('child') : ''
            item.classList.contains('active') ? item.classList.remove('active') : ''
            item.classList.contains('fade') ? item.classList.remove('fade') : ''
        })

        catalog.querySelectorAll('.nav-catalog__parent').forEach(item => {
            // item.classList.contains('child') ? item.classList.remove('child') : ''
            item.classList.contains('active') ? item.classList.remove('active') : ''
            item.classList.contains('fade') ? item.classList.remove('fade') : ''
        })

        localStorage.removeItem('menu')
        localStorage.removeItem('menu_title')
    }

    showMobileMenu = () => {
        catalog.querySelector('.nav-catalog__menu').classList.add('fade')
        setTimeout(() => {
            catalog.querySelector('.nav-catalog__menu').classList.add('active') 
        }, 100);
    }
    hideMobileMenu = () => {
        catalog.querySelector('.nav-catalog__menu').classList.remove('active')
        setTimeout(() => {
            catalog.querySelector('.nav-catalog__menu').classList.remove('fade')
        }, 100);
        localStorage.removeItem('menu_title') 
    }

    hideParrent = (e) => {
        e.preventDefault()
        let parrent = localStorage.getItem('menu') || null
        if (parrent) {
            current = catalog.querySelector('[data-submenu="'+ parrent +'"]')
            current.classList.remove('active')
            setTimeout(() => {
                current.classList.remove('fade')
            }, 100);
        }
        localStorage.setItem('menu', 'general')
        localStorage.removeItem('menu_title')
        showMobileMenu()

    }
    showParrent = (e) => {
        e.preventDefault()
        let general = localStorage.getItem('menu') || null
        if ( general ) hideMobileMenu()
        
        let parrent = e.target.dataset.menu
        localStorage.setItem('menu', parrent)

        if (parrent) {
            current = catalog.querySelector('[data-submenu="'+ parrent +'"]')
            current.classList.add('fade')
            setTimeout(() => {  
                current.classList.add('active')
            }, 100);
            
            let head = current.querySelector('.head')
            head.innerHTML = `<a class="back" href="#">${e.target.textContent}</a>`

            setTimeout(() => {
                const back = current.querySelector('.back') 
                back.addEventListener('click', hideParrent)
            }, 100);
        }

        pageYOffset > 100 ? document.querySelector('.nav-mobile').scrollIntoView({block: "start", behavior: "smooth"}) : ''
    }

    hideChildren = (e) => {
        e.preventDefault()
        let parrent = localStorage.getItem('menu')
        if (parrent == 'general') parrent = 'catalog'

        current = catalog.querySelector('[data-submenu="'+ parrent +'"]')
        currentParrent = current.querySelector('.nav-catalog__parent.fade.active')
        
        currentParrent.classList.remove('active')
        setTimeout(() => {
            currentParrent.classList.remove('fade')
            current.classList.remove('active')
            current.classList.remove('child')
            current.classList.remove('fade')
            if (parrent != 'catalog') {
                setTimeout(() => {
                    current.classList.add('fade')
                    setTimeout(() => {  
                        current.classList.add('active')
                    }, 100);
                }, 100);
            }
        }, 100);

        if (parrent == 'catalog') showMobileMenu()
    }
    showChildren = (e) => {
        e.preventDefault()

        let general = localStorage.getItem('menu') || null
        if ( general == 'general' ) {
            
            hideMobileMenu()

            let parrent = localStorage.getItem('menu')
            if (parrent == 'general') parrent = 'catalog'
            current = catalog.querySelector('[data-submenu="'+ parrent +'"]')
            currentParrent = current.querySelector('[data-parent="'+ e.target.dataset.id +'"]')
            
            current.classList.add('fade')
            current.classList.add('active')
            current.classList.add('child')
            currentParrent.classList.add('fade')
            setTimeout(() => {
                currentParrent.classList.add('active')
            }, 100);

            let header = {
                title: e.target.textContent,
                href: e.target.href
            }
                
            localStorage.setItem('menu_title', JSON.stringify(header))

            currentParrent.children[0].innerHTML = `<a class="back" href="#">${e.target.textContent}</a>
            <a class="category" href="${e.target.href}">Перейти в категорию</a>`

            setTimeout(() => {
                const back = currentParrent.querySelector('.back')
                back.addEventListener('click', hideChildren)
            }, 300);
        }
        else {
            current = catalog.querySelector('[data-submenu="'+ general +'"]')
            current.classList.remove('active')
            setTimeout(() => {
                current.classList.remove('fade')
            }, 100);
        
            let parrent = localStorage.getItem('menu')
            if (parrent == 'general') parrent = 'catalog'
            current = catalog.querySelector('[data-submenu="'+ parrent +'"]')
            currentParrent = current.querySelector('[data-parent="'+ e.target.dataset.id +'"]')
            
            setTimeout(() => {
                current.classList.add('fade')
                current.classList.add('active')
                current.classList.add('child')
                currentParrent.classList.add('fade')
                setTimeout(() => {
                    currentParrent.classList.add('active')
                }, 100);
            }, 105);

            currentParrent.children[0].innerHTML = `<a class="back" href="#">${e.target.textContent}</a>
            <a class="category" href="${e.target.href}">Перейти в категорию</a>`

            setTimeout(() => {
                const back = currentParrent.querySelector('.back')
                back.addEventListener('click', hideChildren)
            }, 300);
        }

        const subLink = currentParrent.querySelectorAll('ul li:first-child a')
        subLink.forEach(elem => {
            elem.addEventListener('click', showSubMenu)
        })

        pageYOffset > 100 ? document.querySelector('.nav-mobile').scrollIntoView({block: "start", behavior: "smooth"}) : ''
    }

    hideSubMenu = (e) => {
        e.preventDefault()
        const   current = catalog.querySelector('.sub')
        
        current.classList.remove('sub')
        current.classList.remove('active')

        current.querySelector('ul.current').classList.remove('current')

        current.classList.add('child')
        setTimeout(() => {
            current.classList.add('active')
        }, 200);

        let header = JSON.parse(localStorage.getItem('menu_title'))

        let child = current.querySelector('.nav-catalog__parent.fade.active')
        child.querySelector('.nav-catalog__parent__head').innerHTML = `<a class="back" href="#">${header.title}</a>
        <a class="category" href="${header.href}">Перейти в категорию</a>`

        setTimeout(() => {
            const back = child.querySelector('.back')
            back.addEventListener('click', hideChildren)
        }, 300);
    }
    showSubMenu = (e) => {
        e.preventDefault()
        
        const   current = document.querySelector('.nav-catalog__submenu.child')
                id = e.target.closest('ul').getAttribute('data-sub')

        current.classList.remove('child')
        current.classList.remove('active')


        current.classList.add('sub')
        setTimeout(() => {
            current.classList.add('active')
        }, 100);
        
        let child = catalog.querySelector('.nav-catalog__parent.fade.active')
            child.querySelector('[data-sub="'+ id +'"]').classList.add('current')
            child.querySelector('.nav-catalog__parent__head').innerHTML = `<a class="back" href="#">${e.target.textContent}</a>
            <a class="category" href="${e.target.href}">Перейти в категорию</a>`

        setTimeout(() => {
            const back = child.querySelector('.back')
            back.addEventListener('click', hideSubMenu)
        }, 300);
    }
    
    
    catalogBtn.forEach(item => {
        if (document.body.clientWidth > 991) {
            item.addEventListener('click', (e) => { e.preventDefault() })
            item.addEventListener('mouseover', (e) => { timer = setTimeout(openCatalog(e), 200) })
            item.addEventListener('mouseout', () => { clearTimeout(timer) }) 
        } else {
            // item.addEventListener('click', showParrent)
            parrentLink.forEach(item => {
                item.addEventListener('click', showParrent)
            })
            childrenLink.forEach(item => {
                item.addEventListener('click', showChildren)
            })
        }
    })


    catalogLink.forEach(item => {
        if (document.body.clientWidth > 991) {
            item.addEventListener('mouseover', closeCatalog)
        }
    })
    mCatalogBtn.addEventListener('click', openMobileMenu)
    div.addEventListener('click', closeMobileMenu)


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
                localStorage.setItem('city', document.querySelector('.modal-body__city').textContent)
            }

            !city ? window.onload = showCityOnLoad() : ''

            const smsInsert = (event) => {
                smsInput[0].focus();
                $('.sms-input').on('keydown', function(e) {
                    let value = $(this).val();
                    let len = value.length;
                    let curTabIndex = parseInt($(this).attr('tabindex'));
                    let nextTabIndex = curTabIndex + 1;
                    let prevTabIndex = curTabIndex - 1;
                    if (len > 0) {
                      $(this).val(value.substr(0, 1));
                      $('[tabindex=' + nextTabIndex + ']').focus();
                    } else if (len == 0 && prevTabIndex !== 0) {
                      $('[tabindex=' + prevTabIndex + ']').focus();
                    }
                });
                smsInput[3].addEventListener('keyup', function(event) {
                    if (this.value != '' && (event.key != 'Backspace' || event.key != 'Delete')) {
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

            smsTimer = () => {
                let timerBlock = document.querySelector('.replay-sms');
                if ( timerBlock.classList.contains('hidden') ) {
                    timerBlock.classList.remove('hidden')
                    timerBlock.nextElementSibling.classList.add('hidden')
                }
                
                let index = 12
                let timerId = setInterval(function() {
                    let str = --index
                    timerBlock.querySelector('.timer').textContent = str < 10 ? '0' + str : str;
                }, 1000);
    
                setTimeout(function() {
                    clearInterval(timerId);
                    timerBlock.classList.add('hidden')
                    timerBlock.nextElementSibling.classList.remove('hidden')
                    document.querySelector('.replay-code').addEventListener('click', smsTimer);
                }, index * 1000);   
            }
            smsTimer()

            loginForm.addEventListener('submit', (event) => {
                event.preventDefault()
                loginForm.classList.remove('active')
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