document.addEventListener("DOMContentLoaded", function() {

    const   nav = document.querySelector('.nav')
            modal = document.querySelector('.modal');

    const   hideModalCloseBtn = () => {
                if ( event.target.className == 'close' ) {
                    modal.querySelector('.is-active').classList.remove('is-active')
                    setTimeout(() => {
                        modal.querySelector('.fade').classList.remove('fade')
                        modal.classList.remove('is-active')
                    }, 200);
                    document.removeEventListener('click', hideModalEsc())
                }
            }
            hideModalEsc = () => {
                if (event.keyCode == 27) {
                    modal.querySelector('.is-active').classList.remove('is-active')
                    setTimeout(() => {
                        modal.querySelector('.fade').classList.remove('fade')
                        modal.classList.remove('is-active')
                    }, 200);
                    document.removeEventListener('click', hideModalCloseBtn())
                }
            }
            hideModal = () => {
                modal.querySelector('.is-active').classList.remove('is-active')
                setTimeout(() => {
                    modal.querySelector('.fade').classList.remove('fade')
                    modal.classList.remove('is-active')
                }, 200);
                document.removeEventListener('keydown', hideModalEsc())
                document.removeEventListener('click', hideModalCloseBtn())
            }
            showModal = (event) => {
                event.preventDefault()
                const current = document.querySelector('[data-modal="'+ event.target.className +'"]')

                modal.classList.add('is-active')
                current.classList.add('fade')
                setTimeout(() => {
                    current.classList.add('is-active')
                }, 1);
                document.addEventListener('keydown', hideModalEsc)
                document.addEventListener('click', hideModalCloseBtn)
            }
    nav.addEventListener('click', (event) => {
        if (    
            event.target.className == 'nav-top__city__location' || 
            event.target.className == 'nav-top__right__user' ||
            event.target.className == 'nav-top__right__login' 
        ) {
            if ( modal.classList.contains('is-active') ) {
                hideModal()
            } else {
                showModal(event)
            }
        }
    })
    modal.addEventListener('click', (event) => event.target.className == 'modal is-active' ? hideModal() : '')
    
    // const   modalBtn = document.querySelectorAll('[data-toggle="modal"]')
    //         hideModalNav = (current) => event => {
    //             if (document.querySelector('.nav').contains(event.target) && modal.classList.contains('is-active')) {
    //                 hideModal2()
    //             }
    //         }
    //         hideModalCloseBtn = (current) => event => (event.target == current.querySelector('.close') && modal.classList.contains('is-active')) ? hideModal(current) : ''
    //         hideModalEsc = (current) => event => (event.keyCode == 27 && modal.classList.contains('is-active')) ? hideModal(current) : ''
    //         showModal = (current) => {
    //             if ( modal.classList.contains('is-active') ) {
    //                 hideModal2()
    //             } else {
    //             // modal.querySelector('.is-active') ? hideModal(modal.querySelector('.is-active')) : ''
    //                 modal.classList.add('is-active')
    //                 current.classList.add('fade')
    //                 setTimeout(() => {
    //                     current.classList.add('is-active')
    //                     document.addEventListener('keydown', hideModalEsc(current))
    //                     document.addEventListener('click', hideModalCloseBtn(current))
    //                     document.addEventListener('click', hideModalNav(current))
    //                 }, 1);
    //             }
    //         }
    //         hideModal = (current) => {
    //             current.classList.remove('is-active')
    //             setTimeout(() => {
    //                 current.classList.remove('fade')
    //                 modal.classList.remove('is-active')
    //             }, 200);
    //             document.removeEventListener('keydown', hideModalEsc)
    //             document.removeEventListener('click', hideModalCloseBtn)
    //             document.removeEventListener('click', hideModalNav)
    //         }
    //         hideModal2 = () => {
    //             if ( modal.classList.contains('is-active') ) {
    //                 modal.querySelector('.is-active').classList.remove('is-active')
    //                 setTimeout(() => {
    //                     modal.querySelector('.fade').classList.remove('fade')
    //                     modal.classList.remove('is-active')
    //                 }, 200);
    //                 document.removeEventListener('keydown', hideModalEsc)
    //                 document.removeEventListener('click', hideModalCloseBtn)
    //                 document.removeEventListener('click', hideModalNav)
    //             }
    //         }


    // modalBtn.forEach(item => {
    //     const current = item.getAttribute('data-target')
    //     const currentModal = modal.querySelector('.modal-body.' + current)
    //     item.addEventListener('click', (e) => {
    //         e.preventDefault()
    //         if ( modal.classList.contains('.is-active') ) { 
                
    //             modal.querySelectorAll('.is-active').forEach(item => {
    //                 item.classList.remove('is-active')
    //                 setTimeout(() => {
    //                     item.classList.remove('fade')
    //                     modal.classList.remove('is-active')
    //                 }, 200);
    //                 showModal(currentModal)
    //             })
                
                
    //         } else {
    //             showModal(currentModal)
    //         }
    //     })
    // });
    // modal.addEventListener('click', (e) => {
    //     !modal.querySelector('.is-active').contains(e.target) ? hideModal(modal.querySelector('.is-active')) : ''
    // })
        
        

        //Catalog
        const   catalogBtn = document.querySelector('.nav-catalog h2')
                catalogMenu = document.querySelector('.nav-catalog ul')

        const targetHideCatalog = (e) => (!catalogMenu.contains(e.target) && e.target != catalogMenu) ? hideCatalog() : ''
        const showCatalog = (e) => {
            e.preventDefault()
            catalogMenu.classList.add('active')
            setTimeout(() => {
                document.addEventListener('click', targetHideCatalog)
            }, 100);
        }
        const hideCatalog = () => {
            catalogMenu.classList.remove('active')
            document.removeEventListener('click', targetHideCatalog)
        }

        catalogBtn.addEventListener('click', showCatalog)

    
    
});


$( document ).ready(function() {

    $("#phone").mask("+7 (999) 999-99-99");

    $('.lazy').Lazy();
});