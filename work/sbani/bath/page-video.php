<?php
/*
Template Name: Видео
*/
?>
<?php include ($_SERVER['DOCUMENT_ROOT'] .'/wp-content/themes/bath/inc/header.php'); ?>
<body>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/wp-content/themes/bath/inc/nav.php'); ?>
	<script src="/js/slider.min.js"></script>
	<article class="video_content" id="sb_video">
		<br>
		<div class="introHolder">
			<h1><?php single_post_title() ?></h1>
		</div>
		<div class="row">
			<div class="uk-slidenav-position" data-uk-slider>
				<div class="uk-slider-container">
					<ul class="uk-slider  uk-grid-width-medium-1-2">
						<?php
							the_post();
							the_content(); 
						?>
					</ul>
					
				</div>
				<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
				<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>

			</div>
		</div>	
	</article>	
<?php include ($_SERVER['DOCUMENT_ROOT'] .'/wp-content/themes/bath/inc/footer.php'); ?>