<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); ?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Сертификарты - ПОЛИКАРБОНАТА.НЕТ</title> 
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php');	?>
	<link rel="stylesheet" href="/css/blueimp-gallery.css">
	<script src="/js/blueimp/blueimp-gallery.min.js"></script>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>
	
	<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
	<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
		<div class="slides"></div>
		<h3 class="title"></h3>
		<a class="prev">‹</a>
		<a class="next">›</a>
		<a class="close">×</a>
		<ol class="indicator"></ol>
	</div>
	
	<div class="menuid" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href="/" itemprop="url"><span itemprop="title">Главная</span></a> / <a href="/sertificat.php" itemprop="url"><span itemprop="title">Сертификаты</span></a>
	</div>

	<div class="sert">
		<div class="introHolder">
			<h1>Сертификаты</h1>
		</div>
		<div id="links">
			<div class="row">
				<div class="one-third column">
					<p><a class="img" href="img/sertificat/royalplast1.jpg"><img src="img/sertificat/royalplast1.jpg"></a></p>
					<p>Сертификат соответствия Royalplast</p>
				</div>
				<div class="one-third column">
					<p><a class="img" href="img/sertificat/royalplast2.jpg"><img src="img/sertificat/royalplast2.jpg"></a></p>
					<p>Пожарный cертификат Royalplast</p>
				</div>
				<div class="one-third column">
					<p><a class="img" href="img/sertificat/royalplast3.jpg"><img src="img/sertificat/royalplast3.jpg"></a></p>
					<p>Гарантийный cертификат Royalplast</p></td>
				</div>
			</div>
			<div class="row">
				<div class="one-third column">
					<p><a class="img" href="img/sertificat/polygal1.jpg"><img src="img/sertificat/polygal1.jpg"></a></p>
					<p>Сертификат соответствия Polygal</p>
				</div>
				<div class="one-third column">
					<p><a class="img" href="img/sertificat/polygal2.jpg"><img src="img/sertificat/polygal2.jpg"></a></p>
					<p>Пожарный cертификат Polygal</p>
				</div>
			</div>
		</div>
	</div>
	<script>
		document.getElementById('links').onclick = function (event) {
			event = event || window.event;
			var target = event.target || event.srcElement,
			link = target.src ? target.parentNode : target,
			options = {index: link, event: event, toggleControlsOnSlideClick: false},
			links = this.getElementsByTagName('a');
			blueimp.Gallery(links, options);
		};
	</script>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>
</body>
</html>