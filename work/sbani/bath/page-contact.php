<?php
/*
Template Name: Контакты
*/
?>
<?php include ($_SERVER['DOCUMENT_ROOT'] .'/wp-content/themes/bath/inc/header.php'); ?>
<body>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/wp-content/themes/bath/inc/nav.php'); ?>
	<article class="wp_content">
		<div class="row">
			<?php
				the_post();
				the_content(); 
			?>
		</div>
	</article>
<?php include ($_SERVER['DOCUMENT_ROOT'] .'/wp-content/themes/bath/inc/footer.php'); ?>