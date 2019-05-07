<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php');

	$db = new SafeMySQL();
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>АВТОНАКИДКИ.НЕТ - Контакты</title> 
	<meta name="Keywords" content="" /> 
	<meta name="Description" content="Адрес магазина в Краснодаре" />
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>
	<div class="menuid" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href="/" itemprop="url"><span itemprop="title">Главная</span></a> / Контакты
	</div>

	<div class="contact">
		<div class="row name">
			<div class="one-half column">
				<p><span>Название:</span> ИП Красовская А.В</p>
				<p><span>Реквизиты:</span> ИНН 010519930452, ОГРН 318237500371777</p>
				<p><span>Телефон:</span> 8 (918) 636-27-09 <a href="https://wa.me/7-918-636-27-09" target="_blank"><img src="/img/whatsapp.svg" alt="Whatsapp"> WhatsApp</a></p>
			</div>
			<div class="one-half column">
				<p><span>Адрес:</span> Краснодар, ул. Тургенева, 56</p>
				<p><span>График работы:</span> Пн - Пт с 9-00 до 17-00</p>
			</div>
		</div>
		
		
	</div>
	<div id="map_page"></div>	
	<script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
	<script type="text/javascript">
		ymaps.ready(init);
		
		function init() {
				myMap = new ymaps.Map('map_page', {
					center:[45.0454,38.9576],
					zoom: 15
				});
				 s = {
					iconLayout: 'default#image',
					iconImageHref: '/img/map_logo.svg',
					iconImageSize: [87, 74], 
					iconImageOffset: [-43, -56]
				};
				m = {
					m1: new ymaps.Placemark([45.0454,38.9576], {}, s),
					m1center:[45.0454,38.9576],
				};
				myMap.behaviors.disable('scrollZoom');
				//на мобильных устройствах... (проверяем по userAgent браузера)
				if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
					//... отключаем перетаскивание карты
					myMap.behaviors.disable('drag');
				}
				myMap.geoObjects
					.add(m['m1']);
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