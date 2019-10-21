window.addEventListener("DOMContentLoaded", function() {
    let navbar = document.querySelector('.navbar');
    
    let form = document.querySelectorAll('.callback__form');
    form.forEach(item => {
        let formBtn = item.querySelector('.callback__form__button');
        let checkBtn = item.querySelector('.robot__check');

        formBtn.disabled = true;
        checkBtn.addEventListener('click', () => {
            checkBtn.classList.add('active');
        
            item.action = '/thankyou.php';
            let input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", "human");
            input.setAttribute("value", "human");
            input.classList.add('human');
            //if(input.classList.contains('human')) {} else {
                item.appendChild(input);
            //}
            formBtn.disabled = false;
        });
    });

    if( document.querySelector('.show_description') ) {
        let showDesc = document.querySelector('.show_description');
        let hideDesc = document.querySelector('.hide_description');
        showDesc.addEventListener('click', function() {
                this.classList.add('active');
                hideDesc.classList.add('opener');
                showDesc.style.display = 'none';
            
        });
    }
   

});

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
    });
    $('.navbar').on('hide.bs.collapse', function () {
        $('.hamburger').removeClass('is-active');
    });

    $('#callbackModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var recipient = button.data('hidden');
        var modalTitle = button.data('title');
        var modal = $(this);
        modal.find('.modal-body .recipient').val(recipient);
        if(modalTitle) {
            modal.find('.modal-header .modal-title').text(modalTitle);
        }
    });

    //Custom
$('.header__carousel').slick({
    lazyLoad: 'ondemand',
    autoplay: true,
    autoplaySpeed: 9000,
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    speed: 300,
    adaptiveHeight: false,
    dots: true,
    arrows: false
});

$('.partners__carousel').slick({
    lazyLoad: 'ondemand',
    autoplay: true,
    autoplaySpeed: 9000,
    slidesToShow: 5,
    slidesToScroll: 1,
    infinite: true,
    speed: 300,
    adaptiveHeight: false,
    dots: false,
    responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
});

});