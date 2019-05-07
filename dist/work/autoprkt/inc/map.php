<article id="company">
	<script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

	<div id="map"></div>
	
	<script type="text/javascript">
			ymaps.ready(init);
			function init() {
					// Создание экземпляра карты и его привязка к контейнеру с
					// заданным id ("map").
					myMap = new ymaps.Map('map', {
						// При инициализации карты обязательно нужно указать
						// её центр и коэффициент масштабирования.
						center:[45.0454,38.9576],
						zoom: 16
					});
					s = {
						iconLayout: 'default#image',
						iconImageHref: 'img/parking.svg', // icon image
						iconImageSize: [70, 70], // image dimensions
						iconImageOffset: [-35, -71]
					};
					m = {
						m1: new ymaps.Placemark([45.0454,38.9576], {hintContent: '@autoprkt', balloonContent: '<div class="map_info"><p><b>@autoprkt</b><br>прокат Infiniti в Краснодаре</p><p>Адрес: Буденного, 2. ТЦ "Карнавал"</p><p>Тел: <strong>8 (928) 210-23-35</strong></p></div>'}, s)
					};
					myMap.behaviors.disable('scrollZoom');
					//на мобильных устройствах... (проверяем по userAgent браузера)
					if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
						//... отключаем перетаскивание карты
						myMap.behaviors.disable('drag');
					}
					myMap.geoObjects
						.add(m['m1']);
					/*myMap.controls
					 // Кнопка изменения масштаба.
					 .add('zoomControl', { left: 5, top: 5 })
					 // Список типов карты
					 .add('typeSelector')
					 // Стандартный набор кнопок
					 .add('mapTools', { left: 35, top: 5 });*/
				};
				
	</script>
	<div class="clear"></div>
</article>