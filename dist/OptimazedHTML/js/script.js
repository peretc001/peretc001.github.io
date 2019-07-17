// Author: krasovsky
//
//
const priceCard = document.querySelectorAll('.price__card');
   priceCard.forEach(item => {
   const priceCardTitle = item.querySelector('.price__card > h4');
   priceCardTitle.addEventListener('click', () => {
         item.classList.toggle('active');
   });
});

const dateBtn = document.querySelectorAll('.lesson__row__date__item'); 
const dateShow = document.querySelectorAll('.col-date'); 

dateBtn.forEach(item => {
      const dateBtnLink = item.getAttribute('date-link');
      item.addEventListener('click', (e) => {
            dateShow.forEach(card => {
                  const dateShowLink = card.getAttribute('date-show');
                  if(dateShowLink === dateBtnLink) {
                        card.classList.toggle('active');
                        item.classList.toggle('active');
                  }
            })
      })
});

const hoverText = document.querySelectorAll('.hover__text');
hoverText.forEach(item => {
      const hiddenText = item.querySelector('.hidden__text');
      item.addEventListener('touchstart', () => {
            hiddenText.classList.add('is-active');
      });
      item.addEventListener('touchend', () => {
            hiddenText.classList.remove('is-active');
      });
});

jQuery(document).ready(function($) {

      jQuery('.navbar').on('show.bs.collapse', function () {
            jQuery('.hamburger').addClass('is-active');
      });
      jQuery('.navbar').on('hide.bs.collapse', function () {
            jQuery('.hamburger').removeClass('is-active');
      });

});


//Author: Somebody
//

jQuery(document).ready(function() {
      jQuery('.nav-tabs a').click(function(){
        jQuery('.nav-tabs a').find('img').attr('src', '<?php echo get_template_directory_uri(); ?>/img/unset.png');
        jQuery('#price').find('.tab-pane').hide();
        if(jQuery(this).hasClass('active')) {
      
          jQuery( jQuery(this).attr('href') ).hide();
          jQuery(this).removeClass('active');
        } else {
              jQuery(this).addClass('active');
          jQuery( jQuery(this).attr('href') ).show();
          jQuery(this).find('img').attr('src', '<?php echo get_template_directory_uri(); ?>/img/set.png');
      
            if (jQuery(window).width() < 960) {
              jQuery('html').animate({ 
                  scrollTop: jQuery( jQuery(this).attr('href') ).offset().top 
              }, 500 
              );
      
      
            }
      
        }
      
          return false;
      })
      
      jQuery('.navbar').on( "click", ".nav-link", function() {
              jQuery('html').animate({ 
                  scrollTop: jQuery( jQuery(this).attr('href') ).offset().top 
              }, 500 
              );
      });
      
});