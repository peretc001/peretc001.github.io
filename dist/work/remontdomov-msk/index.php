<?php get_header(); ?>
	<section class="single">
		<div class="container">
			<div class="row">
				<?php 
					while ( have_posts() ) :
						the_post(); 
						
						the_content();
					
					endwhile;
				?>
			</div>
		</div>
	</div>	
<?php get_footer(); ?>
		