<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Портфолио</title>
	<meta name="description" content="Привет! Я Игорь, это мое Портфолио. Здесь собраны сайты которые я сделал. Заходи, тебе понравится!">
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/header.php'; ?>
</head>

<body class="is-page">
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/nav.php'; ?>
	<section class="portfolio" id="portfolio">
		<div class="container">
			<div class="introHolder wow fadeInUp">
				<h2 class="liner">Портфолио</h2>
			</div>
			<div class="row">
				<div class="col-md-4 wow fadeInUp">
					<h4 class="the_title">РДМ, загородное строительство</h4>
					<a href="/portfolio/landing-page/remontdomov-msk.php"><img src="/assets/img/portfolio/remontdomov-msk.jpg" alt="Разработка сайта для строительной компании"></a>
				</div>
				<div class="col-md-4 wow fadeInUp">
					<h4 class="the_title">Сайт начинающего инвестора</h4>
					<a href="/portfolio/informacionnyj-sajt/goodservice.php"><img src="/assets/img/portfolio/goodservices.jpg" alt="Информационный сайт на Wordpress"></a>
				</div>
				<div class="col-md-4 wow fadeInUp">
					<h4 class="the_title">Система учета клиентов CRM</h4>
					<a href="/portfolio/crm/crm.php"><img src="/assets/img/portfolio/crm.jpg" alt="Система учета клиентов CRM"></a>
				</div>

				<div class="col-md-4 wow fadeInUp">
					<h4 class="the_title">OK-HALL, дизайн проекты</h4>
					<a href="/portfolio/landing-page/ok-hall.php"><img src="/assets/img/portfolio/ok-hall.jpg" alt="Разработка Landing page для студии дизайна интерьеров"></a>
				</div>
				<div class="col-md-4 wow fadeInUp">
					<h4 class="the_title">ДЭМИ, интернет магазин</h4>
					<a href="/portfolio/internet-magazin/partadami.php"><img src="/assets/img/portfolio/partadami.jpg" alt="Интернет магазин детской мебели ДЭМИ"></a>
				</div>
				<div class="col-md-4 wow fadeInUp">
					<h4 class="the_title">ПОЛИКАРБОНАТА.НЕТ интернет-магазин</h4>
					<a href="/portfolio/internet-magazin/polikarbonat.php"><img src="/assets/img/portfolio/polikarbonat.jpg" alt="ПОЛИКАРБОНАТА.НЕТ интернет-магазин"></a>
				</div>
			</div>
		</div>
	</section>

	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer.php'; ?>
</body>
</html>
