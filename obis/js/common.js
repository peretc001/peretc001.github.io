let width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth
const preventDefault = (e) => {e.preventDefault();}
const disableScroll = () => {
  document.body.addEventListener('touchmove', preventDefault, { passive: false });
  window.addEventListener('DOMMouseScroll', preventDefault, false);
  document.addEventListener('wheel', preventDefault, {passive: false});
}
const enableScroll = () => {
  document.body.removeEventListener('touchmove', preventDefault, { passive: false });
  window.removeEventListener('DOMMouseScroll', preventDefault, false);
  document.removeEventListener('wheel', preventDefault, {passive: false});
}
document.addEventListener("DOMContentLoaded", function() {

    const navMenu = document.querySelector('nav .menu')
    const hamburger = document.querySelector('.hamburger')

    const openMenu = () => {
      navMenu.classList.add('fade')
      hamburger.classList.add('open')
      setTimeout(() => {
          const div = document.createElement('div')
          div.classList.add('layout')
          document.body.appendChild(div)
          div.addEventListener('click', closeMenu)
          navMenu.classList.add('open')
      }, 100);
    }

    const closeMenu = (e) => {
        navMenu.classList.remove('open')
        hamburger.classList.remove('open')
        setTimeout(() => {
            const div = document.querySelector('.layout')
            div.parentNode.removeChild(div)
            navMenu.classList.remove('fade')
        }, 100);
    }
    
    hamburger.addEventListener('click', openMenu)

    // const form = document.querySelectorAll('.callback__form');
    // form.forEach(item => {
    //     const formBtn = item.querySelector('.callback__form__button');
    //     const checkBtn = item.querySelector('.robot__check');

    //     formBtn.disabled = true;
    //     checkBtn.addEventListener('click', () => {
    //         checkBtn.classList.add('active');
        
    //         item.action = '/thankyou.php';
    //         const input = document.createElement("input");
    //         input.setAttribute("type", "hidden");
    //         input.setAttribute("name", "human");
    //         input.setAttribute("value", "human");
    //         input.classList.add('human');
    //         item.appendChild(input);
    //         formBtn.disabled = false;
    //     })
    // })

    $('.main-slider').slick({
      draggable: true,
      slidesToShow: 1,
      swipeToSlide: true,
      infinite: false,
      arrows: false,
      dots: true,
      // autoplay: true,
      // autoplaySpeed: 3000
    });

    $('.review-slider').slick({
      draggable: true,
      slidesToShow: 1,
      swipeToSlide: true,
      infinite: true,
      arrows: true,
      dots: false,
      // autoplay: true,
      // autoplaySpeed: 3000
    });
    
});


$( document ).ready(function() {

    // $(".phone_mask").mask("8-999-999-99-99");

    // $('.lazy').Lazy();
});