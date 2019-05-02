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

let checkBtn = document.querySelector('.circle-loader');
let complete = document.querySelector('.checkmark');
checkBtn.addEventListener('click', () => {
  checkBtn.classList.add('load-complete');
  checkBtn.style.cursor = 'auto';
  complete.style.display = 'block';
});

$(function() {

    $(".navbar-nav > .nav-item").on("click","a", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1500);
    });
     
});