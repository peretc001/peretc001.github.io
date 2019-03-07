<?php 
/*
Template Name: Новая Главная
*/
?>
<?php include ($_SERVER['DOCUMENT_ROOT'] .'/wp-content/themes/bath/inc/header.php'); ?>
<body>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/wp-content/themes/bath/inc/nav.php'); ?>
	
	<!-- Slider -->
	<script src="/js/slider.min.js"></script>
	<div class="slider">
		<div class="row">
			<div class="uk-slidenav-position" data-uk-slider>
				<div class="uk-slider-container">
					<ul class="uk-slider  uk-grid-width-medium-1-2">
						<?php
							$id = 11; // id страницы
							
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
	</div>
		
	<article class="block uslugi">
		<?php
			$id = 1280; // id страницы
			$post = get_page($id);
			$content = $post->post_content;
			echo $post->post_content;
		?>
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
	
	<article class="block spa">
		<?php
			$id = 1287; // id страницы
			$post = get_page($id);
			$content = $post->post_content;
			echo $post->post_content;
		?>
	</article>
	
	<article class="block chajnaya">
		<?php
			$id = 1289; // id страницы
			$post = get_page($id);
			$content = $post->post_content;
			echo $post->post_content;
		?>
	</article>
	
	<article class="block kitchen">
		<?php
			$id = 1292; // id страницы
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
	
	<article class="block company" id="sb_diplom">
		<?php
			$id = 1294; // id страницы
			$post = get_page($id);
			$content = $post->post_content;
			echo $post->post_content;
		?>
	</article>
	
		<!---   Привет, я Виджет, вставь меня где хочешь --->
		<script>
			var yWidgetSettings = {
				buttonColor : '#5c6c2c'
			};
		</script> <script type="text/javascript" src="https://w148238.yclients.com/widgetJS" charset="UTF-8"></script>  
		<!---   Уиджет Вуася, вставь меня где хочешь --->
	
<?php include ($_SERVER['DOCUMENT_ROOT'] .'/wp-content/themes/bath/inc/footer.php'); ?>