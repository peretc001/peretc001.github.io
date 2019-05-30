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

	//Календарь
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

	//Mask

	if($("div").is(".protocol-right")) {
		$(".protocol-vl").mask("11,29");
		$(".protocol-num").mask("999");
		$(".protocol-under").mask("9 9 9");
		$(".protocol-divider").mask("99,9");
	}
});

//Вставляем значение селекта в селект :)
let selected = document.querySelectorAll('.dropdown-item');
//Если есть на странице boorstrab selectы
if(selected) {
	//Перебираем все
	selected.forEach(item => {
		//Вещаем клик
		item.addEventListener('click', () => {
			//Определяем родительский блок > первую ссылку
			let block = item.closest(".dropdown").children[0];
			//Вставляем занчение в нее
			block.innerHTML = item.textContent;
		})
		//Вуаля бля -- магия
	})
}

//Находим селект для отображения Прочитанных - Непрочитанных
let showHideBtn = document.querySelector('.showHide');
//Если он есть на страницу
if(showHideBtn) {
	//Берем весб блок
	//let block = document.querySelectorAll(".message-body");
	//Берем ссылки Прочитанные - непрочитанные - все сообщения
	let dateAttr = showHideBtn.querySelectorAll('.dropdown-item');
	//Перебираем их
	dateAttr.forEach(item => {
		//Достаем значение data атрибута
		let showAttr = item.getAttribute('data-show');
		//Вещаем клик на ссылку с этим атрибутом
		item.addEventListener('click', () => {
			//Находим Непрочитанные блоки
			let unread = document.querySelectorAll(".unread");
			//Находим Прочитанные
			let read = document.querySelectorAll(".read");
			//Находим отмеченные блоки
			let mark = document.querySelectorAll(".unmarked");
			//Если выбрано показать Прочитанные
			if(showAttr === 'read') {
				//Берем непрочитанные
				unread.forEach(item => {
					//Скрываем их
					item.style.display = 'none';
				})
				//Берем прочитанные
				read.forEach(item => {
					//Показываем их
					item.style.display = 'block';
				})
			} 
			//Если выбрано показать Непрочитанные
			else if (showAttr === 'unread'){
				//Берем непрочитанные
				unread.forEach(item => {
					//Показывае их
					item.style.display = 'block';
				})
				//Берем прочитанные
				read.forEach(item => {
					//Скрываем их
					item.style.display = 'none';
				})
			} 
			//Если выбрано показать Все
			else {
				//Берем непрочитанные
				unread.forEach(item => {
					//Показываем
					item.style.display = 'block';
				})
				//Берем прочитанные
				read.forEach(item => {
					//Показываем
					item.style.display = 'block';
				})
			}
		})
	})
	//Флажки для сообщений
	let flag = document.querySelectorAll('.flag_message');
	//Если на странице есть флажки
	if(flag) {
		//Берем все флафжки и перебираем
		flag.forEach(item => {
			//Вешаем клик на каждый
			item.addEventListener('click', () => {
				//Определяем родителя отмеченного блока
				let block = item.closest(".message-body");
				//Если он не отмечен
				if(block.classList.contains('unmarked')) {
					//Удаляем серый флажок
					block.classList.remove('unmarked');
					//Ставим синий флажок
					block.classList.add('marked');
				} //Если уже помечен
				else {
					//Удаляем синий флажок
					block.classList.remove('marked');
					//Ставим серый
					block.classList.add('unmarked');
				}
			})
		});
	}
	//Переключатель Отмеченные - неотмеченные
	let switchFlag = document.querySelector('.switchFlag');
	//Если на странице есть переключатель
	if(switchFlag) {
		//Вешаем клик на переключатель
		switchFlag.addEventListener('click', () => {
			//Добавляем класс переключения
			switchFlag.classList.toggle('switchFlagOn');
			//Находим неотмеченные
			let unmarked = document.querySelectorAll(".unmarked");
			//Если переключатель Включен
			if(switchFlag.classList.contains('switchFlagOn')) {
				//Перебираем все непомеченные блоки
				unmarked.forEach(item => {
					//Скрываем
					item.style.display = 'none';
				})				
			} 
			//Иначе, если переключатель Выключен
			else {
				//Перебираем все непомеченные блоки
				unmarked.forEach(item => {
					//Показываем их
					item.style.display = 'block';
				})
			}
		});
	}	
}

let phone = document.querySelector('.user-contact');
if (phone) {
	//Phone mask
	[].forEach.call( document.querySelectorAll('.phone'), function(input) {
		var keyCode;
		function mask(event) {
			 event.keyCode && (keyCode = event.keyCode);
			 var pos = this.selectionStart;
			 if (pos < 3) event.preventDefault();
			 var matrix = "+7 (___) ___ ____",
				  i = 0,
				  def = matrix.replace(/\D/g, ""),
				  val = this.value.replace(/\D/g, ""),
				  new_value = matrix.replace(/[_\d]/g, function(a) {
						return i < val.length ? val.charAt(i++) || def.charAt(i) : a;
				  });
			 i = new_value.indexOf("_");
			 if (i != -1) {
				  i < 5 && (i = 3);
				  new_value = new_value.slice(0, i);
			 }
			 var reg = matrix.substr(0, this.value.length).replace(/_+/g,
				  function(a) {
						return "\\d{1," + a.length + "}"
				  }).replace(/[+()]/g, "\\$&");
			 reg = new RegExp("^" + reg + "$");
			 if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) this.value = new_value;
			 if (event.type == "blur" && this.value.length < 5)  this.value = "";
		}
  
		input.addEventListener("input", mask, false);
		input.addEventListener("focus", mask, false);
		input.addEventListener("blur", mask, false);
		input.addEventListener("keydown", mask, false);
  });
}