//Разрешение экрана
window.onload = function(){
    console.log(window.screen.availWidth- (window.screen.availWidth - window.innerWidth));
};

new WOW().init();

$(function() {

    if ($(window).width() < '650') {
        var classesOfInterest = '';
        for (var i = 1; i <= 10; i++)
            classesOfInterest += ' ' + 'ddelay-' + i + 's';
        $('.steps .bounceIn').removeClass(classesOfInterest);
        $('.steps .fadeInUp').removeClass('ddelay-10s');
    }

});