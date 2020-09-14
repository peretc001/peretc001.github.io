document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.hamburger')) {
        const hamburger = document.querySelector('.hamburger')
        const menu = document.querySelector('.mobile-menu-dropdown')

        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('open')
            menu.classList.toggle('open')
            document.body.classList.toggle('no-scroll')
        })

        const modalLink = menu.querySelectorAll('[data-toggle="modal"]')
        modalLink.forEach(item => {
            item.addEventListener('click', () => {
                hamburger.classList.remove('open')
                menu.classList.remove('open')
                document.body.classList.remove('no-scroll')
            })
        })

        const openSearch = document.querySelectorAll('.open-search')
        const search = document.querySelector('.search-form')
        openSearch.forEach(item => {
            item.addEventListener('click', () => {
                div = document.createElement('div')
                div.classList.add('layout')
                document.body.appendChild(div)

                document.body.classList.add('no-scroll')

                div.addEventListener('click', hideSearch)

                setTimeout(() => {
                    div.classList.add('open')
                    search.classList.add('open')
                }, 100)
            })
        })

        function hideSearch() {
            search.classList.remove('open')
            document.querySelector('.layout').parentNode.removeChild(document.querySelector('.layout'))
            if (!document.querySelector('.mobile-menu-dropdown.open'))
                document.body.classList.remove('no-scroll')
        }
    }

    $('.thumbnails').slick({
        vertical: true,
        infinite: true,
        slidesToShow: 6,
        asNavFor: '.gallery',
        focusOnSelect: true,
        // arrows: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 5,
                }
            }
        ]
    });

    $('.gallery').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        draggable: true,
        asNavFor: '.thumbnails',
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    arrows: false,
                    dots: true
                }
            }
        ]
    });

    if (document.querySelector('.footer')) {
        const footerList = document.querySelectorAll('h5')
        footerList.forEach(item => {
            item.addEventListener('click', () => {
                item.parentNode.classList.toggle('active')
            })
        })
    }
})
