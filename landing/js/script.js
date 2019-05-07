//Разрешение экрана
window.onload = function(){
    console.log(window.screen.availWidth- (window.screen.availWidth - window.innerWidth));
};

new WOW().init();

let player = document.querySelector('#player');
if(player) {
//Создаем плеер и помещаем туда какое-то видео
function createVideo() {
    let video_id = player.getAttribute('data-video');
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    
    setTimeout(() => {
        player = new YT.Player('player', {
            height: '100%',
            width: '100%',
            videoId: video_id
        });
    }, 1000);
}
createVideo();
}
$(function() {

    if ($(window).width() < '650') {
        var classesOfInterest = '';
        for (var i = 1; i <= 10; i++)
            classesOfInterest += ' ' + 'ddelay-' + i + 's';
        $('.steps .bounceIn').removeClass(classesOfInterest);
        $('.steps .fadeInUp').removeClass('ddelay-10s');
    }

});