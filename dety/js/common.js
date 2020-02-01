document.addEventListener("DOMContentLoaded", function() {

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
                document.body.classList.remove('no-scroll')
            }
            hideModal = () => {
                hModal()
                document.removeEventListener('keydown', hideModalEsc())
                document.removeEventListener('click', hideModalCloseBtn())
            }
            showModal = (event) => {
                document.body.classList.add('no-scroll')
                event.preventDefault()
                const current = document.querySelector('[data-modal="'+ event.target.dataset.target +'"]')

                modal.classList.add('in')
                current.classList.add('fade')
                setTimeout(() => {
                    modal.classList.add('is-active')
                    current.classList.add('is-active')
                }, 200);
                document.addEventListener('keydown', hideModalEsc)
                document.addEventListener('click', hideModalCloseBtn)
            }
            nav.addEventListener('click', (event) => {
                if (    
                    event.target.dataset.toggle == 'modal' 
                ) {
                    if ( modal.classList.contains('is-active') ) {
                        hideModal()
                    } else {
                        showModal(event)
                    }
                }
            })
            modal.addEventListener('click', (event) => event.target.className == 'modal in is-active' ? hideModal() : '')
    

    //Search
    const   searchCategory = document.querySelector('.nav-search__form__category')
            searchCategoryList = document.querySelectorAll('.nav-search__form__category ul li')

            searchCategoryList.forEach(item => item.addEventListener('click', (e) => searchCategory.children[0].textContent = item.textContent) )

    //Catalog
    const   catalog = document.querySelector('.nav-catalog')
            catalogMenu = document.querySelector('.nav-catalog__menu')
            catalogSubMenu = document.querySelector('.nav-catalog__submenu')
            catalogSubMenuItem = document.querySelectorAll('.nav-catalog__submenu__item')

            catalogMenuLink = catalogMenu.querySelectorAll('ul li')
            catalogMenu.addEventListener('mouseover', () => {
                catalog.classList.add('in')
            })
            catalogMenuLink.forEach(item => {
                item.addEventListener('mouseover', () => {
                    item.classList.add('active')
                    catalog.classList.add('in')
                    localStorage.setItem('submenu', item.getAttribute('data-menu'))
                })
            })


            showCatalogSubMenuItem = () => {
                catalogMenuLink[localStorage.getItem('submenu')].classList.add('active')
                catalogSubMenuItem[localStorage.getItem('submenu')].classList.add('is-active')
            }
            hideCatalogSubMenuItem = () => {
                catalogMenuLink.forEach((item,i) => {
                    if ( !localStorage.getItem('submenu') || i != localStorage.getItem('submenu') ) item.classList.remove('active')
                })
                catalogSubMenuItem.forEach((item, i) => {
                    if ( !localStorage.getItem('submenu') || i != localStorage.getItem('submenu') ) {
                        item.classList.remove('is-active')
                        // catalogSubMenu.style.WebkitTransition = 'max-height 1s';
                        // catalogSubMenu.style.MozTransition = 'max-height 1s';
                        // catalogSubMenu.style.transition = 'max-height 1s';
                        // item.style.WebkitTransition = 'opacity 1s';
                        // item.style.MozTransition = 'opacity 1s';
                        // item.style.transition = 'opacity 1s';

                    }
                })
            }
            

            document.addEventListener('mouseover', () => {
                if (localStorage.getItem('submenu') && catalog.classList.contains('in')) {
                    hideCatalogSubMenuItem()
                    showCatalogSubMenuItem()
                } else {
                    hideCatalogSubMenuItem()
                }
            })

            document.querySelector('.nav-search').addEventListener('mouseover', () => {
                localStorage.setItem('submenu', '')
                hideCatalogSubMenuItem()
                catalog.classList.remove('in')
            })
            document.querySelector('main').addEventListener('mouseover', () => {
                localStorage.setItem('submenu', '')
                hideCatalogSubMenuItem()
                catalog.classList.remove('in')
            })




    // const targetHideCatalog = (e) => (!catalogMenu.contains(e.target) && e.target != catalogMenu) ? hideCatalog() : ''
    // const showCatalog = (e) => {
    //     e.preventDefault()
    //     catalogMenu.classList.add('active')
    //     setTimeout(() => {
    //         document.addEventListener('click', targetHideCatalog)
    //     }, 100);
    // }
    // const hideCatalog = () => {
    //     catalogMenu.classList.remove('active')
    //     document.removeEventListener('click', targetHideCatalog)
    // }

    // catalogBtn.addEventListener('click', showCatalog)

    
    
});


$( document ).ready(function() {

    $("#phone").mask("+7 (999) 999-99-99");

    $('.lazy').Lazy();
});