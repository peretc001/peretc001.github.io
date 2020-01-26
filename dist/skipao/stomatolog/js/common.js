
document.addEventListener("DOMContentLoaded", function() {
    const main = document.querySelector('main')
    const nav = document.querySelector('.nav')
    const topLine = document.querySelector('.top-line')
    const navBtn = document.querySelector('.navbar-toggler')
    const mainMenu = document.querySelector('.main-menu-wrap')
    const footer = document.querySelector('footer')

    const hideMenuInner = (e) => !mainMenu.contains(e.target) ? showScroll() : ''
    const hideScroll = () => {
        main.classList.add('no-scroll')
        topLine.style.display = 'none'
        footer.style.display = 'none'
        navBtn.classList.add('is-active');
        nav.classList.add('active');
        setTimeout(() => {
            document.addEventListener('click', hideMenuInner )
        }, 100); 
    }
    const showScroll = () => {
        main.classList.remove('no-scroll')
        topLine.style.display = ''
        footer.style.display = ''
        navBtn.classList.remove('is-active');
        nav.classList.remove('active');
        document.removeEventListener('click', hideMenuInner )
    }

    navBtn.addEventListener('click', () => !nav.classList.contains('active') ? hideScroll() : showScroll());


    if ( window.screen.availWidth - (window.screen.availWidth - window.innerWidth) < 991 ) {
        const menuHover = document.querySelectorAll('.has-children')
        menuHover.forEach(item => {
            const dropdownItem = item.querySelector('.arrow')
            dropdownItem.addEventListener('click', (e) => {
                if (!item.classList.contains('active')) {
                    item.classList.add('active')
                    dropdownItem.classList.add('active')
                } 
                else {
                    item.classList.remove('active')
                    dropdownItem.classList.remove('active')
                }
            })
        }) 
    }

    if ( document.querySelector('.callback_btn') ) {
        const signup = document.querySelectorAll('.callback_btn')
        const signupForm = document.querySelector('.callback__wrap')
        const signupFormClose = document.querySelector('.callback__wrap .close')

        const EscCloseCallback = (e) => {
            if((e.key=='Escape'||e.key=='Esc'||e.keyCode==27) && (signupForm.classList.contains('active'))){
                signupForm.classList.remove('active')
                nav.style.display = ''
                footer.style.display = ''
                if ( !document.querySelector('.nav').classList.contains('active') ) { main.classList.remove('no-scroll') }
            }
        }
        const openCallback = (e) => {
            e.preventDefault()
            nav.style.display = 'none'
            footer.style.display = 'none'
            signupForm.classList.add('active')
            if ( !document.querySelector('.nav').classList.contains('active') ) { main.classList.add('no-scroll') }
            window.addEventListener('keydown', EscCloseCallback)
        }
        const closeCallback = () => {
            nav.style.display = ''
            footer.style.display = ''
            signupForm.classList.remove('active')
            if ( !document.querySelector('.nav').classList.contains('active') ) { main.classList.remove('no-scroll') }
            window.removeEventListener('keydown', EscCloseCallback)
        }

        signup.forEach(item => item.addEventListener('click', openCallback))
        signupFormClose.addEventListener('click', (e) => {
            e.preventDefault()
            closeCallback()
        })
        signupForm.addEventListener('click', (e) => {
            ( !document.querySelector('.callback__form').contains(e.target) 
            || e.target === signupFormClose ) ? closeCallback() : ''
        })
    }

    if ( document.querySelectorAll('.callback__form') ) {
        const form = document.querySelectorAll('.callback__form')
        form.forEach(item => {
            const formBtn = item.querySelector('.callback__form__button')
            const checkBtn = item.querySelector('.robot__check')

            formBtn.disabled = true
            checkBtn.addEventListener('click', () => {
                if ( !checkBtn.classList.contains('active') ) {
                    checkBtn.classList.add('active')
                    item.action = '/thankyou.php'
                    const input = document.createElement("input")
                    input.setAttribute("type", "hidden")
                    input.setAttribute("name", "human")
                    input.setAttribute("value", "human")
                    input.classList.add('human')
                    item.appendChild(input)
                    formBtn.disabled = false
                } else {
                    checkBtn.classList.remove('active')
                    item.action = ''
                    if ( item.querySelector('input[name="human"]') ) {
                        input = item.querySelector('input[name="human"]')
                        item.removeChild(input)
                    }
                    formBtn.disabled = true
                }
            })
        })
    }
    
});


$( document ).ready(function() {

    $(".phone_mask").mask("+7 (999) 999-99-99");

    $('.lazy').Lazy();

});