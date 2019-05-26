<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Портфолио</title>
	<meta name="description" content="Привет! Я Игорь, это мое Портфолио. Здесь собраны сайты которые я сделал. Заходи, тебе понравится!">
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/header.php'; ?>
</head>
<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/JsonDB.class.php';
	$db = new JsonDB( $_SERVER['DOCUMENT_ROOT'] . '/portfolio/' );
		$result = $db->select('portfolio', 'themes', 'Информационный');
?>
<body class="is-page">
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/nav.php'; ?>
	<div class="breadcrumbs">
		<div class="container">
			<a href="/">Главная</a> / <a href="/portfolio/">Портфолио</a> / Информационный
		</div>
	</div>
	<section class="portfolio" id="portfolio">
		<div class="container">
			<div class="introHolder wow fadeInUp">
				<h2 class="liner">Портфолио</h2>
			</div>
			<div class="row">
			<?php 
				arsort($result);
				foreach($result as $row) { ?>
				<div class="col-md-4 wow fadeInUp">
					<h4 class="the_title"><?php echo $row['title']; ?></h4>
					<a href="/portfolio/<?php 
						if($row['themes'] == 'Landing page') { echo 'landing-page'; }
						if($row['themes'] == 'Система учета') { echo 'crm'; }
						if($row['themes'] == 'Интернет-магазин') { echo 'internet-magazin'; }
						if($row['themes'] == 'Информационный') { echo 'informacionnyj-sajt'; }
					?>/<?php echo $row['img']; ?>.php"><img src="/assets/img/portfolio/<?php echo $row['img']; ?>.jpg" alt="Разработка сайта <?php echo $row['title']; ?>"></a>
				</div>
			<?php } ?>
			</div>
		</div>
	</section>

	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer.php'; ?>
</body>
</html>
