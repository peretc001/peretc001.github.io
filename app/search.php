<?php get_header(); ?>
<div class="search">
	<div class="container">
		<h1>Вы искали: <span>"<?php echo $_GET['s'];?>"</span></h1>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
		<?php the_content(''); ?>
		<?php endwhile; else: ?>
		<div class="not_find">
			<img src="<?php echo get_stylesheet_directory_uri() . '/img/404.svg'; ?>" alt="">
			<p>
				<b>Ничего не найдено</b>
				попробуйте изменить поисковую фразу или перейдите на главную<br>
				<a href="/" class="btn btn-outline-primary">на главную</a>
			</p>
		</div>
		<?php endif;?>
	</div>
</div>
 <?php get_footer(); ?>