<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Разработка сайтов под ключ, Wordpress, CRM</title>
	<meta name="description" content="Привет! Я Игорь, я занимаюсь версткой и разработкой сайтов под ключ. Портфолио офигенное!">
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/header.php'; ?>
</head>

<body class="is-home">
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/nav.php'; ?>
	<header class="header" id="header" style="background-image:url('/assets/img/header.jpg')">
			<h1>Разработка сайтов под ключ</h1>
			<p>Привет, меня зовут Игорь,<br>я занимаюсь разработкой сайтов под ключ.</p>
			<p>Разрабатываю: Landing page, CRM, личные кабинеты, сайты на Wordpress и интернет-магазины</p>
	</header>

	<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/JsonDB.class.php';
	$db = new JsonDB( $_SERVER['DOCUMENT_ROOT'] . '/portfolio/' );
		$result = $db->selectAll('portfolio');
	?>
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
					<h4 class="the_title"><a href="/portfolio/<?php 
						if($row['themes'] == 'Landing page') { echo 'landing-page'; }
						if($row['themes'] == 'Система учета') { echo 'crm'; }
						if($row['themes'] == 'Интернет-магазин') { echo 'internet-magazin'; }
						if($row['themes'] == 'Информационный') { echo 'informacionnyj-sajt'; }
					?>/<?php echo $row['img']; ?>.php"><?php echo $row['title']; ?></a></h4>
					<a class="portfolio-img" href="/portfolio/<?php 
						if($row['themes'] == 'Landing page') { echo 'landing-page'; }
						if($row['themes'] == 'Система учета') { echo 'crm'; }
						if($row['themes'] == 'Интернет-магазин') { echo 'internet-magazin'; }
						if($row['themes'] == 'Информационный') { echo 'informacionnyj-sajt'; }
					?>/<?php echo $row['img']; ?>.php"><img src="/assets/img/portfolio/<?php echo $row['img']; ?>.jpg" 
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

	<section class="steps" id="steps">
		<div class="container">
			<div class="introHolder wow bounceIn">
				<h2 class="liner">
					Этапы разработки сайта
				</h2>
			</div>
			<div class="row">
				<div class="col-sm-6 col-lg-4 wow bounceIn">
					<img src="/assets/img/task.svg" alt="">
					<p>Формирование задач</p>					
					<ul>
						<li>Сбор данных</li>
						<li>Анализ ниши</li>
					</ul>
				</div>
				<div class="col-sm-6 col-lg-4 wow bounceIn">
					<img src="/assets/img/prototype.svg" alt="">
					<p>Проектирование</p>
					<ul>
						<li>Составление плана + ТЗ</li>
						<li>Создание прототипа</li>
					</ul>
				</div>
				<div class="col-sm-6 col-lg-4 wow bounceIn">
					<img src="/assets/img/design.svg" alt="">
					<p>Дизайн сайта</p>
					<ul>
						<li>Проектирование интерфейса сайта</li>
						<li>Создание дизайна основной и мобильной версии</li>
					</ul>
				</div>
			
				<div class="col-sm-6 col-lg-4 wow bounceIn">
					<img src="/assets/img/code.svg" alt="">
					<p>Верстка</p>
					<ul>
						<li>Верстка (html, css, js) и размещение элементов</li>
						<li>Настройка функциональности</li>
					</ul>
				</div>
				<div class="col-sm-6 col-lg-4 wow bounceIn">
					<img src="/assets/img/programming.svg" alt="">
					<p>Программирование</p>
					<ul>
						<li>Посадка на CMS (систему управления)</li>
						<li>Автоматизация действий и процессов</li>
					</ul>
				</div>
				<div class="col-sm-6 col-lg-4 wow bounceIn">
					<img src="/assets/img/copywriting.svg" alt="">
					<p>Наполнение</p>
					<ul>
						<li>Составление ТЗ для копирайтера</li>
						<li>Написание и внедрение текстов</li>
					</ul>
				</div>
			
				<div class="col-sm-6 col-lg-4 wow bounceIn">
					<img src="/assets/img/testing.svg" alt="">
					<p>Тестирование сайта</p>
					<ul>
						<li>Глобальное тестирование перед запуском</li>
						<li>Тестирование на разных устройствах</li>
					</ul>
				</div>
				<div class="col-sm-6 col-lg-4 wow bounceIn">
					<img src="/assets/img/start.svg" alt="">
					<p>Запуск сайта</p>
					<ul>
						<li>Запуска сайта</li>
						<li>Передача сайта и обучение</li>
					</ul>
				</div>
				<div class="col-sm-8 offset-sm-2 col-lg-4 offset-lg-0 wow bounceIn">
					<img src="/assets/img/support.svg" alt="">
					<p>Поддержка</p>
					<ul>
						<li>Дальнейшая поддержка заказчика</li>
						<li>Возможность внедрения новых функций</li>
					</ul>
				</div>
			</div>
			<!-- <div class="row text-center wow fadeInUp">
				<blockquote>
					<p>Шикарная схема, правда? Я ее два дня придумывал или стащил у кого-то, я уже не помню.</p>
					<p>Примерно так и происходит разработка сайта или интернет-магазина, но это не точно</p>
				</blockquote>
			</div> -->
		</div>
	</section>

	<section class="price" id="price">
		<div class="container">
			<div class="introHolder wow fadeInDown">
				<h2 class="liner">Стоимость разработки</h2>
			</div>
			<div class="row align-items-center">
				<div class="col-md-7 col-lg-8 wow fadeInLeft">
					<img src="/assets/img/macbook.png" alt="">
				</div>
				<div class="col-md-5 col-lg-4 right wow fadeInRight">
					<div class="price__block">
						<p>
							Цена: <b>от 15 000 р.</b>
						</p>
						<p>
							Сроки: <b>от 7 дней</b>
						</p>
					</div>
					<button class="btn btn-accent" data-toggle="modal" data-target="#callbackModal">Заказать сайт</button>
				</div>
			</div>
		</div>
	</section>

	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer.php'; ?>
	<script>
		const anchors = document.querySelectorAll('.nav-link');
		for (let anchor of anchors) {
			anchor.addEventListener('click', function (e) {
				e.preventDefault()
				let block = anchor.getAttribute('href');

				const blockID = block.replace('/','');
				
				document.querySelector('' + blockID).scrollIntoView({
				behavior: 'smooth',
				block: 'start'
				})
			})
		};
	</script>
</body>
</html>
