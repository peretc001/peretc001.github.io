
					<div class="content-right-card">
						<?php
							//Записи с меткой ПРАВАЯ КОЛОНКА, id=(22)
							$query = new WP_Query( array( 'post__not_in' => array($post_id), 'tag__in'=>array(22), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 10 ) );
							while ( $query->have_posts() ) {
								$query->the_post();

								$img_id = get_post_thumbnail_id( $post->ID );
						?>
						<?php if ($img_id) { ?><a href="<?php echo get_permalink(); ?>">
							<img 	src="<?php echo wp_get_attachment_image_url( $img_id, 'medium' ) ?>"
										srcset="<?php echo wp_get_attachment_image_srcset( $img_id, 'medium' ) ?>"
										sizes="<?php echo wp_get_attachment_image_sizes( $img_id, 'medium' ) ?>" alt="<?php the_title(); ?>">
						</a><?php } ?>
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