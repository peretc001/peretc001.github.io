
					<div class="content-right-card">
						<?php
							//Записи с меткой ПРАВАЯ КОЛОНКА, id=(22)
							$query = new WP_Query( array( 'post__not_in' => array($post_id), 'tag__in'=>array(22), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 10 ) );
							while ( $query->have_posts() ) {
								$query->the_post();

								$media = get_attached_media( 'image', $post->ID );
								$media = array_shift( $media );
								$image_url = $media->guid;

								$category = get_the_category(); 
								$cat__name = $category[0]->cat_name;
						?>
						<?php if ($image_url) { ?><a href="<?php echo get_permalink(); ?>"><img src="<?php echo $image_url; ?>"></a><?php } ?>						
						<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
						<?php } ?>
					</div>
					<?php
						//Вывод рекламного блока по центру
						$query = new WP_Query( array('page_id' => 105) );
						while ( $query->have_posts() ) {
							$query->the_post(); ?>
					<div class="content-right-banner">
						<?php the_content(); ?>
					</div>
					<?php }	?>