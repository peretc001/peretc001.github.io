document.addEventListener("DOMContentLoaded", function() {

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

});


$( document ).ready(function() {

    $('#navbarToggle').on('show.bs.collapse', function () {
        $('.hamburger').addClass('open')
    })
    $('#navbarToggle').on('hide.bs.collapse', function () {
        $('.hamburger').removeClass('open')
    })


    $(".phone_mask").mask("8-999-999-99-99");

    $('.lazy').Lazy();
});