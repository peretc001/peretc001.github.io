//Разрешение экрана
window.onload = function(){
    console.log(window.screen.availWidth- (window.screen.availWidth - window.innerWidth));
};
$(window).on('scroll', function () {
    // remove any existing active
    $('.navbar').removeClass("active");

    // change bg color of active section
    $('.navbar').addClass("active");

    // change bg color of navbar
    $(".navbar").addClass("active");

});

$(window).scroll(function () {
    /* remove style on scroll back to top */
    if ($(document).scrollTop() < 60) {
        $('.navbar').removeClass('active');
    }
});

let priceItem = document.querySelectorAll('.services-item');
priceItem.forEach(item => {
    item.addEventListener('touchstart', (e) => {
        item.classList.add('active');
    });
    item.addEventListener('touchend', (e) => {
        item.classList.remove('active');
    })
})