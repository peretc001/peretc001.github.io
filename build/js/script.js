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

$(function() {
    ymaps.ready(init);

    function init() {
        myMap = new ymaps.Map('map_page', {
            center: [55.7900,37.6000],
            zoom: 11
        });
        s = {
            iconLayout: 'default#image',
            iconImageHref: 'http://ok-hall.ru/wp-content/themes/okhall/img/logo-map.svg',
            iconImageSize: [87, 74],
            iconImageOffset: [-43, -56]
        };
        m = {
            m1: new ymaps.Placemark([55.7893,37.5668], {}, s)
        };
        
        myMap.geoObjects .add(m["m1"]);

        myMap.behaviors.disable('drag');
    };
     
});