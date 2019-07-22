$('.show_description').click(function(e){
      e.preventDefault();
      $(this).toggleClass('active');
      $('.hide_description').toggleClass('opener');
      if (!$(this).data('status')) {
      } else {
      }
});