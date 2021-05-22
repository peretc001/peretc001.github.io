document.addEventListener('DOMContentLoaded', () => {
    const width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

    //Animate header onscroll
    if ( document.querySelector('.header') ) {
        const header =  document.querySelector('.header')

        const setActiveHeader = (e) => {
            const scrollY = window.scrollY

            scrollY > 200 ? header.classList.add('scrolled') : header.classList.remove('scrolled')

            //mobile hack
            if (width < 992) setTimeout(() => header.querySelector('.menu').style = 'transition: padding .5s ease')
        }

        setActiveHeader()
        window.addEventListener('scroll', setActiveHeader)
    }


    //Animate Mobile menu
    if (document.querySelector('.hamburger')) {
        const hamburger = document.querySelector('.hamburger')
        const header =  document.querySelector('.header')

        const openMenu = () => {
            header.classList.add('opening')
            header.classList.add('is-opened')
        }

        const closeMenu = () => {
            header.classList.remove('is-opened')
            setTimeout(() => header.classList.remove('opening'), 300)
        }

        hamburger.addEventListener('click', () => {
            document.body.classList.toggle('no-scroll')
            hamburger.classList.toggle('opened')

            hamburger.classList.contains('opened') ? openMenu() : closeMenu()
        })
    }
});


$( document ).ready(function() {
    if (document.querySelector('.slider')) {
        $('.slider-wrapper').slick({
            draggable: true,
            slidesToShow: 1,
            swipeToSlide: true,
            infinite: true,
            arrows: false,
            dots: true,
            autoplay: true,
            autoplaySpeed: 3000
        });

        $('.slick-prev').on('click', function() {
            $('.slider-wrapper').slick('slickPrev');
        })

        $('.slick-next').on('click', function() {
            $('.slider-wrapper').slick('slickNext');
        })
    }
});