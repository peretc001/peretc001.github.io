<?php get_header('blog'); ?>
	
	<div class="block__content">
		
		<div class="wrapper">
			
			<div class="product-breadcrumbs">
				<?php echo dimox_breadcrumbs('Магазин'); ?>
			</div>
			
			<div class="wp-content">
				<ul class="blog-list">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<li class="clearfix">
				<?php if(has_post_thumbnail($post->ID))echo '<div class="post-image">'.get_the_post_thumbnail($post->ID, 'single-middle-thumb').'</div>'; ?>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php the_content('More'); ?>
				</li>
				
				<?php endwhile; endif; ?>
				
				</ul>
			</div>
			
			<div class="rightcol">
				<div class="widget-title">ПОПУЛЯРНЫЕ СТАТЬИ</div>
				<ul>
				<?php
					$args = array(
						'posts_per_page' => 5,
						'order' => 'DESC',
						'post__not_in' => array($post->ID), 
						'meta_key' => 'post_views_count', 
						'orderby' => 'meta_value_num',
					);
					$loop = new WP_Query( $args );
					$i=0;
					if ( $loop->have_posts() ):
					while ( $loop->have_posts() ) : $loop->the_post(); $i++;
					
					//$recent_posts = wp_get_recent_posts(array('numberposts' => 5, 'exclude' => $post->ID, 'meta_key' => 'post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'));
					
					//foreach( $recent_posts as $recent ):
				?>
					<li>
						<?php if (has_post_thumbnail($loop->post->ID))echo get_the_post_thumbnail($loop->post->ID, 'single-small-thumb');?>
						<a href="<?php echo get_permalink($loop->post->ID); ?>"><?php echo $loop->post->post_title; ?></a>
					</li>
				<?php //endforeach; wp_reset_query(); ?>
				<?php endwhile; endif; ?>
				</ul>
			</div>
			
			<div class="category-desc clearfix">
				<?php
					$cat = get_category(get_query_var('cat'));
					echo apply_filters('the_content', category_description($cat->cat_ID));
				?>
			</div>
			
		</div>
	
	</div>

<?php get_footer(); ?>