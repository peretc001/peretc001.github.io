'use strict';

document.addEventListener('DOMContentLoaded', () => {

    if ( document.querySelector('.hamburger') ) {
        const hamburger = document.querySelector('.hamburger');
        const mobileMenu = document.querySelector('.menu')
        const body = document.querySelector('body')
        hamburger.addEventListener('click', function() {
            if ( !mobileMenu.classList.contains('is-opened') ) {
                this.classList.add('is-active')
                mobileMenu.classList.add('is-opened')
                body.style.overflow = 'hidden'
            } else {
                this.classList.remove('is-active')
                mobileMenu.classList.add('is-close')
                setTimeout(() => {
                    mobileMenu.classList.remove('is-close')
                    mobileMenu.classList.remove('is-opened')
                    body.style.overflow = ''
                }, 600);
            }
        })

        document.addEventListener('click', (e) => {
            if ( mobileMenu.classList.contains('is-opened') && e.target == document.querySelector('.mobile-menu') ) {
                hamburger.classList.remove('is-active')
                mobileMenu.classList.add('is-close')
                setTimeout(() => {
                    mobileMenu.classList.remove('is-close')
                    mobileMenu.classList.remove('is-opened')
                    body.style.overflow = ''
                }, 600);
            }
        })
    }
    
    var menu = $('.menu'),
	scrollPrev = 0;

    $(window).scroll(function() {
        var scrolled = $(window).scrollTop();
    
        if ( scrolled > 100 && scrolled > scrollPrev ) {
            menu.addClass('out');
        } else {
            menu.removeClass('out');
        }
        scrollPrev = scrolled;
    });

    if ( document.querySelector('.open__filter') ) {
        const filterBtn = document.querySelector('.open__filter')
        const filter = document.querySelector('.products__filter')
        const filterShow = localStorage.getItem('open__filter')

        filterShow == 'active' ? filter.classList.add('active') : ''

        filterBtn.addEventListener( 'click', () => {
            filter.classList.contains('active') ? localStorage.setItem('open__filter', '') : localStorage.setItem('open__filter', 'active')
            filter.classList.toggle('active')
        });
    }

    if ( document.querySelectorAll('.callback__form') ) {
        const form = document.querySelectorAll('.callback__form');
        form.forEach(item => {
            const formBtn = item.querySelector('.callback__form__button');
            const checkBtn = item.querySelector('.robot__check');

            formBtn.disabled = true;
            checkBtn.addEventListener('click', () => {
                checkBtn.classList.add('active');
            
                item.action = '/thankyou.php';
                const input = document.createElement("input");
                input.setAttribute("type", "hidden");
                input.setAttribute("name", "human");
                input.setAttribute("value", "human");
                input.classList.add('human');
                item.appendChild(input);
                formBtn.disabled = false;
            })
        })
    }

    if ( document.querySelector('.catalog .menu_secondary') ) {
        let loadImg = false
        const menu_list = document.querySelectorAll('.catalog .menu_secondary li')
        const caption = document.querySelector('.catalog .caption')
        const catalogImg = document.querySelector('.catalog_img')
        const preloader = document.querySelector('.catalog .preloader')

        menu_list.forEach((item, i) => {
            const menu_link = item.querySelector('a');
            item.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector('.catalog .menu_secondary li.active').classList.remove('active')

                catalogImg.src = ''
                preloader.classList.remove('hidden')

                this.classList.add('active')
                caption.textContent = menu_link.textContent


                let img = catalogImg;
                img.src = '/img/catalog/'+ (i + 1) +'.png';
                img.onload = function() { 
                    catalogImg.src = '/img/catalog/'+ (i + 1) +'.png'
                    preloader.classList.add('hidden')
                };
                img.onerror = function() {  };

                catalogImg.animate([
                    // keyframes
                    { transform: 'translateX(100%)' }, 
                    { transform: 'translateX(0)' }
                  ], { 
                    // timing options
                    duration: 600,
                  });
                  caption.animate([
                    // keyframes
                    { transform: 'translateX(100%)' }, 
                    { transform: 'translateX(0)' }
                  ], { 
                    // timing options
                    duration: 600,
                  });

            })
        })
    }

    if ( document.querySelector('.stone .menu_secondary') ) {
        const menu_list = document.querySelectorAll('.stone .menu_secondary li')
        const stoneImg = document.querySelector('.stone_img')
        const preloader = document.querySelector('.stone .preloader')

        menu_list.forEach((item, i) => {
            const menu_link = item.querySelector('a');
            item.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector('.stone .menu_secondary li.active').classList.remove('active')

                stoneImg.src = ''
                preloader.classList.remove('hidden')

                this.classList.add('active')


                let img = stoneImg;
                img.src = '/img/stone/'+ (i + 1) +'.jpg';
                img.onload = function() { 
                    stoneImg.src = '/img/stone/'+ (i + 1) +'.jpg';
                    preloader.classList.add('hidden')
                };
                img.onerror = function() {  };

                stoneImg.animate([
                    // keyframes
                    { transform: 'translateX(-100%)' }, 
                    { transform: 'translateX(0)' }
                  ], { 
                    // timing options
                    duration: 600,
                  });
            })
        })
    }
    
})

$(function() {

    if ($(window).width() < 567) {
        $(".col-grey").each( function () {
            $(this).attr('data-aos-delay', '0');
        });
    }

    $(window).scroll(function() {
        if($(this).scrollTop() != 0) {
           $('.toTop').fadeIn();
       } else {
           $('.toTop').fadeOut();
       }
   });
   $('.toTop').click(function() {
       $('body,html').animate({scrollTop:0},800);
   });

    $('#callback').on('show.bs.modal', function (event) {
        $('.navbar-collapse').collapse('hide');
        var button = $(event.relatedTarget);
        var modalTitle = button.data('title');
        var modal = $(this);
        if(modalTitle) {
            modal.find('.modal-body .title').val(modalTitle);
            modal.find('.modal-content .name').text(modalTitle);
        }
    });

    $(".tel").mask("+7 (999) 999-9999");

    $('.lazy').Lazy();

});