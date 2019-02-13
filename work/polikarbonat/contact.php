<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); ?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>ПОЛИКАРБОНАТА.НЕТ - Контакты</title> 
	<meta name="Keywords" content="" /> 
	<meta name="Description" content="" />
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>
	<div class="menuid" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href="/" itemprop="url"><span itemprop="title">Главная</span></a> / <a href="/contact.php" itemprop="url"><span itemprop="title">Контакты</span></a>
	</div>

	<div class="contact">
		<div class="row name">
			<div class="four columns pad">
				<p><span>Телефон</span></p>
				<p class="phone">8 (918) 636-27-09 - Красовская Анна</p>
			</div>
			<div class="four columns pad">
				<p><span>График работы:</span></p>
				<p>Пн - Пт с 9-00 до 17-00</p>
			</div>
			<div class="four columns pad">
				<p><span>Почта</span></p>
				<p class="phone">info@polikarbonata.net</p>
			</div>
		</div>
		<div class="row magaz">
			<p>Адреса магазинов</p>
		</div>
		<div class="row adres">
			<div class="four columns map-info show">
				<a class="js_map" data-map="m1">
					<p><b>Краснодар</b></p>
					<p>ул. Красных Партизан, 2А</p>
				</a>
			</div>
			<div class="four columns map-info">
				<a class="js_map" data-map="m2">
					<p><b>Краснодар</b></p>
					<p>ул. Евдокии Бершанской, 349А</p>
				</a>
			</div>
			<div class="four columns map-info">	
				<a class="js_map" data-map="m3">
					<p><b>Новороссийск</b></p>
					<p>село Цемдолина, ул. Ленина, 26А</p>
				</a>
			</div>
		</div>
		<div class="row adres two">
			<div class="four columns map-info">	
				<a class="js_map" data-map="m4".
					<p><b>Славянск-на-Кубани</b></p>
					<p>ул. Пролетарская, 1/4</p>
				</a>
			</div>
			<div class="four columns map-info">	
				<a class="js_map" data-map="m5">
					<p><b>Тихорецк</b></p>
					<p>ул. Ачкасова, 2</p>
				</a>
			</div>
			<div class="four columns map-info">	
				<a class="js_map" data-map="m6">
					<p><b>Крымск</b></p>
					<p>ул. Коммунистическая, 153</p>
				</a>
			</div>
		</div>
	</div>
	<div id="map_page"></div>	
	<script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
	<script type="text/javascript">
		ymaps.ready(init);
		
		function init() {
				myMap = new ymaps.Map('map_page', {
					center:[45.0701,38.9048],
					zoom: 15
				});
				 s = {
					iconLayout: 'default#image',
					iconImageHref: '/img/map-ico.png',
					iconImageSize: [87, 74], 
					iconImageOffset: [-43, -56]
				};
				m = {
					m1: new ymaps.Placemark([45.0710,38.9038], {}, s),
					m1center:[45.0701,38.9048],
					m2: new ymaps.Placemark([45.0349,39.1317], {},s),
					m2center:  [45.0349,39.1317],
					m3: new ymaps.Placemark([44.7491,37.7263], {},s),
					m3center:  [44.7491,37.7265],
					m4: new ymaps.Placemark([45.2299,38.1138], {},s),
					m4center:  [45.2299,38.1138],
					m5: new ymaps.Placemark([45.8417,40.1357], {},s),
					m5center:  [45.8417,40.1357],
					m6: new ymaps.Placemark([44.9367,37.9675], {},s),
					m6center:  [44.9367,37.9675]
				};
				myMap.behaviors.disable('scrollZoom');
				//на мобильных устройствах... (проверяем по userAgent браузера)
				if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
					//... отключаем перетаскивание карты
					myMap.behaviors.disable('drag');
				}
				myMap.geoObjects
					.add(m['m1'])
					.add(m['m2'])
					.add(m['m3'])
					.add(m['m4'])
					.add(m['m5'])
					.add(m['m6']);
			};
			
			$(function(){
				js_map = $('.js_map');

				map_info = $('.map-info');
				js_map.click(function(){
					var elm = $(this);
					map_info.removeClass('show');
					$('#'+elm.data('map')).addClass('show');
					js_map.parent().removeClass('active');
					elm.parent().addClass('active');
					myMap.geoObjects.add(m[elm.data('map')]);
					myMap.setCenter(m[elm.data('map')+'center']);
				});
			})
		</script>
<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>