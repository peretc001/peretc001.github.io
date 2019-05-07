<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
	<title>РДМ, сайт на Wordpress - Портфолио</title>
	<meta name="description" content="Зацени сайт, который я сделал на wordpress для строительной компании РДМ">
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/header.php'; ?>
</head>

<body class="is-page">
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/nav.php'; ?>
	<div class="breadcrumbs">
		<div class="container">
			<a href="/">Главная</a> / <a href="/portfolio/">Портфолио</a> / <!-- a href="/portfolio/landing-page/">Landing page</a--> РДМ - строительный сайт на Woprdpress
		</div>
	</div>
	<section class="work">
		<div class="container">
			<div class="work-card">
				<p><b>Название:</b> РДМ, ООО</p>
				<p><b>Тематика:</b> Строительство</p>
				<p><b>Технологии:</b> Woprdpress, Owl carousel, Bootstrap4</p>
				<p><b>Ссылка:</b> <a href="https://remontdomov-msk.ru" target="_blank"><i class="fas fa-external-link-alt"></i> РДМ - ремонт загородных домов</a></p>
				<p><b>Задача:</b> Разработать Landing page страницу с возможностью редактирования через админку Wordpress (ниже видео) + блок новости</p>
			</div>
			<div id="player" data-video="mIgQ_xS0CcA"></div>

			<div class="introHolder wow fadeInUp">
				<h2 class="liner">Скрин админ панели</h2>
			</div>
			<img class="work-img" src="/assets/img/portfolio/remontdomov-msk-admin.jpg" alt="" class="wow fadeInUp">

			<div class="introHolder wow fadeInUp">
				<h2 class="liner">Скрин всего сайта</h2>
			</div>
			<img class="work-img" src="/assets/img/portfolio/remontdomov-msk-index.jpg" alt="" class="wow fadeInUp">
		</div>
	</section>
	
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer.php'; ?>
</body>
</html>