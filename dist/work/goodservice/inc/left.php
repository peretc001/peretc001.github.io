
					<?php
						//Записи с меткой ЛЕВАЯ КОЛОНКА + ВАЖНО, id=(19+20)
						$query = new WP_Query( array( 'post__not_in' => array($post_id), 'tag__and'=>array(19,20), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 5 ) );
						while ( $query->have_posts() ) {
							$query->the_post();

							$img_id = get_post_thumbnail_id( $post->ID );
					?>
					<div class="content-left-card">
						<div class="content-left-card-text border-bottom">
						<?php if ($img_id) { ?><a href="<?php echo get_permalink(); ?>">
							<img 	src="<?php echo wp_get_attachment_image_url( $img_id, 'medium' ) ?>"
										srcset="<?php echo wp_get_attachment_image_srcset( $img_id, 'medium' ) ?>"
										sizes="<?php echo wp_get_attachment_image_sizes( $img_id, 'medium' ) ?>" alt="<?php the_title(); ?>">
						</a><?php } ?>
							<p><a href="<?php echo get_permalink(); ?>"><b><?php the_title(); ?></b></a></p>
						</div>
					</div>
					<?php } ?>
					<?php
						//Записи с меткой ЛЕВАЯ КОЛОНКА и без метки ВАЖНО, id=(19-20)
						$query = new WP_Query( array( 'post__not_in' => array($post_id), 'tag__in'=>array(19), 'tag__not_in' => array(20), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 5 ) );
						while ( $query->have_posts() ) {
							$query->the_post();
							
							$img_id = get_post_thumbnail_id( $post->ID );
					?>
					<div class="content-left-card">
						<div class="content-left-card-text">
						<?php if ($img_id) { ?><a href="<?php echo get_permalink(); ?>">
							<img 	src="<?php echo wp_get_attachment_image_url( $img_id, 'medium' ) ?>"
										srcset="<?php echo wp_get_attachment_image_srcset( $img_id, 'medium' ) ?>"
										sizes="<?php echo wp_get_attachment_image_sizes( $img_id, 'medium' ) ?>" alt="<?php the_title(); ?>">
						</a><?php } ?>
							<p><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></p>
						</div>
					</div>
					<?php } ?>