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
        div.classList.add('js-gallery')
        sliderBlock.classList.add('js-gallery-block')
        
        let currentIndex = e.target.dataset.count

        document.body.appendChild(div)
        div.appendChild(sliderBlock)

        
        photoGallery.forEach(item => {
            sliderBlock.appendChild(item.querySelector('img').cloneNode(true))
        })
        

        setTimeout(() => {
            $('.js-gallery-block').slick({
                draggable: true,
                slidesToShow: 3,
                swipeToSlide: true,
                infinite: true,
                dots: false
            });
            setTimeout(() => {
                $('.js-gallery-block').slick('slickGoTo', currentIndex)
                
            }, 300);
        }, 500);

        // disableScroll()
    }

    photoGallery.forEach((item,i) => {
        console.log(i, item)
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