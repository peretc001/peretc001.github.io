document.addEventListener("DOMContentLoaded", function() {

    if (document.querySelector('.nav')) {
    const   nav = document.querySelector('.nav')
            modal = document.querySelector('.modal');

    const   hideModalCloseBtn = () => {
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

            const loginForm = document.querySelector('.modal-body .signin')
            loginForm.addEventListener('submit', (e) => {
                e.preventDefault()
                const phone = loginForm.querySelector('#phone')
                console.log(phone.value)
                //////// ЗАПРОС НА API /////////
                modal.querySelector('.is-active').classList.remove('is-active')
                setTimeout(() => {
                    modal.querySelector('.fade').classList.remove('fade')
                }, 200);
                modal.querySelector('.modal-body.sms').classList.add('fade')
                setTimeout(() => {
                    modal.querySelector('.modal-body.sms').classList.add('is-active')
                    modal.querySelector('.modal-body.sms .sms-input').focus()
                }, 200);

                const inputSMS = modal.querySelectorAll('.sms-input')
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
    const   searchCategory = document.querySelector('.nav-search__form__category')
            searchCategoryList = document.querySelectorAll('.nav-search__form__category ul li')

            searchCategoryList.forEach(item => item.addEventListener('click', (e) => searchCategory.children[0].textContent = item.textContent) )

    //Catalog
    const   catalog = document.querySelector('.nav-catalog')
            catalogMenu = document.querySelector('.nav-catalog__menu')
            // catalogSubMenu = document.querySelector('.nav-catalog__submenu')
            catalogSubMenuItem = document.querySelectorAll('.nav-catalog__submenu__item')

            // catalogMenuLink = catalogMenu.querySelectorAll('ul li')
            // catalogMenu.addEventListener('mouseover', () => {
            //     catalog.classList.add('in')
            // })
            // catalogMenuLink.forEach(item => {
            //     item.addEventListener('mouseover', () => {
            //         item.classList.add('active')
            //         catalog.classList.add('in')
            //         localStorage.setItem('submenu', item.getAttribute('data-menu'))
            //     })
            // })

            // showCatalogSubMenuItem = () => {
            //     catalogMenuLink[localStorage.getItem('submenu')].classList.add('active')
            //     catalogSubMenuItem[localStorage.getItem('submenu')].classList.add('is-active')
            // }
            // hideCatalogSubMenuItem = () => {
            //     catalogMenuLink.forEach((item,i) => {
            //         if ( !localStorage.getItem('submenu') || i != localStorage.getItem('submenu') ) item.classList.remove('active')
            //     })
            //     catalogSubMenuItem.forEach((item, i) => {
            //         if ( !localStorage.getItem('submenu') || i != localStorage.getItem('submenu') ) {
            //             item.classList.remove('is-active')
            //         }
            //     })
            // }

            // document.addEventListener('mouseover', () => {
            //     if (localStorage.getItem('submenu') && catalog.classList.contains('in')) {
            //         hideCatalogSubMenuItem()
            //         showCatalogSubMenuItem()
            //     } else {
            //         hideCatalogSubMenuItem()
            //     }
            // })

            // document.querySelector('.nav-search').addEventListener('mouseover', () => {
            //     localStorage.setItem('submenu', '')
            //     hideCatalogSubMenuItem()
            //     catalog.classList.remove('in')
            // })
            // document.querySelector('main').addEventListener('mouseover', () => {
            //     localStorage.setItem('submenu', '')
            //     hideCatalogSubMenuItem()
            //     catalog.classList.remove('in')
            // })



    const catalogBtn = document.querySelector('.catalog-btn')
    catalogBtn.addEventListener('click', (e) => {
        e.preventDefault()
        catalogBtn.querySelector('.hamburger').classList.toggle('open')
        catalog.classList.toggle('mob')
    })

    
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

    //Show-hide description
    if ( document.querySelector('.show_description') ) {
        const   hElem = document.querySelector('.hide_description')
                sElem = document.querySelector('.show_description')

        sElem.addEventListener('click', () => {
            !hElem.classList.contains('active') ? hElem.classList.add('active') : hElem.classList.remove('active')
            hElem.classList.contains('active') ? sElem.textContent = 'скрыть' : sElem.textContent = 'показать еще'
        })
    }


    //Products-page Tabs
    if ( document.querySelector('.products-page-rq') ) {
        const   tabs = document.querySelectorAll('.products-page-rq__head h3')
                review = document.querySelector('#review')
                question = document.querySelector('#question')

                tabs.forEach((item,i) => {
                    item.addEventListener('click', () => {
                        if (i == '0') {
                            tabs[0].classList.add('active')
                            tabs[1].classList.contains('active') ? tabs[1].classList.remove('active') : ''
                            review.classList.add('active')
                            question.classList.remove('active')
                        } else {
                            tabs[0].classList.contains('active') ? tabs[0].classList.remove('active') : ''
                            tabs[1].classList.add('active')
                            question.classList.add('active')
                            review.classList.remove('active')
                        }
                    })
                })
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

    // if ( document.querySelector('.products-page-buy__size') ) {
    //     const   container = document.querySelector('.products-page-buy__size__item')
    //             prev = document.querySelector('.products-page-buy__size__item .prev')
    //             next = document.querySelector('.products-page-buy__size__item .next')

    //             prev.addEventListener('click', () => {
    //                 console.log('123')
    //                 container.scrollRight += 50
    //             })
    //             next.addEventListener('click', () => {
    //                 console.log('321')
    //                 container.scrollLeft += 50
    //             })
    // }
    
});


$( document ).ready(function() {

    $("#phone").mask("+7 (999) 999-99-99");

    $('.lazy').Lazy();
});