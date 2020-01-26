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
   <?php if(function_exists('bcn_display'))
      {
         bcn_display();
      }
   ?>
</div>

<?php
	while ( have_posts() ) :
		the_post(); ?>
		<section class="single_page">
			<div class="container">
				<h1 class="h2__title"><?php echo the_title(); ?></h1>
				<?php echo the_content(); ?>
			</div>
		</section>

	<?php endwhile;

		

get_footer(); ?>
		