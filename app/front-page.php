<?php get_header(); ?>

	<section class="content">
		<div class="container">
			<div class="row">

				<div class="col-md-3 content-left">
					<div class="content-left__name">
						коротко
					</div>
					<?php
						//Записи с меткой ЛЕВАЯ КОЛОНКА + ВАЖНО, id=(19+20)
						$query = new WP_Query( array( 'tag__and'=>array(19,20), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 5 ) );
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
						$query = new WP_Query( array( 'tag__in'=>array(19), 'tag__not_in' => array(20), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 5 ) );
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
				</div>
				<!-- / end left -->

				<div class="col-md-6 content-center">
					<div class="content-center__name">
						подробно
					</div>
					<?php
						//Записи с меткой ЦЕНТРАЛЬНАЯ КОЛОНКА+ВАЖНО, id=(21+20)
						$query = new WP_Query( array( 'tag__and' => array(20,21), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 1 ) );
						while ( $query->have_posts() ) {
							$query->the_post();

							$media = get_attached_media( 'image', $post->ID );
							$media = array_shift( $media );
							$image_url = $media->guid;
					?>
					<div class="content-center-card">
						<h2>
							<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<p>
						<a href="<?php echo get_permalink(); ?>"><?php the_excerpt(); ?></a>
						</p>
						<a href="<?php echo get_permalink(); ?>"><img src="<?php echo $image_url; ?>"></a>
					</div>
					<?php } ?>
					<div class="content-center-block">
						<div class="row">
						<?php
							//Записи с меткой ЦЕНТРАЛЬНАЯ КОЛОНКА и без метки ВАЖНО, id=(21-20)
							$query = new WP_Query( array( 'tag__in'=>array(21), 'tag__not_in' => array(20), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 4 ) );
							while ( $query->have_posts() ) {
								$query->the_post();

								$media = get_attached_media( 'image', $post->ID );
								$media = array_shift( $media );
								$image_url = $media->guid;

								$category = get_the_category(); 
								$cat__name = $category[0]->cat_name;
						?>
							<div class="col-md-6">
								<a href="<?php echo get_permalink(); ?>">
									<img src="<?php echo $image_url; ?>" alt="">
									<span><i><?php echo $cat__name; ?></i></span>
								</a>
								<h3>
									<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<p>
									<a href="<?php echo get_permalink(); ?>"><?php the_excerpt(); ?></a>
								</p>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
				<!-- / end center -->

				<div class="col-md-3 content-right">
					<div class="content-right__name">
						наглядно
					</div>
					<div class="content-right-card">
						<?php
							//Записи с меткой ПРАВАЯ КОЛОНКА, id=(22)
							$query = new WP_Query( array( 'tag__in'=>array(22), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 10 ) );
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
				</div>
				<!-- / end right -->
				
			</div>
		</div>
	</section>
		

<?php get_footer(); ?>
		