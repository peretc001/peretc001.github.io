<?php 
/**
 * The template for displaying index page
 * @package WordPress
 * @subpackage OKHall
 * @since 1.0.0
 */

$options = get_option( 'okHall_settings' );

$company_desc = $options['description'];
$number_in = preg_replace('~\\D+~u', '', $options['phone']); //71234567890
$number_in_valid = preg_replace("#(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})#", "+\\1 (\\2) \\3-\\4-\\5", $number_in); //+7 (123) 456-78-90
$number_public = substr($number_in_valid, 0, -9) .'<b>' . substr($number_in_valid, -9) .'</b>'; //+7 (123) <b>456-78-90</b>

$mobile_in = preg_replace('~\\D+~u', '', $options['mobile']); //71234567890
$mobile_in_valid = preg_replace("#(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})#", "+\\1 (\\2) \\3-\\4-\\5", $mobile_in); //+7 (123) 456-78-90
$mobile_public = substr($mobile_in_valid, 0, -9) .'<b>' . substr($mobile_in_valid, -9) .'</b>'; //+7 (123) <b>456-78-90</b>
?>

<div class="page">
	<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
	<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
		<div class="slides"></div>
		<div class="control_prev">
			<a class="prev"><img src="/wp-content/themes/okhall/img/arrow-left.svg"></a>
		</div>
		<div class="control_next">
			<a class="next"><img src="/wp-content/themes/okhall/img/arrow-right.svg"></a>
		</div>
			<a class="close">×</a>
		
		<ol class="indicator"></ol>
	</div>

	<header class="header" style="background-image:url('<?php echo $options['header__bg__img']; ?>')">
		
		<nav class="header__nav">
			<div class="container">
				<div class="row border_bottom">
						
						<div class="mobile__menu">
							<a href="#my-menu">
								<div class="hamburger hamburger--emphatic">
									<span class="hamburger-box"><span class="hamburger-inner"></span></span>
								</div>
							</a>
						</div>
							
						
						<!-- left -->
						<div class="header__nav__left">

							<p class="header__nav__left__logo">
								<a href="/">
									<svg version="1.1" id="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
									y="0px" viewBox="134.3 -0.9 31.5 30.9" enable-background="new 134.3 -0.9 31.5 30.9" xml:space="preserve">
										<g>
											<g>
												<ellipse fill="none" stroke="#000000" cx="145.6" cy="10.6" rx="9.9" ry="9.5" />
												<polyline fill="none" stroke="#000000" points="152.2,2.1 152.2,1.1 155.6,1.1 155.6,20.1 152.2,20.1 152.2,19 		" />
												<line fill="none" stroke="#000000" x1="152.2" y1="5.2" x2="152.2" y2="16.1" />
												<line fill="none" stroke="#000000" x1="161.8" y1="1.1" x2="155.6" y2="12.9" />
												<line fill="none" stroke="#000000" x1="164.6" y1="20.1" x2="156.8" y2="10.6" />
											</g>
											<g enable-background="new    ">
												<path d="M140.3,27.2c0.2,0,0.3,0.1,0.3,0.3s-0.2,0.3-0.3,0.3s-0.3-0.1-0.3-0.3S140.1,27.2,140.3,27.2z" />
												<path d="M141.1,27.5c0-0.9,0.8-1.5,1.8-1.5s1.8,0.6,1.8,1.5c0,0.9-0.8,1.5-1.8,1.5S141.1,28.4,141.1,27.5z M141.5,27.5
														c0,0.7,0.6,1.2,1.4,1.2c0.8,0,1.4-0.5,1.4-1.2s-0.6-1.2-1.4-1.2C142.1,26.3,141.5,26.8,141.5,27.5z" />
												<path d="M145.8,27.3l1.5-1.3h0.5l-1.6,1.4l1.7,1.6h-0.5l-1.4-1.4l-0.1,0.1V29h-0.4v-3h0.4V27.3z" />
												<path d="M148.5,27.2c0.2,0,0.3,0.1,0.3,0.3s-0.2,0.3-0.3,0.3s-0.3-0.1-0.3-0.3S148.3,27.2,148.5,27.2z" />
												<path d="M149.9,27.2h1.8V26h0.4v3h-0.4v-1.4h-1.8V29h-0.4v-3h0.4V27.2z" />
												<path d="M154.9,28.2h-1.5L153,29h-0.4l1.6-3.1l1.6,3.1h-0.4L154.9,28.2z M154.7,27.9l-0.6-1.2l-0.6,1.2H154.7z" />
												<path d="M156.6,26v2.7h1V29h-1.4v-3H156.6z" />
												<path d="M158.5,26v2.7h1V29h-1.4v-3H158.5z" />
												<path d="M160.1,27.2c0.2,0,0.3,0.1,0.3,0.3s-0.2,0.3-0.3,0.3c-0.2,0-0.3-0.1-0.3-0.3S159.9,27.2,160.1,27.2z" />
											</g>
										</g>

									</svg>
								</a>
							</p>
							<p class="header__nav__left__text">
								<b><?php bloginfo('description'); ?></b>
								<span><?php echo $company_desc; ?></span>
							</p>
						</div>
						<!-- End Left -->
						<!-- Right -->
						<div class="header__nav__right">
							
							<ul class="navbar-nav">
								<? 
									echo preg_replace( '#<li[^>]+><a href="#',  '<li class="nav-item"><a class="nav-link" href="',
							            wp_nav_menu(
							                    array(
													'menu' 				=> 'top-menu', 
													'container' 		=> 'ul',
													'container_class'		=> 'navbar-nav',
													'items_wrap'        => '%3$s',
													'depth'             => 1,
													'echo'              => false
							                         )
							                    )
							            );
								?>
							</ul>	

							
							
							<div class="header__nav__right__items">
								<div class="social">
									<p>
										<a href="<?php echo $options['ok_vk']; ?>"><i class="fab fa-vk"></i></a>
										<a href="<?php echo $options['ok_facebook']; ?>"><i class="fab fa-facebook-f"></i></a>
										<a href="<?php echo $options['ok_instagramm']; ?>"><i class="fab fa-instagram"></i></a>
									</p>
								</div>
								<div class="phone">
									<p><?php echo $number_public; ?></p>
									<p>
										<a href="viber://chat?number=<?php echo $mobile_in; ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/header/viber.svg" alt="Viber"></a>
										<a href="https://wa.me/<?php echo $mobile_in; ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/header/whatsapp.svg" alt="Whatsapp"></a>
										<?php echo $mobile_public; ?>
									</p>
									<p class="d-lg-none"><a href="tel:<?php echo $mobile_in; ?>"><i class="fas fa-mobile-alt"></i></a></p>
								</div>


							</div>

						</div>
						<!-- End Right -->
						
					
					
					
				</div>
			</div>
		</nav>
		
		<div class="header__block">
			<div class="container">
				
				<div class="row yellowHolder">
					<div class="col-md-8 yellowHolder__left">
						
						<h1>
							<?php echo $options['header__h2__intro']; ?>
						</h1>
						<p>
							<?php echo $options['header__p__intro']; ?>
						</p>
					</div>
					<div class="col yellowHolder__right">
						<p class="yellowHolder__right__old"><?php echo $options['header__right__old']; ?></p>
						<p class="yellowHolder__right__total"><?php echo $options['header__right__total']; ?></p>
						<p class="yellowHolder__right__date"><?php echo $options['header__right__date']; ?></p>
					</div>
				</div>

				<div class="row header__block__column">
					<div class="col-md-4 header__block__column__item">
						<img src="<?php echo $options['header__block__img1']; ?>" alt="">
						<p><?php echo $options['header__block__item1']; ?></p>
					</div>
					<div class="col-md-4 header__block__column__item">
						<img src="<?php echo $options['header__block__img2']; ?>" alt="">
						<p><?php echo $options['header__block__item2']; ?></p>
					</div>
					<div class="col-md-4 header__block__column__item">
						<img src="<?php echo $options['header__block__img3']; ?>" alt="">
						<p><?php echo $options['header__block__item3']; ?></p>
					</div>
				</div>

			</div>
		</div>
	</header>

	<section class="advantages" style="background-image:url('/wp-content/uploads/2019/02/pattern.jpg')">
		
		<img class="mouse" src="/wp-content/uploads/2019/02/mouse.svg" alt="">
		
	
		<div class="container">
			
		<?php 
			$args = array('post_type' => 'post', 'category__not_in' => array(3,4));
			$query = new WP_Query($args); 

				if ( $query->have_posts() ) : 

				while ( $query->have_posts() ) : $query->the_post(); 
				

				$media = get_attached_media( 'image', $post->ID );
				$media = array_shift( $media );
				$image_url = $media->guid;

				$thumbs = get_the_post_thumbnail_url( $post->ID, 'thumbnail' );
				if ($thumbs) { $thumb = '<p class="advantages__post__img"><a href="'. get_permalink() .'"><img src="'. $thumbs .'" alt=""></a></p>'; } else {  $thumb = ''; }
			?> 			
			<div class="row advantages__post" style="background-image: url('<?php echo $image_url; ?>')">
				<div class="col-8">
					<?php echo $thumb; ?>
					<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p class="advantages__post__text">
						<?php 
							$content = get_the_content();
							$trimmed_content = wp_trim_words( $content, 16 );
							echo $trimmed_content; 
						?>
					</p>
					
				</div>
		</div><!-- end row-->

		<?php endwhile; 

			else : ?>
			<p><?php esc_html_e( 'Нет постов по вашим критериям.' ); ?></p>
		<?php endif; ?>
			
					
				

		</div>
	</section>
	
	<section class="macbook">
		<div class="container">
			
			<div class="introHolder">
				<h2>
					<?php echo $options['macbook__h2__intro']; ?>
				</h2>
				<p>
					<?php echo $options['macbook__p__intro']; ?>
				</p>
			</div>
			
			<div class="button-play"><a href="<?php echo $options['macbook__video__href']; ?>"><img src="/wp-content/uploads/2019/02/play.svg" alt=""></a></div>
			

		</div>
	</section>
	
	<section class="calculator" style="background-image: url('<?php echo $options['calculator__bg__img']; ?>')">
		<div class="container">
			
			<div class="introHolder">
				<h2>
					<?php echo $options['calculator__h2__intro']; ?>
				</h2>
				<p>
					<?php echo $options['calculator__p__intro']; ?>
				</p>
			</div>

			<div class="row no-gutters calculator__block">
				<div class="col-md-2 col-lg-1 offset-lg-1"><img src="<?php echo $options['calculator__block__img1']; ?>" alt=""></div>
				<div class="col-md-4 col-lg-4"><p><?php echo $options['calculator__block__p1']; ?></p></div>
			
				<div class="col-md-2 col-lg-1 offset-lg-1"><img src="<?php echo $options['calculator__block__img2']; ?>" alt=""></div>
				<div class="col-md-4 col-lg-4"><p><?php echo $options['calculator__block__p2']; ?></p></div>
			</div>
			<div class="introHolder">
				<a class="btn btn-accent" href="<?php echo $options['calculator__block__href']; ?>"><?php echo $options['calculator__block__btn']; ?></a>
			</div>
			
		</div>
	</section>

	<section class="photos">
		<script type="text/javascript" src="http://web.autoprkt.ru/wp-content/plugins/block-gallery/dist/js/vendors/flickity.min.js?ver=1.1.6"></script>
	
		<div class="container">
			
			<div class="introHolder inverse">
				<h2>
					<?php echo $options['photos__h2__intro']; ?>
				</h2>
				<p>
					<?php echo $options['photos__p__intro']; ?>
				</p>
			</div>
			
			<?php 
				$args = array('post_type' => 'post', 'category__in' => array(3));
				$query = new WP_Query($args); 

					if ( $query->have_posts() ) : 
					while ( $query->have_posts() ) : $query->the_post(); ?>
				<div class="photos__block">
					<?php the_content(); ?>
				</div>
				<?php endwhile; 

				else : endif; 
			?>


			<div class="introHolder">
				<a href="#" class="btn btn-accent" data-toggle="modal" data-target="#catalogModalCenter"><?php echo $options['photos__btn']; ?></a>
			</div>

		</div>
	</section>
	
	<section class="design_project">
		<div class="container">
			<div class="introHolder">
				<h2>
					<?php echo $options['design_project__h2__intro']; ?>
				</h2>
				<p>
					<?php echo $options['design_project__p__intro']; ?>
				</p>
			</div>
			
			<div class="row no-gutters">
				
				<div class="col-12 col-md-6 col-lg-5">
					<div class="design_project__header">
						<p>
							<span><i class="far fa-thumbs-down"></i></span> <?php echo $options['design_project__header__left']; ?>
						</p>
					</div>
				
					<div class="design_project__center">
						<p>
							<?php echo $options['design_project__header__left__1']; ?>
						</p>
						<p>
							<?php echo $options['design_project__header__left__2']; ?>
						</p>
						<p>
							<?php echo $options['design_project__header__left__3']; ?>
						</p>
						<p>
							<?php echo $options['design_project__header__left__4']; ?>
						</p>
					</div>
				

					<div class="design_project__bottom">
						<p><?php echo $options['design_project__header__left__5']; ?></p>
					</div>
				</div>

				<div class="col-12 col-md-6 col-lg-5 offset-lg-2 right">
					<div class="design_project__header">
						<p>
							<span><i class="far fa-thumbs-up"></i></span> <?php echo $options['design_project__header__right']; ?>
						</p>
					</div>
			
					<div class="design_project__center">
						<p>
							<?php echo $options['design_project__header__right__1']; ?>
						</p>
						<p>
							<?php echo $options['design_project__header__right__2']; ?>
						</p>
						<p>
							<?php echo $options['design_project__header__right__3']; ?>
						</p>
						<p>
							<?php echo $options['design_project__header__right__4']; ?>
						</p>
					</div>
				
					<div class="design_project__bottom">
						<p><?php echo $options['design_project__header__right__5']; ?></p>
					</div>
			</div>
		</div>

		</div>
	</section>

	<section class="recomendation" style="background-image:url('<?php echo $options['recomendation__bg__img']; ?>')">
		<div class="container">
			<div class="introHolder blue">
				<h2>
					<?php echo $options['recomendation__h2__intro']; ?>
				</h2>
				<p>
					<?php echo $options['recomendation__p__intro']; ?>
				</p>
			</div>
			
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					
				
				<?php 
					$args = array('post_type' => 'post', 'category__in' => array(4));
					$query = new WP_Query($args); 
						$i = 0;
						if ( $query->have_posts() ) : 

						while ( $query->have_posts() ) : $query->the_post(); 

						$thumbs = get_the_post_thumbnail_url( $post->ID );
						if ($thumbs) { $thumb = '<img src="'. $thumbs .'" alt="">'; } else {  $thumb = ''; }
						$i++;
					?> 			
					<div class="carousel-item<?php if($i == '1') { echo ' active'; } ?>">
						<div class="row no-gutters align-items-center recomendation__carousel__item">
							<div class="col-md-4">
								<?php echo $thumb; ?>
							</div>
							<div class="col-md-8">
								<p><b><?php the_title(); ?></b></p>
								<?php the_content(); ?>
							</div>
						</div>
					</div><!-- end item-->

				<?php endwhile; 

					else : ?>
					<p><?php esc_html_e( 'Нет постов по вашим критериям.' ); ?></p>
				<?php endif; ?>

				</div>

				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		
					

			
		</div>
	</section>

	<section class="acquaintance" style="background-image:url('<?php echo $options['acquaintance__img']; ?>')">
		<div class="container">
			<div class="introHolder">
				<h2><?php echo $options['acquaintance__h2__intro']; ?></h2>
			</div>


			<div class="row ">
				<div class="col-md-6">
					<div class="acquaintance__block">
						<div class="acquaintance__block__about">
							<img class="manager" src="<?php echo $options['acquaintance__img__left']; ?>" alt="<?php echo $options['acquaintance__h3']; ?>">
							<h3><?php echo $options['acquaintance__h3']; ?></h3>
							<?php echo $options['acquaintance__text']; ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="acquaintance__block">
						<div class="acquaintance__block__about">
							<img class="manager right" src="<?php echo $options['acquaintance__img__right']; ?>" alt="<?php echo $options['acquaintance__h3__right']; ?>">
							<h3><?php echo $options['acquaintance__h3__right']; ?></h3>
							<?php echo $options['acquaintance__text__right']; ?>
						</div>
					</div>
				</div>
			</div>

			<div class="row acquaintance__img">
				<div class="col-lg-4 acquaintance__img__item"><img src="<?php echo $options['acquaintance__img__url__1']; ?>" alt=""> <p><?php echo $options['acquaintance__img__item__1']; ?></p></div>
				<div class="col-lg-4 acquaintance__img__item"><img src="<?php echo $options['acquaintance__img__url__2']; ?>" alt=""> <p><?php echo $options['acquaintance__img__item__2']; ?></p></div>
				<div class="col-lg-4 acquaintance__img__item"><img src="<?php echo $options['acquaintance__img__url__3']; ?>" alt=""> <p><?php echo $options['acquaintance__img__item__3']; ?></p></div>
			</div>

			<div class="row acquaintance__text">
				<div class="col"><?php echo $options['acquaintance__text__bottom']; ?></div>
			</div>

		</div>
	</section>

	<section class="price" style="background-image:url('<?php echo $options['price__bg__img']; ?>')">
		<div class="container">
			<div class="introHolder blue">
				<h2>
					<?php echo $options['price__h2__intro']; ?>
				</h2>
				<p>
					<?php echo $options['price__p__intro']; ?>
				</p>
			</div>

			<div class="row">
				<div class="col-lg-4">
					<div class="price__header<?php if ($options['price__block__active'] == '1') { echo ' top'; } ?>">
						<p class="name"><?php echo $options['price__b1__h1']; ?></p>
						<p><b><?php echo $options['price__b1__h2']; ?></b></p>
						<p class="price__header__sum"><?php echo $options['price__b1__h3']; ?></p>
					</div>

					<div class="price__center">
						<ul>
							<li><?php echo $options['price__b1__c1']; ?></li>
							<li><?php echo $options['price__b1__c2']; ?></li>
							<li><?php echo $options['price__b1__c3']; ?></li>
							<li><?php echo $options['price__b1__c4']; ?></li>
						</ul>
					</div>

					<div class="price__bottom">
						<ul>
							<li>
								<img src="<?php echo $options['price__b1__n1']; ?>" alt=""> <?php echo $options['price__b1__b1']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b1__n2']; ?>" alt=""> <?php echo $options['price__b1__b2']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b1__n3']; ?>" alt=""> <?php echo $options['price__b1__b3']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b1__n4']; ?>" alt=""> <?php echo $options['price__b1__b4']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b1__n5']; ?>" alt=""> <?php echo $options['price__b1__b5']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b1__n6']; ?>" alt=""> <?php echo $options['price__b1__b6']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b1__n7']; ?>" alt=""> <?php echo $options['price__b1__b7']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b1__n8']; ?>" alt=""> <?php echo $options['price__b1__b8']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b1__n9']; ?>" alt=""> <?php echo $options['price__b1__b9']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b1__n10']; ?>" alt=""> <?php echo $options['price__b1__b10']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b1__n11']; ?>" alt=""> <?php echo $options['price__b1__b11']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b1__n12']; ?>" alt=""> <?php echo $options['price__b1__b12']; ?>
							</li>
						</ul>
						<div class="introHolder">
							<a href="#" class="btn btn-accent" data-toggle="modal" data-target="#priceModalCenter">Рассчитать стоимость</a>
							<p><a class="download" href="<?php echo $options['price__b1__btn__2']; ?>" target="_blank">Скачать пример</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="price__header<?php if ($options['price__block__active'] == '2') { echo ' top'; } ?>">
						<p class="name"><?php echo $options['price__b2__h1']; ?></p>
						<p><b><?php echo $options['price__b2__h2']; ?></b></p>
						<p class="price__header__sum"><?php echo $options['price__b2__h3']; ?></p>
					</div>

					<div class="price__center">
						<ul>
							<li><?php echo $options['price__b2__c1']; ?></li>
							<li><?php echo $options['price__b2__c2']; ?></li>
							<li><?php echo $options['price__b2__c3']; ?></li>
						</ul>
					</div>

					<div class="price__bottom">
						<ul>
							<li>
								<img src="<?php echo $options['price__b2__n1']; ?>" alt=""> <?php echo $options['price__b2__b1']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b2__n2']; ?>" alt=""> <?php echo $options['price__b2__b2']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b2__n3']; ?>" alt=""> <?php echo $options['price__b2__b3']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b2__n4']; ?>" alt=""> <?php echo $options['price__b2__b4']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b2__n5']; ?>" alt=""> <?php echo $options['price__b2__b5']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b2__n6']; ?>" alt=""> <?php echo $options['price__b2__b6']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b2__n7']; ?>" alt=""> <?php echo $options['price__b2__b7']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b2__n8']; ?>" alt=""> <?php echo $options['price__b2__b8']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b2__n9']; ?>" alt=""> <?php echo $options['price__b2__b9']; ?>
							</li>
						</ul>
						<div class="introHolder">
							<a href="#" class="btn btn-accent" data-toggle="modal" data-target="#priceModalCenter">Рассчитать стоимость</a>
							<p><a class="download" href="<?php echo $options['price__b2__btn__2']; ?>" target="_blank">Скачать пример</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="price__header<?php if ($options['price__block__active'] == '3') { echo ' top'; } ?>">
						<p class="name"><?php echo $options['price__b3__h1']; ?></p>
						<p><b><?php echo $options['price__b3__h2']; ?></b></p>
						<p class="price__header__sum"><?php echo $options['price__b3__h3']; ?></p>
					</div>

					<div class="price__center">
						<ul>
							<li><?php echo $options['price__b3__c1']; ?></li>
							<li><?php echo $options['price__b3__c2']; ?></li>
							<li><?php echo $options['price__b3__c3']; ?></li>
							<li><?php echo $options['price__b3__c4']; ?></li>
						</ul>
					</div>

					<div class="price__bottom">
						<ul>
							<li>
								<img src="<?php echo $options['price__b3__n1']; ?>" alt=""> <?php echo $options['price__b3__b1']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b3__n2']; ?>" alt=""> <?php echo $options['price__b3__b2']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b3__n3']; ?>" alt=""> <?php echo $options['price__b3__b3']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b3__n4']; ?>" alt=""> <?php echo $options['price__b3__b4']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b3__n5']; ?>" alt=""> <?php echo $options['price__b3__b5']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b3__n6']; ?>" alt=""> <?php echo $options['price__b3__b6']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b3__n7']; ?>" alt=""> <?php echo $options['price__b3__b7']; ?>
							</li>
							<li>
								<img src="<?php echo $options['price__b3__n8']; ?>" alt=""> <?php echo $options['price__b3__b8']; ?>
							</li>
						</ul>
						<div class="introHolder">
							<a href="#" class="btn btn-accent" data-toggle="modal" data-target="#priceModalCenter">Рассчитать стоимость</a>
							<p><a class="download" href="<?php echo $options['price__b3__btn__2']; ?>" target="_blank">Скачать пример</a></p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<section class="banner" style="background-image:url('<?php echo $options['banner__bg__img']; ?>')">
		<div class="container">
			<div class="row yellowHolder">
				<div class="col-md-8 yellowHolder__left">
					<p>
						<span><?php echo $options['banner__p__intro']; ?></span>
					</p>
					<h2>
						<?php echo $options['banner__h2__intro']; ?>
					</h2>
				</div>
				<div class="col yellowHolder__right">
					<p class="yellowHolder__right__text"><?php echo $options['banner__right__text']; ?></p>
					<p class="yellowHolder__right__total"><?php echo $options['banner__right__text__price']; ?></p>
				</div>
			</div>

			<div class="row no-gutters banner__list">
				<div class="col-md-4">
					<ul>
						<li><?php echo $options['banner__banner__list__1']; ?></li>
						<li><?php echo $options['banner__banner__list__2']; ?></li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul>
						<li><?php echo $options['banner__banner__list__3']; ?></li>
						<li><?php echo $options['banner__banner__list__4']; ?></li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul>
						<li><?php echo $options['banner__banner__list__5']; ?></li>
						<li><?php echo $options['banner__banner__list__6']; ?></li>
					</ul>
				</div>
			</div>

			<div class="row no-gutters banner__click">
				<div class="col-md-8">
					<p><?php echo $options['banner__banner__click']; ?> <span class="line"><span class="arrow"></span></span></p>
				</div>
				<div class="col-md-4 introHolder">
					<a href="#" class="btn btn-accent" data-toggle="modal" data-target="#bannerModalCenter">Оставить заявку</a>
					<a href="<?php echo $options['banner__btn__2']; ?>" class="download" target="_blank">Скачать пример</a>
				</div>
			</div>
				
		</div>
	</section>

	<section class="staps" style="background-image:url('<?php echo $options['staps__bg__img']; ?>')">
		<div class="container">
			<div class="introHolder">
				<h2>
					<?php echo $options['staps__h2__intro']; ?>
				</h2>
			</div>

			<div class="row">
				<div class="col-md-6 col-lg-4">
					<div class="staps__num">
						<p><?php echo $options['staps__01__num']; ?></p>
						<hr>
					</div>
					<p class="staps__name">
						<?php echo $options['staps__01__name']; ?>
					</p>
					<p>
						<?php echo $options['staps__01__text']; ?>
					</p>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="staps__num">
						<p><?php echo $options['staps__02__num']; ?></p>
						<hr>
					</div>
					<p class="staps__name">
						<?php echo $options['staps__02__name']; ?>
					</p>
					<p>
						<?php echo $options['staps__02__text']; ?>
					</p>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="staps__num">
						<p><?php echo $options['staps__03__num']; ?></p>
						<hr>
					</div>
					<p class="staps__name">
						<?php echo $options['staps__03__name']; ?>
					</p>
					<p>
						<?php echo $options['staps__03__text']; ?>
					</p>
				</div>
			
				<div class="col-md-6 col-lg-4">
					<div class="staps__num">
						<p><?php echo $options['staps__04__num']; ?></p>
						<hr>
					</div>
					<p class="staps__name">
						<?php echo $options['staps__04__name']; ?>
					</p>
					<p>
						<?php echo $options['staps__04__text']; ?>
					</p>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="staps__num">
						<p><?php echo $options['staps__05__num']; ?></p>
						<hr>
					</div>
					<p class="staps__name">
						<?php echo $options['staps__05__name']; ?>
					</p>
					<p>
						<?php echo $options['staps__05__text']; ?>
					</p>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="staps__num">
						<p><?php echo $options['staps__06__num']; ?></p>
					</div>
					<p class="staps__name">
						<?php echo $options['staps__06__name']; ?>
					</p>
					<p>
						<?php echo $options['staps__06__text']; ?>
					</p>
				</div>
			</div>

		</div>
	</section>

	<section class="calculator inverse" style="background-image: url('/wp-content/uploads/2019/02/pattern.jpg')">
		<div class="container">
			
			<div class="introHolder inverse">
				<h2>
					<?php echo $options['calculator__h2__intro']; ?>
				</h2>
				<p>
					<?php echo $options['calculator__p__intro']; ?>
				</p>
			</div>

			<div class="row no-gutters calculator__block">
				<div class="col-md-2 col-lg-1 offset-lg-1"><img src="/wp-content/uploads/2019/02/calculator_inverse.svg" alt=""></div>
				<div class="col-md-4 col-lg-4 inverse"><p><?php echo $options['calculator__block__p1']; ?></p></div>
			
				<div class="col-md-2 col-lg-1 offset-lg-1"><img src="/wp-content/uploads/2019/02/percentage_inverse.svg" alt=""></div>
				<div class="col-md-4 col-lg-4 inverse"><p><?php echo $options['calculator__block__p2']; ?></p></div>
			</div>
			<div class="introHolder">
				<a class="btn btn-accent" href="<?php echo $options['calculator__block__href']; ?>"><?php echo $options['calculator__block__btn']; ?></a>
			</div>
			
		</div>
	</section>

	<section class="after" style="background-image:url('<?php echo $options['after__bg__img']; ?>')">
		<div class="container">
			<div class="introHolder">
				<h2>
					<?php echo $options['after__h2__intro']; ?>
				</h2>
			</div>

			<div class="row after__block">
				<div class="col-12 col-md-6">
					<img src="<?php echo $options['after__block__img1']; ?>" alt="">
					<div id="links">
						<p><?php echo $options['after__block__t1']; ?></p>
						<?php 
							$gallary = $options['after__gallary'];
							$gallary_img = explode(";", $gallary);
							$gallaryCount = count($gallary_img);

							if ($gallary) {
								echo 	'<script>document.getElementById("foto3d").href = "'. $gallary_img[0] .'"</script>';
							}
							for($i = 1; $i < $gallaryCount; $i++) {
								echo '<div style="display:none;"><a href="'. $gallary_img[$i] .'" data-gallery><img src="'. $gallary_img[$i] .'" alt=""></a></div>';
							}
						?>
					</div>
					<script>
						document.getElementById('links').onclick = function (event) {
								event = event || window.event;
							var target = event.target || event.srcElement,
				    		link = target.src ? target.parentNode : target,
				    		options = {index: link, event: event, toggleControlsOnSlideClick: false},
							links = this.getElementsByTagName('a');
							blueimp.Gallery(links, options);
						};
					</script>
				</div>
				<div class="col-12 col-md-6">
					<img src="<?php echo $options['after__block__img2']; ?>" alt="">
					<p><?php echo $options['after__block__t2']; ?></p>
				</div>
				<div class="col-12 col-md-6">
					<img src="<?php echo $options['after__block__img3']; ?>" alt="">
					<p><?php echo $options['after__block__t3']; ?></p>
				</div>
				<div class="col-12 col-md-6">
					<img src="<?php echo $options['after__block__img4']; ?>" alt="">
					<p><?php echo $options['after__block__t4']; ?></p>
				</div>
			</div>
		</div>
	</section>

	<section class="operator" style="background-image: url('<?php echo $options['operator__bg__img']; ?>')">
		<link rel="stylesheet" href="/wp-content/themes/okhall/css/blueimp-gallery.css">
		<script src="/wp-content/themes/okhall/js/blueimp/blueimp-gallery.min.js"></script>
		
		<div class="operator__blur">
			<div class="container">

				<div class="row align-items-center">
					<div class="col-md-6">
						<h2>
							<?php echo $options['operator__h2__intro']; ?>
						</h2>
					</div>
					<div class="col-md-6">
						<ul>
							<?php echo $options['operator__ul_intro']; ?>
						</ul>
					</div>
				</div>

			</div>
		</div>

		<div class="operator__text">
			<div class="container">

				<div class="row">
					<div class="col-md-6">
						<h4>
							<?php echo $options['operator__text__h4']; ?>
						</h4>
						<p class="phone">
							<?php echo $options['operator__text__phone']; ?>
						</p>
						<p>
							<?php echo $options['operator__text__p']; ?>
						</p>
						<div class="introHolder">
							<a href="#" class="btn btn-accent" data-toggle="modal" data-target="#bannerModalCenter">Оставить заявку</a>
						</div>
					</div>
					<div class="col-md-6">
						<img src="<?php echo $options['operator__text__img']; ?>" alt="">
					</div>
				</div>

			</div>
		</div>
	</section>
	
	<footer class="footer">
		<div class="container-fluid">
			<div class="row">

				<div class="map">
					<iframe src="https://www.google.com/maps/d/embed?mid=1yamYVGYk9byDIjCbv9hg-F93PS_PBLnk&hl=ru" width="100%" height="100%"></iframe>
				</div>

				<div class="container">
					<div class="col-sm-12 offset-0 col-md-10 offset-md-2 col-lg-7 offset-lg-0">
						<div class="row">
							<div class="col-12 col-sm-2 footer__logo">
								<a href="/"><img src="/wp-content/uploads/2019/02/logo_footer.svg" alt="<?php echo bloginfo('name'); ?>"></a>
							</div>
							
							<div class="col-12 col-sm-8 col-md-7 footer__text">
								<b><?php bloginfo('description'); ?></b>
								<span><?php echo $options['description']; ?></span>
							</div>
							
						</div>
				
						<div class="row">
							<div class="col-12 col-sm-7 col-md-6 footer__phone">
								<p class="footer__grey__text">
									Свяжитесь с нами:
								</p>
								<p><?php echo $number_public; ?></p>
								<p>
									<?php echo $mobile_public; ?></b>
									<span class="block">
									<a href="viber://chat?number=<?php echo $mobile_in; ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/header/viber.svg" alt="Viber"></a>
									<a href="https://wa.me/<?php echo $mobile_in; ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/header/whatsapp.svg" alt="Whatsapp"></a>
									</span>
								</p>
							</div>
							<div class="col-12 col-sm-5 footer__social">
								<p class="footer__grey__text">
									Мы в соц сетях:
								</p>
								<p>
									<a href="<?php echo $options['ok_vk']; ?>"><i class="fab fa-vk"></i></a>
									<a href="<?php echo $options['ok_facebook']; ?>"><i class="fab fa-facebook-f"></i></a>
									<a href="<?php echo $options['ok_instagramm']; ?>"><i class="fab fa-instagram"></i></a>
								</p>
							</div>
						</div>

						<div class="row">
							<div class="col-12 col-sm-7 col-md-6">
								<p class="footer__grey__text bottom">
									<?php bloginfo('name'); ?> © <?php echo date('Y'); ?> Все права защищены
								</p>
							</div>
							<div class="col-12 col-sm-5">
								<p class="footer__grey__text bottom">
									<a href="">Политика конфидициальности</a>
								</p>
							</div>
						</div>
					</div>

				
					
				</div>
			</div>
		</div>
	</footer>
	
</div>
<nav id="my-menu">
	<ul>
		<li class="active"><a href="#">Главная</a></li>
		<li><a href="#">Портфолио</a></li>
		<li><a href="#">Услуги</a></li>
		<li><a href="#">О нас</a></li>
		<li><a href="#">Блог</a></li>
		<li><a href="#">Контакты</a></li>
		<li class="phone">
			<a href="<?php echo $number_in; ?>"><?php echo $number_public; ?></a>
		</li>
		<li class="phone bottom">
			<a href="<?php echo $mobile_in; ?>"><?php echo $mobile_public; ?></b></a>
		</li>
	</ul>
</nav>
	

<!-- Modal -->
<div class="modal fade" id="catalogModalCenter" tabindex="-1" role="dialog" aria-labelledby="catalogModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      
    <?php include 'wp-content/themes/okhall/template-parts/modal-catalog.php'; ?>
      
  </div>
</div>

<div class="modal fade" id="bannerModalCenter" tabindex="-1" role="dialog" aria-labelledby="bannerModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      
    <?php include 'wp-content/themes/okhall/template-parts/modal-banner.php'; ?>
      
  </div>
</div>

<div class="modal fade" id="priceModalCenter" tabindex="-1" role="dialog" aria-labelledby="priceModalCenterTitle"
		aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<?php include 'wp-content/themes/okhall/template-parts/modal-price.php'; ?>
	</div>
</div>
<!-- End Modal -->