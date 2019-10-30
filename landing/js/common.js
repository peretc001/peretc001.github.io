'use strict';

document.addEventListener('DOMContentLoaded', () => {

    const navbar = document.querySelector('.navbar');
    document.addEventListener('scroll', (e) => {
        if(window.scrollY > 20) {
            navbar.classList.add('is-active');
        }
        else {
            navbar.classList.remove('is-active');
        }
    })

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
})

$(function() {
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

   $('.navbar').on('show.bs.collapse', function () {
        $('.hamburger').addClass('is-active');
        $('.navbar').addClass('is-opened');
    });
    $('.navbar').on('hidden.bs.collapse', function () {
        $('.hamburger').removeClass('is-active');
        $('.navbar').removeClass('is-opened');
    });
    $('.navbar-nav>li>a').on('click', function(){
        $('.navbar-collapse').collapse('hide');
    });
    $(document).mouseup(function(e) {
        var container = $("#navbarToggle");
        if (!container.is(e.target) && container.has(e.target).length === 0) 
        {
            container.collapse('hide');
        }
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