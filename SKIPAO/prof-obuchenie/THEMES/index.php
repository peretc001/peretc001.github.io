<?php get_header(); ?>
<div class="breadcrumb">
    <div class="container">
        <a href="/">Главная</a> <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }
    ?>
    </div>
</div>
<section class="single">
	<div class="container">

	<?php
		// Start the loop.
		while ( have_posts() ) : the_post(); ?>
			<h1 class="h2__title"><?php the_title(); ?></h1>
			<?php the_content(); ?>

	<?php endwhile; ?>

	</div>
</section>

<?php get_footer(); ?>