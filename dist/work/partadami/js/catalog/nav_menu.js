jQuery(document).ready(function(){
	var intervalID;
	jQuery("ul li.catalog_name").hover(
	  function () {
		var nav_menu = jQuery(this).find(".nav_menu_hide");
		intervalID=setTimeout(
			function() {
			nav_menu.slideDown();
			}, 500);
	  },
	  function () {
		jQuery(".nav_menu_hide").slideUp();
		clearInterval(intervalID);
	  }
	);
	$("ul li.catalog_name a").click(function(){
		if($(".nav_menu_hide").css('display')=='none'){
			$(".nav_menu_hide").slideDown();
		} else{
			$(".nav_menu_hide").slideUp();
		}
	});	
});