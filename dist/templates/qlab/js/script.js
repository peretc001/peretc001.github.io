$(function() {

	$('.navbar').on('show.bs.collapse', function () {
		$('.hamburger').addClass('is-active');
	});
	$('.navbar').on('hide.bs.collapse', function () {
		$('.hamburger').removeClass('is-active');
	});
	
	$('[data-toggle="tooltip"]').tooltip();

	if($("div").is(".grid")) {
		$('grid').gridLayout();
	}

	//switch button
	if($("div").is(".switch")) {
		$('.protocol-send--after').hide();
		$('.switch').click(function(){
			$(this).toggleClass('switchOn');
			if($(this).hasClass('switchOn')) {
				$('.btn-submit').prop('disabled', false);
				$('.protocol-send--before').hide();
				$('.protocol-send--after').show();
			} else {
				$('.btn-submit').prop('disabled', true);
				$('.protocol-send--before').show();
				$('.protocol-send--after').hide();
			}
		});
	};

	//switch message
	let flag = document.querySelectorAll('.flag_message');
	flag.forEach(item => {
		item.addEventListener('click', () => {
			let block = item.closest(".message-body");
			if(block.classList.contains('unmarked')) {
				block.classList.remove('unmarked');
				block.classList.add('marked');
			} else {
				block.classList.remove('marked');
				block.classList.add('unmarked');
			}
		})
	});

	if($("div").is(".switchFlag")) {
		$('.switchFlag').click(function(){
			$(this).toggleClass('switchFlagOn');
			if($(this).hasClass('switchFlagOn')) {
				$('.unmarked').hide();
			} else {
				$('.unmarked').show();
			}
		});
	};


	if($("input").is(".datepicker")) {
		$.fn.datepicker.dates['ru'] = {
			days: ["Восерсенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"],
			daysShort: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
			daysMin: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
			months: ["Январь", "Феврль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октярь", "Ноябрь", "Декабрь"],
			monthsShort: ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек"],
			today: "Сегодня",
			clear: "Очистить",
			format: "dd.mm.yyyy",
			titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
			weekStart: 1
		};
		$('.datepicker').datepicker({
			language: 'ru'
		});
		$('.datepicker').datepicker("setDate", new Date());
	};

	$("select").selectize({
		persist: false,
		createOnBlur: true,
		create: true
	});
});
