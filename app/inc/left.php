
					<?php
						//Записи с меткой ЛЕВАЯ КОЛОНКА + ВАЖНО, id=(19+20)
						$query = new WP_Query( array( 'post__not_in' => array($post_id), 'tag__and'=>array(19,20), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 5 ) );
						while ( $query->have_posts() ) {
							$query->the_post();

							$media = get_attached_media( 'image', $post->ID );
							$media = array_shift( $media );
							$image_url = $media->guid;
					?>
					<div class="content-left-card">
						<div class="content-left-card-date"><?php the_date('d.m'); ?></div>
						<div class="content-left-card-text border-bottom">
						<?php if ($image_url) { ?><a href="<?php echo get_permalink(); ?>"><img src="<?php echo $image_url; ?>"></a><?php } ?>
							<p><a href="<?php echo get_permalink(); ?>"><b><?php the_title(); ?></b></a></p>
						</div>
					</div>
					<?php } ?>
					<?php
						//Записи с меткой ЛЕВАЯ КОЛОНКА и без метки ВАЖНО, id=(19-20)
						$query = new WP_Query( array( 'post__not_in' => array($post_id), 'tag__in'=>array(19), 'tag__not_in' => array(20), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 5 ) );
						while ( $query->have_posts() ) {
							$query->the_post();

							$media = get_attached_media( 'image', $post->ID );
							$media = array_shift( $media );
							$image_url = $media->guid;
					?>
					<div class="content-left-card">
						<div class="content-left-card-date"><?php the_date('d.m'); ?></div>
						<div class="content-left-card-text">
						<?php if ($image_url) { ?><a href="<?php echo get_permalink(); ?>"><img src="<?php echo $image_url; ?>"></a><?php } ?>
							<p><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></p>
						</div>
					</div>
					<?php } ?>