<!DOCTYPE html>
<html lang="ru">
<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/JsonDB.class.php';
	$db = new JsonDB( $_SERVER['DOCUMENT_ROOT'] . '/portfolio/' );
		$result = $db->select('portfolio', 'portfolio', 'internet-magazin');
		foreach($result as $row) {
			$themes = $row['themes'];
		}
?>
<head>
	<meta charset="utf-8">
	<title><?php echo $themes; ?> - Портфолио</title>
	<meta name="description" content="Привет! Я Игорь, это мое Портфолио. На этой странице собраны работы по теме: <?php echo $themes; ?>">
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/header.php'; ?>
</head>

<body class="is-page">
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/nav.php'; ?>
	<div class="breadcrumbs">
		<div class="container">
			<a href="/">Главная</a> / <a href="/portfolio/">Портфолио</a> / <?php echo $themes; ?>
		</div>
	</div>
	<section class="portfolio" id="portfolio">
		<div class="container">
			<div class="introHolder">
				<h1 class="liner"><?php echo $themes; ?></h1>
			</div>
			<div class="row">
			<div class="offset-md-2">&nbsp;</div>
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
			<div class="row text-center">
				<blockquote>
					<p>Разработка интернет-магазинов под ключ на базе Wordpress + WooCommerce</p>
					<p>Работаю под ключ, на своем сервере. Вы можете наблюдать в режиме онлайн за ходом работ</p>
					<p>Используемые технологии HTML5, CSS, Bootstrap4, Grid, JS</p>
					<p>В итоге вы получите интернет-магазин с возможностью редактирования и добавления товаров через админ панель без знания языков программирования.</p>
				</blockquote>
			</div>
			<div class="row text-center">
				<button class="btn btn-accent m-auto" data-toggle="modal" data-target="#callbackModal" data-title="<?php echo $themes; ?> - Заказать" data-hidden="<?php echo $themes; ?>">Заказать сайт</button>
			</div>
		</div>
	</section>

	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer.php'; ?>
</body>
</html>
