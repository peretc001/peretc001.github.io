document.addEventListener("DOMContentLoaded", function() {

    //Menu
    if ( document.querySelector('nav') ) {
        const   navMenu = document.querySelector('.nav-menu'),
                navMenuBtn = document.querySelector('.hamburger'),
                hasChildren = document.querySelector('.nav-menu .hasChildren');


        hasChildren.addEventListener('click', showChildren);

        function showChildren(e) {
            e.preventDefault()
            navMenu.querySelectorAll('ul li').forEach(elem => {
                elem.classList.contains('active') ? elem.classList.remove('active') : '';
            });
            this.classList.add('active')
            hasChildren.removeEventListener('click', showChildren);
        }

        navMenuBtn.addEventListener('click', OpenMenu)

        function OpenMenu() {
            const   div = document.createElement('div'),
                    close = navMenu.querySelector('.closeMenu');
            
            document.body.classList.add('no-scroll');
            div.classList.add('menuLayout');
            document.body.appendChild(div);

            navMenu.classList.add('fade')
            setTimeout(() => {
                navMenu.classList.add('open')
            }, 100)

            close.addEventListener('click', closeMenu)
            div.addEventListener('click', closeMenu)
        }

        function closeMenu() {
            const   div = document.querySelector('.menuLayout'),
                    close = navMenu.querySelector('.closeMenu');

            navMenu.classList.remove('open')
            setTimeout(() => {
                navMenu.classList.add('fade')
            }, 100)

            close.removeEventListener('click', closeMenu)
            div.parentNode.removeChild(div)
            document.body.classList.remove('no-scroll');
        }

        
        
        function closeMenuEsc(event) { event.target = div ? closeCatalog() : '' }

        
    }

    if ( document.querySelector('.openSearch') ) {
        const   openSearchBtn = document.querySelector('.openSearch'),
                searchForm = document.querySelector('.searchForm'),
                close = document.querySelector('.closeSearch')

        openSearchBtn.addEventListener('click', openSearch)

        function openSearch(e) {
            e.preventDefault()
            document.body.classList.add('no-scroll');
            searchForm.classList.add('active')

            close.addEventListener('click', closeSearch)
        }

        function closeSearch(e) {
            e.preventDefault()
            searchForm.classList.remove('active')
            document.body.classList.remove('no-scroll');

            close.removeEventListener('click', closeSearch)
        }
    }

    if ( document.querySelector('.showMore') ) {
        const   showMore = document.querySelector('.showMore'),
                showItems = document.querySelectorAll('.rest-menu--item.hidden');

        showMore.addEventListener('click', () => {
            showItems.forEach(item => item.classList.toggle('hidden'))
            showMore.classList.toggle('active')
        })
    }



    jQuery('.slider-container').slick({
        lazy: 'ondemand',
        draggable: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        swipeToSlide: true,
        infinite: true,
        arrows: false,
        dots: true,
        autoplay: true,
        autoplaySpeed: 2000
    });

});