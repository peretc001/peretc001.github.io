//Разрешение экрана
window.onload = function(){
    console.log(window.screen.availWidth- (window.screen.availWidth - window.innerWidth));
};

let navbar = document.querySelector('.navbar');
document.addEventListener('scroll', (e) => {
    if(window.scrollY > 60) {
        navbar.classList.add('active');
    }
    else {
        navbar.classList.remove('active');
    }
});

$(".review-carousel").owlCarousel({ 
    loop: !0, 
    items: 1, 
    smartSpeed: 700, 
    nav: true, 
    navText: ['<i class="fas fa-quote-left"></i>', ' <i class="fas fa-quote-right"></i>'], 
    dots: true 
});

let form = document.querySelectorAll('.callback__form');
form.forEach(item => {
    let formBtn = item.querySelector('.callback__form__button');
    let checkBtn = item.querySelector('.circle-loader');
    let complete = item.querySelector('.checkmark');

    formBtn.disabled = true;
    checkBtn.addEventListener('click', () => {
        checkBtn.classList.add('load-complete');
        checkBtn.style.cursor = 'auto';
        complete.style.display = 'block';
    
        item.action = '/thankyou.php';
        var input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", "human");
        input.setAttribute("value", "human");
        item.appendChild(input);
        formBtn.disabled = false;
    });
});

$(function() {

    $(".navbar-nav > .nav-item").on("click","a", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1500);
    });
    $(".header-content").on("click","a", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1500);
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
    
});