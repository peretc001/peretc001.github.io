window.addEventListener("DOMContentLoaded", function() {
   let navbar = document.querySelector('.navbar');
    document.addEventListener('scroll', (e) => {
        if(window.scrollY > 60) {
            navbar.classList.add('is-active');
        }
        else {
            navbar.classList.remove('is-active');
        }
    });
})
$(function() {
   $('.navbar').on('show.bs.collapse', function () {
      $('.hamburger').addClass('is-active');
      $('body').addClass('opener');
   });
   $('.navbar').on('hide.bs.collapse', function () {
      $('.hamburger').removeClass('is-active');
      $('body').removeClass('opener');
   });
})