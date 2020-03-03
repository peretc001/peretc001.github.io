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

//Brands page
if (document.querySelector('.brands-header__favorite')) {
    const   favorite = document.querySelector('.brands-header__favorite')
            btn1 = favorite.children[0]
            btn2 = favorite.children[1]
    
            btn1.addEventListener('click', function() {
                favorite.classList.add('active')
                document.querySelector('.brands-list').classList.add('active')
                document.querySelector('.brands-all').classList.remove('active')
            })
            btn2.addEventListener('click', function() {
                favorite.classList.remove('active')
                document.querySelector('.brands-list').classList.remove('active')
                document.querySelector('.brands-all').classList.add('active')
            })
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
    

if ( document.querySelector('.products-page-body__rq') ) {
    //Input file
    let inputs = document.querySelectorAll('.input__file');
    Array.prototype.forEach.call(inputs, function (input) {
        let label = input.nextElementSibling,
        labelVal = label.querySelector('.input__file-button-text').innerText;
    
        input.addEventListener('change', function (e) {
            let countFiles = '';
            if (this.files && this.files.length >= 1) {
                countFiles = this.files.length;
                label.classList.add('active')
            } else {
                label.classList.remove('active')
            }
        
            if (countFiles)
                label.querySelector('.input__file-button-text').innerText = 'Выбрано файлов: ' + countFiles;
            else
                label.querySelector('.input__file-button-text').innerText = labelVal;
        });
    });
}

    

if ( document.querySelector('.qty-input') ) {
    const input = document.querySelectorAll('.qty-input')
    input.forEach(item => {

        const   qty = item.querySelector('input[name="qty"]')
                minus = item.querySelector('.minus')
                plus = item.querySelector('.plus')
                minus.addEventListener('click', () => qty.value > 1 ? qty.value-- : '')
                plus.addEventListener('click', () => qty.value++)
    })
}

//Sort block
if ( document.querySelector('.products-sort-block--select') ) {
    const   dropDown = document.querySelector('.products-sort-block--select')
            dropDownMenu = document.querySelector('.products-sort-block--options')
            dropDownMenu ? setTimeout(dropDownMenu.classList.add('in'), 100) : ''
            
    function closeDropDownEvent(event) { event.target != dropDown && event.target != dropDownMenu ? closeDropDown() : '' }
    
    const   openDropDown = () => {
                dropDown.classList.toggle('active')
                dropDownMenu.classList.toggle('active')
                document.addEventListener('click', closeDropDownEvent)
            }
            closeDropDown = () => {
                dropDown.classList.remove('active')
                dropDownMenu.classList.remove('active')
                document.removeEventListener('click', closeDropDownEvent)
            }

    dropDown.addEventListener('click', openDropDown)
    
}

//Show Hide SmartFilter
if ( document.querySelector('.products-sort .open-filter') ) {
    const   productsFilter = document.querySelector('.products-filter')
            openFilter = document.querySelector('.products-sort .open-filter')
            console.log(openFilter, productsFilter)

    function closeSmartFilterEvent(event) { 
        event.target != productsFilter && event.target != openFilter ? closeSmartFilter() : '' 
    }

    const   openSmartFilter = () => {
                productsFilter.classList.add('active')
                openFilter.classList.add('active')
                document.addEventListener('click', closeSmartFilterEvent)
            }
            closeSmartFilter = () => {
                productsFilter.classList.remove('active')
                openFilter.classList.remove('active')
                document.removeEventListener('click', closeSmartFilterEvent)
            }
        
            openFilter.addEventListener('click', openSmartFilter)
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