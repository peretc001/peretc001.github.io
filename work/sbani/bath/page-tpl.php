<?php
/*
Template Name: Общий шаблон
*/
?>
<?php include ($_SERVER['DOCUMENT_ROOT'] .'/wp-content/themes/bath/inc/header.php'); ?>
<body>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/wp-content/themes/bath/inc/nav.php'); ?>
	<article class="wp_content foto">
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
<?php include ($_SERVER['DOCUMENT_ROOT'] .'/wp-content/themes/bath/inc/footer.php'); ?>