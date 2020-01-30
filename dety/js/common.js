document.addEventListener("DOMContentLoaded", function() {

    if ( document.querySelector('.nav') ) {

        // const foo = (a,b,c) => event => console.log(a,b,c)
        // document.querySelector('button').addEventListener('click', foo(1,2,3))

        // const foo = (a,b,c) => console.log(a,b,c)
        // document.querySelector('button').addEventListener('click', foo.bind(1,2,3))


        //City
        const   cityBtn = document.querySelector('.nav-top__city__location')
                cityModal = document.querySelector('.nav-top__modal.city')
                cityModalClose = document.querySelector('.nav-top__modal.city .close');

        const escHideCityModal = (e) => {
            if( (e.key=='Escape'||e.key=='Esc'||e.keyCode==27) && (cityModal.classList.contains('active')) ) {
                cityModal.classList.remove('active')
            }
        }
        const targetHideCityModal = (e) => (!cityModal.contains(e.target) && e.target != cityBtn) ? hideCityModal() : ''
        
        const showCityModal = (e) => {
            e.preventDefault()
            cityModal.classList.add('active')
            document.addEventListener('keydown', escHideCityModal)
            setTimeout(() => {
                document.addEventListener('click', targetHideCityModal)
            }, 1);
        }
        const hideCityModal = () => {
            cityModal.classList.contains('active') ? cityModal.classList.remove('active') : ''
            document.removeEventListener('keydown', escHideCityModal)
            document.removeEventListener('click', targetHideCityModal)
        }
        
        cityBtn.addEventListener('click', showCityModal )
        cityModalClose.addEventListener('click', hideCityModal )

        //User
        const   userBtn = document.querySelector('.nav-top__right__user')
                userModal = document.querySelector('.nav-top__modal.user')
                userModalClose = document.querySelector('.nav-top__modal.user .close');

        const escHideUserModal = (e) => {
            if( (e.key=='Escape'||e.key=='Esc'||e.keyCode==27) && (userModal.classList.contains('active')) ) {
                userModal.classList.remove('active')
            }
        }
        const showUserModal = (e) => {
            e.preventDefault()
            userModal.classList.add('active')
            document.addEventListener('keydown', escHideUserModal)
            setTimeout(() => {
                document.addEventListener('click', targetHideUserModal)
            }, 1);
        }
        const targetHideUserModal = (e) => (!userModal.contains(e.target) && e.target != userBtn) ? hideUserModal() : ''
        const hideUserModal = () => {
            userModal.classList.contains('active') ? userModal.classList.remove('active') : ''
            document.removeEventListener('keydown', escHideUserModal)
            document.removeEventListener('click', targetHideUserModal)
        }
        
        userBtn.addEventListener('click', showUserModal )
        userModalClose.addEventListener('click', hideUserModal )

        //Login
        const   loginBtn = document.querySelector('.nav-top__right__login')
                loginModal = document.querySelector('.nav-top__modal.login')
                loginModalClose = document.querySelector('.nav-top__modal.login .close');

        const escHideLoginModal = (e) => {
            if( (e.key=='Escape'||e.key=='Esc'||e.keyCode==27) && (loginModal.classList.contains('active')) ) {
                loginModal.classList.remove('active')
            }
        }
        const showLoginModal = (e) => {
            e.preventDefault()
            loginModal.classList.add('active')
            document.addEventListener('keydown', escHideLoginModal)
            setTimeout(() => {
                document.addEventListener('click', targetHideLoginModal)
            }, 1);
        }
        const targetHideLoginModal = (e) => (!loginModal.contains(e.target) && e.target != loginBtn) ? hideLoginModal() : ''
        const hideLoginModal = () => {
            loginModal.classList.contains('active') ? loginModal.classList.remove('active') : ''
            document.removeEventListener('keydown', escHideLoginModal)
            document.removeEventListener('click', targetHideLoginModal)
        }

        loginBtn.addEventListener('click', showLoginModal )
        loginModalClose.addEventListener('click', hideLoginModal )


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

    }

    
    
});


$( document ).ready(function() {

    $("#phone").mask("+7 (999) 999-99-99");

    $('.lazy').Lazy();
});