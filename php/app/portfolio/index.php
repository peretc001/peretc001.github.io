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
		$result = $db->selectAll('portfolio');
?>
<body class="is-page">
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/nav.php'; ?>
	<div class="breadcrumbs">
		<div class="container">
			<a href="/">Главная</a> / Портфолио
		</div>
	</div>
	<section class="portfolio" id="portfolio">
		<div class="container">
			<div class="introHolder">
				<h1 class="liner">Портфолио</h1>
			</div>
			<div class="row">
			<?php 
				arsort($result);
				foreach($result as $row) { ?>
				<div class="col-md-4">
					<h4 class="the_title"><a href="/portfolio/<?php echo $row['portfolio']; ?>/<?php echo $row['img']; ?>.php"><?php echo $row['title']; ?></a></h4>
					<a class="portfolio-img" href="/portfolio/<?php echo $row['portfolio']; ?>/<?php echo $row['img']; ?>.php">
					<img src="/assets/img/portfolio/<?php echo $row['img']; ?>.jpg" 
						srcset = "/assets/img/portfolio/<?php echo $row['img']; ?>-350.jpg 350w,
						/assets/img/portfolio/<?php echo $row['img']; ?>.jpg 1280w"
						sizes = "(max-width: 375px) 350px,
									(max-width: 1200px) 1280px"
							alt="Разработка сайта <?php echo $row['title']; ?>">
						<span><i><?php echo $row['work']; ?></i></span>
					</a>
				</div>
			<?php } ?>
			</div>
		</div>
	</section>

	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer.php'; ?>
</body>
</html>
