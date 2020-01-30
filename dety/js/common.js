document.addEventListener("DOMContentLoaded", function() {

    const   nav = document.querySelector('.nav')
            modal = document.querySelector('.modal');

    const   hideModalCloseBtn = () => {
                if ( event.target.dataset.close == 'close' ) {
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
                document.body.classList.remove('no-scroll')
                modal.querySelector('.is-active').classList.remove('is-active')
                setTimeout(() => {
                    modal.querySelector('.fade').classList.remove('fade')
                    modal.classList.remove('is-active')
                }, 200);
                document.removeEventListener('keydown', hideModalEsc())
                document.removeEventListener('click', hideModalCloseBtn())
            }
            showModal = (event) => {
                document.body.classList.add('no-scroll')
                event.preventDefault()
                const current = document.querySelector('[data-modal="'+ event.target.dataset.target +'"]')

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
            event.target.dataset.toggle == 'modal' 
        ) {
            if ( modal.classList.contains('is-active') ) {
                hideModal()
            } else {
                showModal(event)
            }
        }
    })
    modal.addEventListener('click', (event) => event.target.className == 'modal is-active' ? hideModal() : '')
    
    
        

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