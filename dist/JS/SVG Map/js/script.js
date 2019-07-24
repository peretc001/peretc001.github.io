$('.navbar').on('show.bs.collapse', function () {
   $('.hamburger').addClass('is-active');
});
$('.navbar').on('hide.bs.collapse', function () {
   $('.hamburger').removeClass('is-active');
});

$('.show_description').click(function(e){
   e.preventDefault();
   $(this).toggleClass('active');
     $('.hide_description').toggleClass('open');
 });

 $('.show_news').click(function(e){
   e.preventDefault();
   $(this).toggleClass('active');
     $('.hide_news').toggleClass('open');
 });

//Mobile search
let searchBtn = document.querySelector('.search_btn');
let search = document.querySelector('.search');
let form = document.querySelector('.search > form');
let formInput = document.querySelector('#search-input');
let formBtn = document.querySelector('#search-btn');

let header = document.querySelector('.header');

function openSearch() {
	search.classList.add('active');
};
function closeSearch() {
	search.classList.remove('active');
};
searchBtn.addEventListener('click', () => {
	openSearch();
})
form.addEventListener('click', (e) => {
   if(e.target !== formInput && e.target !== formBtn) {
      closeSearch();
   }
});
header.addEventListener('click', (e) => {
   if(search.classList.contains('active')) {
      closeSearch();
	}
});

//Carousel
$(".popular-carousel").owlCarousel({ 
   loop: 0, 
   items: 4, 
   smartSpeed: 700, 
   nav: true, 
   dots: true, 
   responsiveClass: 0, 
   responsive: { 
      0: { items: 2 },
      768: { items: 3 }, 
      992: { items: 4 } 
   } 
});