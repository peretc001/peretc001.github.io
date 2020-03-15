<?php 
/**
* The template for displaying taxonomy brands
* Template Name: brands
* @package WordPress
* @subpackage skipao
* @author https://krasovsky23.ru
*/

get_header(); 
$brands = get_terms( 'brands' );

//Получаем данные рубрики
$term = get_queried_object();
$term_id = $term->term_id;
$term_url = $term->slug;
//Подключаем опции
$options = get_option( 'skipao_settings' );
?>
<div class="breadcrumb">
   <a href="/">Главная</a> > <a href="/brands/">Бренды</a> > <?php echo single_cat_title(); ?>
</div>

   <section class="about">
      <div class="container">

         <div class="row">
            <div class="col-md-6 left">
               <h2 class="h2__title liner">
                  Сплит-системы <?php echo single_cat_title(); ?>
               </h2>
               <?php echo category_description(); ?>
            </div>
            <div class="col-md-6 align-self-center text-center">
            <?php 
               $image = get_field('img', $term);
               if( !empty($image) ): ?>
               <img class="box-shadow-right" src="<?php echo $image; ?>" alt="<?php echo single_cat_title(); ?>" />
            <?php endif; ?>
            </div>
         </div>

         <div class="row about__catalog">
            <div class="col-lg-5">
               <div class="about__catalog__credit">
                  <h5>Не хватает на сплит-систему?</h5>
                  <p>Бери сейчас, плати потом</p>
                  <a href="" data-toggle="modal" data-target="#credit" 
                     data-credit="Заявка на кредит" class="btn btn-outline-dark">Заявка на кредит</a>
               </div>
            </div>
            <div class="col-lg-7 pt-2">
               <h3 class="h2__title liner">Выберите серию</h3>
               <div class="row align-items-start">
                  <div class="col-6">
                     <p><b>On / Off</b></p>
                     <?php 
                        $query = new WP_Query(array ( 'tax_query' => array(
                           array(
                              'taxonomy' => 'brands',
                              'field'    => 'id',
                              'terms'    => $term_id
                           )
                        ), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1));
                           if ($query->have_posts()):
                           $i = 0;
                           while ( $query->have_posts() ) : $query->the_post();
                              $polupromyshlennye = get_field( 'polupromyshlennye', $post->ID );
                              if ( get_field( 'tip_kompressora', $post->ID )  != 'инвертор' && $polupromyshlennye != 'Да'): ?>
                     <ul>
                        <li><a href="#<?php echo $i; ?>"><?php echo single_cat_title(); ?> <?php echo the_title(); ?></a></li>
                     </ul>
                     <?php
                        endif;
                        $i++;
                        endwhile; wp_reset_postdata();
                        endif;
                     ?>
                  </div>
                  <div class="col-6">
                     <p><b>Инвертор</b></p>
                     <?php 
                        $query = new WP_Query(array ( 'tax_query' => array(
                           array(
                              'taxonomy' => 'brands',
                              'field'    => 'id',
                              'terms'    => $term_id
                           )
                        ), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1));
                           if ($query->have_posts()):
                           $i = 0;
                           while ( $query->have_posts() ) : $query->the_post();
                           if ( get_field( 'tip_kompressora', $post->ID )  == 'инвертор'): ?>
                     <ul>
                        <li><a href="#<?php echo $i; ?>"><?php echo single_cat_title(); ?> <?php echo the_title(); ?></a></li>
                     </ul>
                     <?php
                        endif;
                        $i++;
                        endwhile; wp_reset_postdata();
                        endif;
                     ?>
                  </div>
               </div>
            </div>
         </div>
         
      </div>
   </section>

   <section class="top__product">
      <div class="container">
            
         <div class="product__carousel">
            
         <?php 
            $query = new WP_Query(array ( 'tax_query' => array(
               array(
                  'taxonomy' => 'brands',
                  'field'    => 'id',
                  'terms'    => $term_id
               )
               ), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1));
               if ($query->have_posts()):
               $i = 0;
               while ( $query->have_posts() ) : $query->the_post();
               
                  $post_tumb = get_post_thumbnail_id( $post->ID );
                  ?>
                  <?php 
                     $polupromyshlennye = get_field( 'polupromyshlennye', $post->ID );
                     if ($polupromyshlennye != 'Да') {
                  ?>
                  <!-- Card -->
                  <div class="top__card" id="<?php echo $i; ?>">
                     <div class="top__card__header">
                        <div class="top__card__header__img">
                           <a data-fancybox href="<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ); ?>">
                              <img src="<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ); ?>" alt="<?php echo the_title(); ?>">
                           </a>
                        </div>
                        <div class="top__card__header__title">
                           <div class="top__card__header__title__wrap">
                              <div class="top__card__header__title__caption">
                                 <h3><span><?php echo $term->name; ?></span> <?php echo the_title(); ?></h3>
                              </div>
                              <!-- TAB -->
                              <div class="top__card__header__title__caption__tabs">
                                 <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                       <a class="nav-link" id="pills-about-tab" data-toggle="pill" href="#pills-about<?php echo $i; ?>" role="tab" aria-controls="pills-about" aria-selected="true">Описание</a>
                                    </li>
                                    <li class="nav-item">
                                       <a class="nav-link active" id="pills-tech-tab" data-toggle="pill" href="#pills-tech<?php echo $i; ?>" role="tab" aria-controls="pills-tech" aria-selected="false">Характеристики</a>
                                    </li>
                                 </ul>
                                 <div class="top__card__header__title__caption__tabs__warrantly">
                                    <p><b>Звоните:</b> <a class="phone" href="tel:<?php echo $options['phone']; ?>"><?php echo $options['phone']; ?></a></p>
                                 </div>
                              </div>
                              <div class="tab-content" id="pills-tabContent">
                                 <div class="tab-pane fade" id="pills-about<?php echo $i; ?>" role="tabpanel" aria-labelledby="pills-top-about">
                                    <div class="slice brand__about">
                                       <?php echo the_excerpt(); ?>
                                    </div>
                                 </div>
                                 <div class="tab-pane fade show active" id="pills-tech<?php echo $i; ?>" role="tabpanel" aria-labelledby="pills-tech-tab">
                                    <!-- Start Tech -->
                                    <ul class="tech__list">
                                       <li class="tech__list__item">
                                          <span>Завод изготовитель</span>
                                          <span>
                                          <?php
                                             if ( get_field( 'zavod_izgotovitel', $post->ID ) ): ?>
                                             <?php the_field( 'zavod_izgotovitel' ); ?>
                                          <?php endif; ?>
                                          </span>
                                       </li>
                                       <li class="tech__list__item">
                                          <span>Страна бренда</span>
                                          <span>
                                          <?php
                                             if ( get_field( 'strana_brenda', $post->ID ) ): ?>
                                             <?php the_field( 'strana_brenda' ); ?>
                                          <?php endif; ?>
                                          </span>
                                       </li>
                                       <li class="tech__list__item">
                                          <span>Ионизация</span>
                                          <span>
                                          <?php
                                             if ( get_field( 'ionizacziya', $post->ID ) ): ?>
                                             <?php the_field( 'ionizacziya' ); ?>
                                          <?php endif; ?>
                                          </span>
                                       </li>
                                       <li class="tech__list__item">
                                          <span>Уровень шума</span>
                                          <span>
                                          <?php
                                             if ( get_field( 'uroven_shuma', $post->ID ) ): ?>
                                             <?php the_field( 'uroven_shuma' ); ?>
                                          <?php endif; ?>
                                          </span>
                                       </li>
                                       <li class="tech__list__item">
                                          <span>Тип компрессора</span>
                                          <span>
                                          <?php
                                             if ( get_field( 'tip_kompressora', $post->ID ) ): ?>
                                             <?php the_field( 'tip_kompressora' ); ?>
                                          <?php endif; ?>
                                          </span>
                                       </li>
                                       <li class="tech__list__item">
                                          <span>Класс энергоэффективности</span>
                                          <span>
                                          <?php
                                             if ( get_field( 'klass_energoeffektivnosti', $post->ID ) ): ?>
                                             <?php the_field( 'klass_energoeffektivnosti' ); ?>
                                          <?php endif; ?>
                                          </span>
                                       </li>
                                       <li class="tech__list__item">
                                          <span>Wi-Fi</span>
                                          <span>
                                          <?php
                                             if ( get_field( 'wi-fi', $post->ID ) ): ?>
                                             <?php the_field( 'wi-fi' ); ?>
                                          <?php endif; ?>
                                          </span>
                                       </li>
                                       <li class="tech__list__item">
                                          <span>Марка компрессора</span>
                                          <span>
                                          <?php
                                             if ( get_field( 'tajmer', $post->ID ) ): ?>
                                             <?php the_field( 'tajmer' ); ?>
                                          <?php endif; ?>
                                          </span>
                                       </li>
                                    </ul>
                                    <!-- End Tech -->
                                 </div>
                              </div>
                              <!-- END TAB -->
                           </div>
                           <div class="top__card__header__title__bottom">
                              <?php if ( get_field( 'garanty', $post->ID ) ): ?><p><?php the_field( 'garanty' ); ?></p><?php endif; ?>
                             <div class="url"><a class="orange" href="<?php echo get_permalink(); ?>">ПОЛНЫЕ характеристики ОЗНАКОМЬТЕСЬ!!! </a></div>
                           </div>
                        </div>
                     </div>
                     <div class="top__card__body">
                        <!-- Table -->
                        <table class="table">
                           <thead>
                              <tr>
                                 <td class="model">Модель</td>
                                 <td>Площадь, м<sup>2</sup></td>
                                 <td>Холод, квт</td>
                                 <td>Тепло, квт</td>
                                 <td class="size">Размер, мм</td>
                                 <td>Цена, руб</td>
                                 <td class="note">Примечание</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                              $models = query_posts( array(
                                 'post_type' => 'models',
                                 'post_parent__in' => array($post->ID),
                                 'posts_per_page'=>13, 
                                 'orderby'=>'post_title', 
                                 'order'=>'ASC',
                              ));
                                 if ($models) {
                                    foreach( $models as $model ){ ?>
                              <tr>
                                 <td class="model"><p><?php echo esc_html($model->post_title); ?></p></td>
                                 <td class="square"><p>до <?php
                                                      if ( $model_square = get_field( 'square', $model->ID ) ): ?>
                                                      <?php echo the_field( 'square', $model->ID ); ?>
                                                   <?php endif; ?></p>
                                          <p><?php 
                                             echo add_shortcode_skipao_mobile_model($model_square);
                                          ?></p>
                                       </td>
                                 <td class="twin"><p><?php
                                                if ( get_field( 'cold', $model->ID ) ): ?>
                                                <?php echo the_field( 'cold', $model->ID ); ?>
                                             <?php endif; ?></p></td>
                                 <td class="twin"><p><?php
                                                if ( get_field( 'hot', $model->ID ) ): ?>
                                                <?php echo the_field( 'hot', $model->ID ); ?>
                                             <?php endif; ?></p></td>
                                 <td class="size"><p><?php
                                                if ( get_field( 'size', $model->ID ) ): ?>
                                                <?php echo the_field( 'size', $model->ID ); ?>
                                             <?php endif; ?></p></td>
                                 <td class="price"><p><?php
                                                if ( get_field( 'price', $model->ID ) ): ?>
                                                <?php echo the_field( 'price', $model->ID ); ?>
                                             <?php endif; ?></p></td>
                                 <td class="note"><p><?php
                                                if ( get_field( 'primechanie', $model->ID ) ): ?>
                                                <?php echo the_field( 'primechanie', $model->ID ); ?>
                                             <?php else: echo 'В наличии'; endif; ?></p></td>
                                 <td class="buy">
                                    <a href="#" class="btn btn-accent" data-toggle="modal" data-target="#add" 
                                       data-name="Заказать сплит-систему" 
                                       data-title="<?php echo esc_html($term->name .' '. $post->post_title); ?>"
                                       data-model="<?php echo esc_html($model->post_title); ?>"
                                       data-price="<?php
                                                if ( get_field( 'price', $model->ID ) ): ?>
                                                <?php echo the_field( 'price', $model->ID ); ?>
                                             <?php endif; ?>">
                                       <img src="<?php echo get_template_directory_uri(); ?>/img/shopping-cart.svg"> <span>Купить</span>
                                    </a>
                                 </td>
                              </tr>
                              <?php } } ?>
                           </tbody>
                        </table>
                        <!-- End Table -->
                     </div>
                  </div>
                  <!-- End Card -->
                  <?php
               }
            $i++;
            endwhile; wp_reset_postdata();
            endif;
         ?>

         </div>

      </div>
   </section>

<!-- Callback form -->
	<?php
		#Данный блок редактируется в админке -> вкладка Компания
	?>
	<section class="callform">
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-4 left">
					<h5><?php echo $options['callform_title']; ?></h5>
					<p><?php echo $options['callform_desc']; ?></p>
					<form action="/" method="post" class="callback__form">
						<div class="callform_row">
							<input type="text" name="name" class="form-control col-md-4" value="" placeholder="Ваше имя" required>
							<input type="text" name="phone" class="form-control col-md-4 tel" value="" placeholder="Телефон" required>
							<button type="submit" class="btn btn-dark col-md-4 callback__form__button">Отправить</button>
						</div>
						<div class="robot">
							<div class="robot__check">
								<svg viewBox="0 0 60 60">
									<line class="st0 line1" x1="4.5" y1="30.5" x2="29.5" y2="52.5"/>
									<line class="st0 line2" x1="56.5" y1="4.5" x2="29.5" y2="52.5"/>
								</svg>
							</div>
							<span>Я согласен(а) с условиями <a href="/policy/">передачи информации</a></span>
						</div>
					</form>
				</div>
				<div class="right">
					<img src="<?php echo $options['callform_img']; ?>" alt="">
				</div>
			</div>
		</div>
	</section>
<!-- End Callback form -->

<!-- About -->
   <section class="taxonomy__page">
		<div class="container">
         <div class="text">
            <h2 class="h2__title liner">
            <?php 
               $seo_title = get_field('seo_title', $term);
               if( !empty($seo_title) ): ?>
               <?php echo $seo_title; ?>
            <?php endif; ?>
            </h2>
            <?php 
               $seo = get_field('seo', $term);
               if( !empty($seo) ): ?>
               <?php echo $seo; ?>
            <?php endif; ?>
         </div>

         <div class="montage">
            <h4>Стоимость монтажа</h4>
            <ul class="tech__list">
               <li class="tech__list__item">
                  <span>модель 07</span>
                  <span>
                  <?php 
                     $m1 = get_field('07', 61);
                     if( !empty($m1) ): ?>
                     <?php echo $m1; ?>
                  <?php endif; ?> р.
                  </span>
               </li>
               <li class="tech__list__item">
                  <span>модель 09</span>
                  <span>
                  <?php 
                     $m2 = get_field('09', 61);
                     if( !empty($m2) ): ?>
                     <?php echo $m2; ?>
                  <?php endif; ?> р.
                  </span>
               </li>
               <li class="tech__list__item">
                  <span>модель 12</span>
                  <span>
                  <?php 
                     $m3 = get_field('12', 61);
                     if( !empty($m3) ): ?>
                     <?php echo $m3; ?>
                  <?php endif; ?> р.
                  </span>
               </li>
               <li class="tech__list__item">
                  <span>модель 18</span>
                  <span>
                  <?php 
                     $m4 = get_field('18', 61);
                     if( !empty($m4) ): ?>
                     <?php echo $m4; ?>
                  <?php endif; ?> р.
                  </span>
               </li>
               <li class="tech__list__item">
                  <span>модель 24</span>
                  <span>
                  <?php 
                     $m4 = get_field('24', 61);
                     if( !empty($m4) ): ?>
                     <?php echo $m4; ?>
                  <?php endif; ?> р.
                  </span>
               </li>
               <li class="tech__list__item">
                  <span>модель 30</span>
                  <span>
                  <?php 
                     $m4 = get_field('30', 61);
                     if( !empty($m4) ): ?>
                     <?php echo $m4; ?>
                  <?php endif; ?> р.
                  </span>
               </li>
            </ul>
            <p class="text-center">
               <a class="btn btn-accent" href="/uslugi/ustanovka-split-sistem/">Подробнее</a>
            </p>
         </div>
			
		</div>
	</section>
<!-- End About -->

<?php get_footer(); ?>