$(function() {

	$('.navbar').on('show.bs.collapse', function () {
		$('.hamburger').addClass('is-active');
	});
	$('.navbar').on('hide.bs.collapse', function () {
		$('.hamburger').removeClass('is-active');
	});
	
	$('[data-toggle="tooltip"]').tooltip();

	// if ($(window).width() < '992') {
	// 	var max_col_height = 0; // максимальная высота, первоначально 0
	// 	$('.card-item').each(function(){ // цикл "для каждой из колонок"
	// 		if ($(this).height() > max_col_height) { // если высота колонки больше значения максимальной высоты,
	// 			max_col_height = $(this).height(); // то она сама становится новой максимальной высотой
	// 		}
	// 	});
	// 	var max_gen_col_height = 0;
	// 	$('.col-sm-6').each(function(){ // цикл "для каждой из колонок"
	// 		if ($(this).height() > max_gen_col_height) { // если высота колонки больше значения максимальной высоты,
	// 			max_gen_col_height = $(this).height(); // то она сама становится новой максимальной высотой
	// 		}
	// 	});
	// 	$('.col-sm-6').height(max_col_height);
	// 	console.log(max_col_height);
	// 	console.log(max_gen_col_height);
	// 	Maxheight = max_col_height + max_gen_col_height;
	// 	console.log(Maxheight);
	// 	$('.general-card').height(max_gen_col_height);
		
	// }
});
