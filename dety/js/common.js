document.addEventListener("DOMContentLoaded", function() {

//Modal
    if (document.querySelector('.nav')) {
        const   nav = document.querySelector('.nav')
                modal = document.querySelector('.modal')
                openCityList = document.querySelector('.open-city-list')

                hideModalCloseBtn = () => {
                    if ( event.target.dataset.close == 'close' ) {
                        hModal()
                        document.removeEventListener('click', hideModalEsc())
                    }
                }
                hideModalEsc = () => {
                    if (event.keyCode == 27) {
                        hModal()
                        document.removeEventListener('click', hideModalCloseBtn())
                    }
                }
                hModal = () => {
                    modal.querySelector('.is-active').classList.remove('is-active')
                    setTimeout(() => {
                        modal.querySelector('.fade').classList.remove('fade')
                    }, 200);
                    setTimeout(() => {
                        modal.classList.remove('is-active')
                    }, 200);
                    setTimeout(() => {
                        modal.classList.remove('in')
                    }, 200);
                    document.querySelector('.hamburger').classList.remove('open')
                    document.body.classList.remove('no-scroll')
                }
                hideModal = () => {
                    hModal()
                    document.removeEventListener('keydown', hideModalEsc())
                    document.removeEventListener('click', hideModalCloseBtn())
                }
                showModal = (event) => {
                    document.body.classList.add('no-scroll')
                    event.target.dataset.target == 'menu' ? document.querySelector('.hamburger').classList.add('open') : ''
                    if (event.target.dataset.target == 'review') {
                        document.querySelector('.rating-area').addEventListener('mouseover', () => {
                            document.querySelector('#star-5').checked = false
                        })
                    }
                    const current = document.querySelector('[data-modal="'+ event.target.dataset.target +'"]')
                    modal.classList.add('in')
                    current.classList.add('fade')
                    setTimeout(() => {
                        modal.classList.add('is-active')
                        current.classList.add('is-active')
                    }, 200);
                    if (event.target.dataset.target == 'login') modal.querySelector('input[name="phone"]').focus()
                    document.addEventListener('keyup', hideModalEsc)
                    document.addEventListener('click', hideModalCloseBtn)
                }
                showCityList = () => {

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
                        modal.querySelector('.fade').classList.remove('fade')
                    }, 200);
                    modal.querySelector('.modal-body.sms').classList.add('fade')
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
                                modal.querySelector('.modal-body.sms').classList.remove('fade')
                                this.blur()
                            }, 200);
                            setTimeout(() => {
                                modal.classList.remove('is-active')
                            }, 200);
                            setTimeout(() => {
                                modal.classList.remove('in')
                            }, 200);
                            document.body.classList.remove('no-scroll')
                        } else inputSMS[2].focus()
                    })
                })

                openCityList.addEventListener('click', () => {
                    hideModal()
                })
                
                document.addEventListener('click', (event) => {
                    if (    
                        event.target.dataset.toggle == 'modal' 
                    ) {
                        event.preventDefault()
                        if ( modal.classList.contains('is-active') ) {
                            hideModal()
                        } else {
                            showModal(event)
                        }
                    }
                })
                modal.addEventListener('click', (event) => event.target.className == 'modal in is-active' ? hideModal() : '')
    }

//Search
{
    const   searchCategory = document.querySelector('.nav-search__form__category')
            searchCategoryList = document.querySelectorAll('.nav-search__form__category ul li')

            searchCategoryList.forEach(item => item.addEventListener('click', (e) => searchCategory.children[0].textContent = item.textContent) )
}

// //Catalog
{
    const   navCatalog    = document.querySelector('.nav-catalog')
            navCatalogBtn = document.querySelector('.catalog-btn')
    
    navCatalogBtn.addEventListener('click', (e) => {
        e.preventDefault()
        navCatalogBtn.querySelector('.hamburger').classList.toggle('open')
        navCatalog.classList.toggle('mob')
    })
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

    if ( document.querySelector('.hideElem') ) {
        const   hElem = document.querySelectorAll('.hideElem')
                sElem = document.querySelectorAll('.showElem')

        hElem.forEach((item, i) => {
            function scrollStart() {
                let x = window.pageYOffset;
                if ( item.getAttribute('data-scroll') && item.classList.contains('active') ) {
                    for (let i = 0; i < 200; i++) {
                        if ( i < 200) {
                            x = x + i;
                        }
                        setTimeout(() => {
                            window.scroll(window.pageXOffset, x);
                        }, 200);
                    }
                }
            }
            item.addEventListener('click', scrollStart)
            item.addEventListener('click', () => {
                !item.classList.contains('active') ? item.classList.add('active') : item.classList.remove('active')
                !sElem[i].classList.contains('active') ? sElem[i].classList.add('active') : sElem[i].classList.remove('active')
            })
        })
    }

   
    if ( document.querySelector('.products-page-item__photo__gallery') ) {
        const   imgContainer = document.querySelector('.products-page-item__photo__gallery')
                imgList = imgContainer.querySelectorAll('img')

                document.querySelector('.products-page-item__photo__img').addEventListener('click', () => {                       
                    imgContainer.querySelector('.active').classList.remove('active')
                    imgList[carousel_img.returnPosition()].classList.add('active')
                })
                document.querySelector('.products-page-item__photo__img').addEventListener('touchend', () => {                  
                    imgContainer.querySelector('.active').classList.remove('active')
                    imgList[carousel_img.returnPosition()].classList.add('active')
                })

                imgList.forEach((item, i) => {
                    item.addEventListener('click', () => {
                        imgContainer.querySelector('.active').classList.remove('active')
                        item.classList.add('active')
                        carousel_img.goto(i)
                    })
                })

    }

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
    
    //Products-page Tabs
    if ( document.querySelector('.products-page-rq') ) {
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

    if ( document.querySelector('.products-page-buy__size') ) {
        const push = document.querySelectorAll('.products-page-buy .push')
        if ( localStorage.getItem('push') == 1 ) {
            push.forEach(item => {
                item.style.display = 'none'
            })
        }

        const showModal = (elem, container) => {
            elem = document.querySelector(elem)
            elem.nextElementSibling.style.display = 'none'
            localStorage.setItem('push', 1)
            container = document.querySelector(container)
            div = document.createElement('div')
            div.classList.add('layout')
            div.classList.add('active')
            
            document.body.appendChild(div)
            setTimeout(() => {
                div.style.opacity = '.5'
                document.body.classList.add('no-scroll')
                container.classList.add('active')
                container.style.transform = 'translateY(0%)'
                div.addEventListener('click', () => {
                    container.style.transform = 'translateY(100%)'
                    setTimeout(() => {
                        container.classList.remove('active')
                        div.style.opacity = '0'
                        setTimeout(() => {
                            document.body.removeChild(div)
                            document.body.classList.remove('no-scroll')
                        }, 200);
                    }, 300);
                })
            }, 200);
        }
        document.querySelector('.btn-size').addEventListener('click', () => {
            showModal('.btn-size', '.products-page-buy__size__block')
        })

        document.querySelector('.btn-color').addEventListener('click', () => {
            showModal('.btn-color', '.products-page-buy__color__block')
        })
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

    if ( document.querySelector('.cart-delivery-point__lists') ) {
        const container = document.querySelector('.cart-delivery-point__lists .container')
        let timer = null;
        container.addEventListener('mouseover', (e) => document.body.classList.add('no-scroll'))
        container.addEventListener('mouseout', (e) => document.body.classList.remove('no-scroll'))
    }

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
    var input = document.querySelector("#userphone") || document.querySelector("#phone")
    input.addEventListener("input", mask, false);
    input.addEventListener("focus", mask, false);
    input.addEventListener("blur", mask, false);
}
    
    
});

$( document ).ready(function() {
    
    $('.lazy').Lazy();
  });