document.addEventListener("DOMContentLoaded", function() {

    if ( document.querySelector('.navbar') ) {
        const navbar = document.querySelector('.navbar');
        document.addEventListener('scroll', (e) => (window.scrollY > 60) ? navbar.classList.add('scrolled') : navbar.classList.remove('scrolled'));
    }
    
    if ( document.querySelectorAll('.callback__form') ) {
        const form = document.querySelectorAll('.callback__form')
        form.forEach(item => {
            const formBtn = item.querySelector('.callback__form__button')
            const checkBtn = item.querySelector('.robot__check')

            formBtn.disabled = true
            checkBtn.addEventListener('click', () => {
                if ( !checkBtn.classList.contains('active') ) {
                    checkBtn.classList.add('active')
                    item.action = '/thankyou.php'
                    const input = document.createElement("input")
                    input.setAttribute("type", "hidden")
                    input.setAttribute("name", "human")
                    input.setAttribute("value", "human")
                    input.classList.add('human')
                    item.appendChild(input)
                    formBtn.disabled = false
                } else {
                    checkBtn.classList.remove('active')
                    item.action = ''
                    if ( item.querySelector('input[name="human"]') ) {
                        input = item.querySelector('input[name="human"]')
                        item.removeChild(input)
                    }
                    formBtn.disabled = true
                }
            })
        })
    }
    
});


$( document ).ready(function() {

    $('#navbarToggle').on('show.bs.collapse', function () {
        $('.navbar-toggler').addClass('is-active')
        $('.navbar').addClass('is-active')
    })
    $('#navbarToggle').on('hide.bs.collapse', function () {
        $('.navbar-toggler').removeClass('is-active')
        $('.navbar').removeClass('is-active')
    })
    $(document).mouseup(function(e) {
        var container = $("#navbarToggle");
        if (!container.is(e.target) && container.has(e.target).length === 0) 
        {
            container.collapse('hide');
        }
    });

    $(window).bind('scroll.once', function(){
        if($(this).scrollTop() > 500) {
            show_map(); 
        }
    });
    function show_map() {
        $('.map').append('<script async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A04125497308e5c8a1aa811294a67992a7f8741631fa385bb93a6333f1510f306&amp;width=100%25&amp;height=450&amp;lang=ru_RU&amp;scroll=true"></script>');
        $(window).unbind('scroll.once')
     };

    $(".phone_mask").mask("+7 (999) 999-99-99");

    $('.lazy').Lazy();

});