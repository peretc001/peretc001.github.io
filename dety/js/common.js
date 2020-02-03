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
                document.querySelector('.hamburger').classList.add('open')
                if ( event.target !== document.querySelector('#menu__toggle') ) event.preventDefault()
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
                    event.preventDefault()
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
    // const   catalog = document.querySelector('.nav-catalog')
    //         catalogMenu = document.querySelector('.nav-catalog__menu')
    //         // catalogSubMenu = document.querySelector('.nav-catalog__submenu')
    //         catalogSubMenuItem = document.querySelectorAll('.nav-catalog__submenu__item')

    //         catalogMenuLink = catalogMenu.querySelectorAll('ul li')
    //         catalogMenu.addEventListener('mouseover', () => {
    //             catalog.classList.add('in')
    //         })
    //         catalogMenuLink.forEach(item => {
    //             item.addEventListener('mouseover', () => {
    //                 item.classList.add('active')
    //                 catalog.classList.add('in')
    //                 localStorage.setItem('submenu', item.getAttribute('data-menu'))
    //             })
    //         })

    //         showCatalogSubMenuItem = () => {
    //                 catalogMenuLink[localStorage.getItem('submenu')].classList.add('active')
    //                 catalogSubMenuItem[localStorage.getItem('submenu')].classList.add('is-active')
    //                 nav.style.WebkitTransition = 'max-height 1s';
    //                 nav.style.MozTransition = 'max-height 1s';
    //                 nav.style.transition = 'max-height 1s';
    //         }
    //         hideCatalogSubMenuItem = () => {
    //             catalogMenuLink.forEach((item,i) => {
    //                 if ( !localStorage.getItem('submenu') || i != localStorage.getItem('submenu') ) item.classList.remove('active')
    //             })
    //             catalogSubMenuItem.forEach((item, i) => {
    //                 if ( !localStorage.getItem('submenu') || i != localStorage.getItem('submenu') ) {
    //                     item.classList.remove('is-active')
    //                     nav.style.WebkitTransition = '';
    //                     nav.style.MozTransition = '';
    //                     nav.style.transition = '';
    //                 }
    //             })
    //         }
            

    //         document.addEventListener('mouseover', () => {
    //             if (localStorage.getItem('submenu') && catalog.classList.contains('in')) {
    //                 hideCatalogSubMenuItem()
    //                 showCatalogSubMenuItem()
    //             } else {
    //                 hideCatalogSubMenuItem()
    //             }
    //         })

    //         document.querySelector('.nav-search').addEventListener('mouseover', () => {
    //             localStorage.setItem('submenu', '')
    //             hideCatalogSubMenuItem()
    //             catalog.classList.remove('in')
    //         })
    //         document.querySelector('main').addEventListener('mouseover', () => {
    //             localStorage.setItem('submenu', '')
    //             hideCatalogSubMenuItem()
    //             catalog.classList.remove('in')
    //         })



    const catalogBtn = document.querySelector('.catalog-btn')
    catalogBtn.addEventListener('click', (e) => {
        e.preventDefault()
        catalogBtn.querySelector('.hamburger').classList.toggle('open')
        catalog.classList.toggle('mob')
    })

    

    if (document.querySelector('.brands-header__favorite')) {
        const   favoriteBrandsBtn = document.querySelector('.brands-header__favorite').children[0]
                allBrandsBtn = document.querySelector('.brands-header__favorite').children[1]

        
                favoriteBrandsBtn.addEventListener('click', function() {
                    if (!this.classList.contains('btn-accent')) {
                        this.classList.add('btn-accent')
                        this.classList.remove('btn-outline-accent')
                        allBrandsBtn.classList.remove('btn-accent')
                        allBrandsBtn.classList.add('btn-outline-accent')
                        document.querySelector('.brands-all').classList.remove('active')
                        document.querySelector('.brands-list').classList.add('active')
                    }
                })
                allBrandsBtn.addEventListener('click', function() {
                    if (this.classList.contains('btn-outline-accent')) {
                        this.classList.add('btn-accent')
                        this.classList.remove('btn-outline-accent')
                        favoriteBrandsBtn.classList.remove('btn-accent')
                        favoriteBrandsBtn.classList.add('btn-outline-accent')
                        document.querySelector('.brands-all').classList.add('active')
                        document.querySelector('.brands-list').classList.remove('active')
                    } 
                })
    }
    
});


$( document ).ready(function() {

    $("#phone").mask("+7 (999) 999-99-99");

    $('.lazy').Lazy();
});