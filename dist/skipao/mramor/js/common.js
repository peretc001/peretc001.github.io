'use strict';

document.addEventListener('DOMContentLoaded', () => {

    window.onload = function(){
        console.log(window.screen.availWidth- (window.screen.availWidth - window.innerWidth));
    };

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
                
                formBtn.disabled = false;
            })
        })
    }

    if ( document.querySelector('.catalog .menu_secondary') ) {
        document.querySelectorAll('.catalog .menu_secondary li')[0].classList.add('active')
        document.querySelectorAll('.catalog_img')[0].classList.add('active')
        document.querySelectorAll('.catalog_count')[0].classList.add('active')
        
        const menu_list = document.querySelectorAll('.catalog .menu_secondary li')
        const caption = document.querySelector('.catalog .caption')

        menu_list.forEach((item, i) => {
            const menu_link = item.querySelector('a');
            item.addEventListener('click', function(e) {
                e.preventDefault();
                
                if ( document.querySelector('.catalog .menu_secondary li.active') ) {
                    document.querySelector('.catalog .menu_secondary li.active').classList.remove('active')
                }
                this.classList.add('active')
                caption.textContent = menu_link.textContent

                if ( document.querySelector('.catalog_img.active') ) {
                    document.querySelector('.catalog_img.active').classList.remove('active')
                }

                if ( document.querySelector('.catalog_count.active') ) {
                    document.querySelector('.catalog_count.active').classList.remove('active')
                }
                
                let itemId = item.getAttribute('id')
                let catalogImg = document.querySelector('.catalog_img.'+ itemId)
                let catalogCount = document.querySelector('.catalog_count.'+ itemId)
                
                catalogImg.classList.add('active')
                catalogCount.classList.add('active')

                document.querySelector('.stones__page__url').href = '/stones' + item.getAttribute('data-url')
                document.querySelector('.online__page__url').href = '/online' + item.getAttribute('data-url')

            })
        })
    }

    if ( document.querySelector('.stone .menu_secondary') ) {
        document.querySelectorAll('.stone .menu_secondary li')[0].classList.add('active')
        document.querySelectorAll('.stone__list__img')[0].classList.add('active')

        const menu_list = document.querySelectorAll('.stone .menu_secondary li')

        menu_list.forEach((item, i) => {
            const menu_link = item.querySelector('a');
            item.addEventListener('click', function(e) {
                e.preventDefault();
                
                
                if ( document.querySelector('.stone .menu_secondary li.active') ) {
                    document.querySelector('.stone .menu_secondary li.active').classList.remove('active')
                }
                this.classList.add('active')

                if ( document.querySelector('.stone__list__img') ) {
                    document.querySelector('.stone__list__img.active').classList.remove('active')
                }

                let itemId = item.getAttribute('id')
                let stoneImg = document.querySelector('.stone__list__img.'+ itemId)              

                stoneImg.classList.add('active')

                document.querySelector('.izdelia__page__url').href = item.getAttribute('data-url')
            })
        })
    }

    if ( document.querySelector('.products-page.online__list') ) {
        let div = document.querySelector('.online_catalog_list').getAttribute('data-count-elem');
        for (let i = 0; i <= div; i++ ) {
            block = document.querySelectorAll('.elem-'+ i)

            block.forEach((item,index) => {
                if (index != 0) {
                    item.classList.add('hidden')
                } else {
                    let btn = item.querySelector('.show')
                    btn.addEventListener('click', () => {
                        document.querySelector('.next-' + i).classList.add('active')
                        btn.classList.add('hidden')
                        document.querySelector('.separator-' + i).classList.add('active')

                        document.querySelectorAll('.elem-'+ i).forEach((elem,ind) => {
                            if ( elem.classList.contains('hidden') ) {
                                document.querySelector('.separator-' + i).classList.add('active')
                                elem.classList.remove('hidden')
                            }
                            else if ( !elem.classList.contains('elem-first') ) {
                                document.querySelector('.separator-' + i).classList.remove('active')
                                elem.classList.add('hidden')
                            }
                                
                        })
                    })
                    let btn2 = item.querySelector('.show_img')
                    btn2.addEventListener('click', () => {
                        document.querySelector('.next-' + i).classList.add('active')
                        btn.classList.add('hidden')
                        document.querySelector('.separator-' + i).classList.add('active')

                        document.querySelectorAll('.elem-'+ i).forEach((elem,ind) => {
                            if ( elem.classList.contains('hidden') ) {
                                document.querySelector('.separator-' + i).classList.add('active')
                                elem.classList.remove('hidden')
                            }
                            else if ( !elem.classList.contains('elem-first') ) {
                                document.querySelector('.separator-' + i).classList.remove('active')
                                elem.classList.add('hidden')
                            }
                                
                        })
                    })  
                    
                    document.querySelector('.separator-' + i).addEventListener('click', () => {
                        document.querySelector('.next-' + i).classList.remove('active')
                        btn.classList.remove('hidden')
                        document.querySelectorAll('.elem-'+ i).forEach((elem,ind) => {
                            if ( elem.classList.contains('hidden') ) {
                                document.querySelector('.separator-' + i).classList.add('active')
                                elem.classList.remove('hidden')
                            }
                            else if ( !elem.classList.contains('elem-first') ) {
                                document.querySelector('.separator-' + i).classList.remove('active')
                                elem.classList.add('hidden')
                            }
                        })
                    })
                }
            })
        }
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