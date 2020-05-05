let width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth
const preventDefault = (e) => {
    e.preventDefault();
}
const disableScroll = () => {
    if ( width < 767 ) {
        document.body.classList.add('no-scroll')
    } else {
        document.body.addEventListener('touchmove', preventDefault, { passive: false });
        window.addEventListener('DOMMouseScroll', preventDefault, false);
        document.addEventListener('wheel', preventDefault, {passive: false});
    }
}
const enableScroll = () => {
    if ( width < 767 ){
        document.body.classList.remove('no-scroll')
    } else {
        document.body.removeEventListener('touchmove', preventDefault, { passive: false });
        window.removeEventListener('DOMMouseScroll', preventDefault, false);
        document.removeEventListener('wheel', preventDefault, {passive: false});
    }
}

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

    const photoGallery = document.querySelectorAll('.photo--item')

    const openGallery = (e) => {
        e.preventDefault();
        const div = document.createElement('div')
        const sliderBlock = document.createElement('div')
        const sliderProgress = document.createElement('div')
        div.classList.add('js-gallery')
        sliderBlock.classList.add('js-gallery-block')
        sliderProgress.classList.add('js-gallery-progress')
        
        let currentIndex = parseInt(e.target.dataset.count)
        let maxIndex
        width > 991 ? maxIndex = photoGallery.length-2 : maxIndex = photoGallery.length-1

        document.body.appendChild(div)
        div.innerHTML = '<div class="close"></div>'
        div.appendChild(sliderBlock)

        photoGallery.forEach(item => {
            sliderBlock.appendChild(item.querySelector('img').cloneNode(true))
        })

        $('.js-gallery-block').slick({
            draggable: true,
            slidesToShow: 2,
            swipeToSlide: true,
            infinite: false,
            dots: false,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
        $('.js-gallery-block').slick('slickGoTo', currentIndex)

        disableScroll()

        div.appendChild(sliderProgress)
        sliderProgress.innerHTML = `<div class="js-gallery-thumb"></div><div class="js-gallery-count"><p class="start">0</p><p class="end">${width > 991 ? maxIndex+2 : maxIndex + 1}</p></div>`
        currentIndex != 0 ? sliderProgress.querySelector('.js-gallery-thumb').style.width = (currentIndex/maxIndex)*100 + '%' : sliderProgress.querySelector('.js-gallery-thumb').style.width = ''
        console.log(currentIndex)


        $('.js-gallery-block').on('beforeChange', function(event, slick, currentSlide, nextSlide){
            nextSlide != 0 ? sliderProgress.querySelector('.js-gallery-thumb').style.width = (nextSlide/maxIndex)*100 + '%' : sliderProgress.querySelector('.js-gallery-thumb').style.width = ''
          });

        document.querySelector('.close').addEventListener('click', closeGallery)
    }

    const closeGallery = (e) => {
        const jsGallery = document.querySelector('.js-gallery')
        jsGallery.parentElement.removeChild(jsGallery)
        $('.js-gallery-block').slick('unslick')
        enableScroll()
    }

    photoGallery.forEach((item,i) => {
        item.addEventListener('click', openGallery)
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