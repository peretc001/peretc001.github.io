<?php
/*
Template Name: О нас
*/
$options = get_option( 'sbani_settings' );
?>
<?php include ($_SERVER['DOCUMENT_ROOT'] .'/wp-content/themes/bath/inc/header.php'); ?>
<body>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/wp-content/themes/bath/inc/nav.php'); ?>
	<script src="/js/slider.min.js"></script>
	
	
	
	<article class="wp_content">
		<div class="introHolder">
			<h1><?php single_post_title() ?></h1>
		</div>
		<div class="row">
			<?php
				the_post();
				the_content(); 
			?>
		</div>
	</article>
	
	<div class="price">
		<div class="introHolder">
			<h4>Банное меню</h4>
		</div>
		<div class="row entrance">
			<div class="two-thirds column">
				<strong><?php echo $options['sb_price_text1']; ?></strong>
			</div>
			<div class="one-third column">
				<span><?php echo $options['sb_price1']; ?></span> р.
			</div>
		</div>
		<div class="row entrance">
			<div class="two-thirds column">
				<?php echo $options['sb_price_text2']; ?>
			</div>
			<div class="one-third column">
				<span><?php echo $options['sb_price2']; ?></span> р.
			</div>
		</div>
		<div class="row entrance">
			<div class="two-thirds column">
				<strong><?php echo $options['sb_price_text3']; ?></strong>
			</div>
			<div class="one-third column">
				<span><?php echo $options['sb_price3']; ?></span> р.
			</div>
		</div>

		<div class="row entrance_text">
			<p>Включает в себя:</p>
		</div>
		<div class="row entrance_about">
			<div class="one-half column">
				<img src="/images/price/clock.svg">
				<p>Пребывание в комплексе до 3 часов</p>
			</div>
			<div class="one-half column">
				<img src="/images/price/lockers.svg">
				<p>Индивидуальный шкафчик</p>
			</div>
		</div>
		<div class="row entrance_about">
			<div class="one-half column">
				<img src="/images/price/flip-flops.svg">
				<p>Простынь, полотенце, тапочки (аренда)</p>
			</div>
			<div class="one-half column center">
				<img src="/images/price/pool.svg">
				<p>Зону отдыха, бассейны и общественные парные</p>
			</div>
		</div>
	</div>
	
	<article class="block company" id="sb_diplom">
		<?php
			$id = 1294; // id страницы
			$post = get_page($id);
			$content = $post->post_content;
			echo $post->post_content;
		?>
	</article>
	
	<article class="block interrior"  id="sb_interrior">
		<div class="introHolder">
			<h3>Интерьер</h3>
			<p>Виртуальная прогулка по-Суворовским баням</p>
		</div>
		<iframe src="https://www.google.com/maps/embed?pb=!4v1536324017045!6m8!1m7!1sCAoSLEFGMVFpcFAwNV96Q29FRUthMVlMUGRVejUzR05ENGl1ekF4T0tlb0hHV1RX!2m2!1d45.06243253954874!2d38.94869533754763!3f94.87732223054581!4f-1.1081154993690632!5f0.4000000000000002" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
	</article>
	
	<article class="video_content" id="sb_video">
		<div class="introHolder">
			<h3>Видео галерея</h3>
		</div>
		<div class="row">
			<div class="uk-slidenav-position" data-uk-slider>
				<div class="uk-slider-container">
					<ul class="uk-slider  uk-grid-width-medium-1-2">
						<?php
							$id = 1272; // id страницы
							$post = get_page($id);
							$content = $post->post_content;
							echo $post->post_content;
						?>
					</ul>
					
				</div>
				<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
				<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>

			</div>
		</div>	
	</article>
	
<?php include ($_SERVER['DOCUMENT_ROOT'] .'/wp-content/themes/bath/inc/footer.php'); ?>