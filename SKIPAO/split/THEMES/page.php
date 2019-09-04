<?php 
/**
* The template for displaying all single posts
*
* @package WordPress
* @subpackage skipao
* @author https://krasovsky23.ru
*/

get_header(); ?>
<div class="breadcrumb">
	<a href="/">Главная</a> > <?php echo the_title(); ?>
</div>

<?php
	while ( have_posts() ) :
		the_post(); ?>
		<section class="single_page<?php echo is_page(5770) ? ' oplata' : ''; ?>">
			<div class="container">
				<h1 class="h2__title"><?php echo the_title(); ?></h1>
				<?php echo the_content(); ?>
			</div>
		</section>

	<?php endwhile;

		

get_footer(); ?>
		