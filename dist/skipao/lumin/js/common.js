
window.addEventListener("DOMContentLoaded", function() {
    
    let form = document.querySelectorAll('.callback__form');
    form.forEach(item => {
        let formBtn = item.querySelector('.callback__form__button');
        let checkBtn = item.querySelector('.robot__check');

        formBtn.disabled = true;
        checkBtn.addEventListener('click', () => {
            checkBtn.classList.add('active');
        
            item.action = './thankyou.php';
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

});

$(function() {
    $('.show_description').click(function(e){
        e.preventDefault();
        $(this).toggleClass('active');
        $('.hide_description').toggleClass('opener');
    });

    $('.hover-column').on('touchstart', function(e){
        $(".name").trigger("mouseover");
    });

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


    //Modal
    $('.callback__form').submit(function(e){
        e.preventDefault();
        var method=$(this).attr('method');
        var action=$(this).attr('action');
        var data=$(this).serialize();
        return $.ajax({ 
            type: method,
            url: action,
            data: data})
        .done(function () { 
            $('.modal-body').addClass("done");
            setTimeout(function () { 
                $(".request_callback__footer").fadeIn();
                $('.callback__form').trigger("reset");
            }, 100);
            setTimeout(function () { 
                $(".request_callback__footer").fadeOut();
            }, 3000);
            setTimeout(function () { 
                $(".request_callback__footer").fadeOut();
                $('.modal-body').removeClass("done");
                $('#callback').modal('hide');
            }, 3500);
        });
    });

    $('#callback').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modalTitle = button.data('title');
        var modal = $(this);
        if (modalTitle) {
            modal.find('.title').html('Заказать<br>' + modalTitle);
            modal.find('input[name="title"]').val(modalTitle);
        }
    });

    $(".phone_mask").mask("+7 (999) 999-99-99");

    $('.lazy').Lazy();
});