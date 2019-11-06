'use strict';

document.addEventListener('DOMContentLoaded', () => {

    if ( document.querySelector('.hamburger') ) {
        const hamburger = document.querySelector('.hamburger');
        const menu = document.querySelector('.menu')
        hamburger.addEventListener('click', function() {
            if ( !menu.classList.contains('is-opened') ) {
                this.classList.add('is-active')
                menu.classList.add('is-opened')
            } else {
                this.classList.remove('is-active')
                menu.classList.add('is-close')
                setTimeout(() => {
                    menu.classList.remove('is-close')
                    menu.classList.remove('is-opened')
                }, 600);
            }
        })

        document.addEventListener('click', (e) => {
            if ( menu.classList.contains('is-opened') && e.target == document.querySelector('.mobile-menu') ) {
                hamburger.classList.remove('is-active')
                menu.classList.add('is-close')
                setTimeout(() => {
                    menu.classList.remove('is-close')
                    menu.classList.remove('is-opened')
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
        const menu_list = document.querySelectorAll('.catalog .menu_secondary li')
        const caption = document.querySelector('.catalog .caption')
        const catalogImg = document.querySelector('.catalog_img')
        menu_list.forEach((item, i) => {
            const menu_link = item.querySelector('a');
            item.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector('.catalog .menu_secondary li.active').classList.remove('active')
                this.classList.add('active')
                caption.textContent = menu_link.textContent
                catalogImg.src = '/img/catalog/'+ (i + 1) +'.png'
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
        menu_list.forEach((item, i) => {
            const menu_link = item.querySelector('a');
            item.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector('.stone .menu_secondary li.active').classList.remove('active')
                this.classList.add('active')
                stoneImg.src = '/img/stone/'+ (i + 1) +'.jpg'
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