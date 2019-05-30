<!DOCTYPE html>
<html lang="ru">
<head>
<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/JsonDB.class.php';
$db = new JsonDB( $_SERVER['DOCUMENT_ROOT'] . '/portfolio/' );
	$result = $db->select('portfolio', 'id', 8);
		$title 			= $result[0]['title'];
		$description 	= $result[0]['description'];
		$themes 			= $result[0]['themes'];
		$tech 			= $result[0]['tech'];
		$url 				= $result[0]['url'];
		$about 			= $result[0]['about'];
		$img 				= $result[0]['img'];
		$video 			= $result[0]['video'];
?>
<meta charset="utf-8">
	<title><?php echo $title; ?> - Портфолио</title>
	<meta name="description" content="<?php echo $description; ?>">
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/header.php'; ?>
</head>

<body class="is-page">
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/nav.php'; ?>
	<div class="breadcrumbs">
		<div class="container">
			<a href="/">Главная</a> / <a href="/portfolio/">Портфолио</a> / <a href="/portfolio/design/"><?php echo $themes; ?></a> / <?php echo $title; ?>
		</div>
	</div>
	<section class="work">
		<div class="container">
			<div class="work-card">
				<p><b>Название:</b> <?php echo $title; ?></p>
				<p><b>Тематика:</b> <?php echo $themes; ?></p>
				<p><b>Технологии:</b> <?php echo $tech; ?></p>
				<p><b>Ссылка:</b> <a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt"></i> <?php echo $title; ?></a></p>
				<p><b>Задача:</b> <?php echo $about; ?></p>
			</div>
			<?php if ($video) { ?><div id="player" data-video="<?php echo $video; ?>"></div><?php } ?>
			<div class="introHolder wow fadeInUp">
				<h2 class="liner">Скрин</h2>
			</div>
			<img class="work-img" src="/assets/img/portfolio/<?php echo $img; ?>-index.jpg" alt="<?php echo $title; ?>" class="wow fadeInUp">
		</div>
	</section>
	
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer.php'; ?>
</body>
</html>