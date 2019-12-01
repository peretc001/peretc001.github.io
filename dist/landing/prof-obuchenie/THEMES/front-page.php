<?php get_header(); ?>

<div class="header lazy" id="header" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/header.jpg')">
      <div class="container">
         <div class="header--title">
             <?php 
              $query = new WP_Query('page_id=8&post_type=page');
                if ($query->have_posts()):
                while ( $query->have_posts() ) : $query->the_post();
                $post_tumb = get_post_thumbnail_id( $post->ID );
            ?>  
                <?php the_content(); ?>
            <?php
              endwhile; wp_reset_postdata();
              endif;
            ?>
         </div>
      </div>
   </div>

   <section class="course" id="course">
      <div class="container">
         <h2 class="h2__title">
            Наши программы
         </h2>
         <div class="row">
             <?php 
              $query = new WP_Query(array ( 'post_parent__in' => array( 13 ), 'post_type' => 'page', 'order' => 'ASC', 'orderby' => 'ID' ));
                if ($query->have_posts()):
                    $i = 1;
                while ( $query->have_posts() ) : $query->the_post();
                
            ?> 
            <div class="col-md-6<?php echo !($i % 3) ? ' offset-md-3' : ''; ?>">
               <div class="course__card">
                  <p class="about"><?php echo get_post_meta( $post->ID, 'Верхнее название', true ); ?></p>
                  <h3><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h3>
                  <div class="course__card__place">
                     <p><u class="w150">Количество часов:</u> <b><?php echo get_post_meta( $post->ID, 'Количество часов', true ); ?></b></p>
                  </div>
                  <div class="course__card__place">
                     <p><u class="w150">Количество мест:</u> <b><?php echo get_post_meta( $post->ID, 'Количество мест', true ); ?></b></p>
                     <p><u>Осталось:</u> <b class="all"><?php echo get_post_meta( $post->ID, 'Осталось', true ); ?></b></p>
                  </div>
                  <p class="price"><strong>-<?php echo get_post_meta( $post->ID, 'Цена', true ); ?>р</strong></p>
                  <div class="course__card__btn">
                      <a href="#" class="btn btn-accent" data-toggle="modal" data-target="#callback"  data-name="Записаться на обучение" data-title="<?php echo the_title(); ?>">Записаться на обучение</a>
                     <a href="<?php echo get_permalink(); ?>" class="btn btn-outline-accent">Описание курса</a>
                  </div>
               </div>
            </div>
            <?php $i++;
              endwhile; wp_reset_postdata();
              endif;
            ?>
            </div>
        </div>
    </section>

    <?php //Расписание
      $query = new WP_Query('page_id=35&post_type=page');
        if ($query->have_posts()):
        while ( $query->have_posts() ) : $query->the_post();
    ?>
    <section class="time" id="time">
        <div class="container">
            <h4 class="h2__title"><?php echo the_title(); ?></h4>
            <?php the_content(); ?>
        </div>
    </section>
    <?php
      endwhile; wp_reset_postdata();
      endif;
    ?>


   <section class="features">
      <div class="container">
         <h4 class="h2__title">
            Преимущества
         </h4>
        <?php //Преимущества
          $query = new WP_Query('page_id=48&post_type=page');
            if ($query->have_posts()):
            while ( $query->have_posts() ) : $query->the_post();
        ?>
           <?php echo the_content(); ?>
        <?php
            endwhile; wp_reset_postdata();
            endif;
        ?>
      </div>
   </section>
    
    <?php //Запрос контактов
      $query = new WP_Query('page_id=55&post_type=page');
        if ($query->have_posts()):
        while ( $query->have_posts() ) : $query->the_post();
        $post_tumb = get_post_thumbnail_id( $post->ID );
    ?>
   <section class="callform" style="background-image: url('<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ); ?>');">
      <div class="container">
        <?php echo the_content(); ?>
      </div>
   </section>
   <?php 
        endwhile; wp_reset_postdata();
        endif;
    ?>
    <?php //Преподаватели
      $query = new WP_Query('page_id=67&post_type=page');
        if ($query->have_posts()):
        while ( $query->have_posts() ) : $query->the_post();
        $post_tumb = get_post_thumbnail_id( $post->ID );
    ?>
   <section class="team" id="team">
      <div class="container">
        <h4 class="h2__title">
            <?php echo the_title(); ?>
        </h4>
        <?php echo the_content(); ?>
        <?php 
            endwhile; wp_reset_postdata();
            endif;
        ?>
      </div>
   </section>

   <section class="review" id="review">
      <div class="container">
         <h5 class="h2__title">
            Отзывы
         </h5>

         <div class="review__carousel">
            <?php 
                $query = new WP_Query(array ( 'category__in' => array(3), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 8));
                  if ($query->have_posts()):
                  while ( $query->have_posts() ) : $query->the_post();
                  $post_tumb = get_post_thumbnail_id( $post->ID );
            ?>
               <div class="review__carousel__item">
                  <div class="img__wrapper">
                     <img src="<?php echo wp_get_attachment_image_url( $post_tumb, 'large' ); ?>" alt="">
                  </div>
                  <p class="name"><?php echo the_title(); ?></p>
                  <p>
                     <?php echo the_content(); ?>
                  </p>
               </div>
            <?php
                endwhile; wp_reset_postdata();
                endif;
            ?>
   
        </div>
         
      </div>
   </section>
    
    <?php //Партнеры
      $query = new WP_Query('page_id=90&post_type=page');
        if ($query->have_posts()):
        while ( $query->have_posts() ) : $query->the_post();
    ?>
   <section class="partners" id="partners">
      <div class="container">
         <h4 class="h2__title">
            <?php echo the_title(); ?>
         </h4>
         <?php echo the_content(); ?>
      </div>
   </section>
   <?php
        endwhile; wp_reset_postdata();
        endif;
    ?>

   <section class="certificat">
      <div class="container">
        <h5 class="h2__title">
            Наши сертификаты
        </h5>

        <div class="certificat__carousel">
            <?php 
                $query = new WP_Query(array ( 'category__in' => array(4), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 8));
                  if ($query->have_posts()):
                  while ( $query->have_posts() ) : $query->the_post();
                  $post_tumb = get_post_thumbnail_id( $post->ID );
            ?>
               <div class="certificat__carousel__item">
                  <div class="img__wrapper">
                     <a href="<?php echo wp_get_attachment_image_url( $post_tumb, 'original' ); ?>" target="_blank"><img src="<?php echo wp_get_attachment_image_url( $post_tumb, 'large' ); ?>" alt=""></a>
                  </div>
               </div>
            <?php
                endwhile; wp_reset_postdata();
                endif;
            ?>
        </div>
         
      </div>
   </section>

   <section class="blog">
      <div class="container">
         <h5 class="h2__title">
            Наши новости
         </h5>

         <div class="row">
             <?php 
                $query = new WP_Query(array ( 'category__in' => array(5), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 8));
                  if ($query->have_posts()):
                  while ( $query->have_posts() ) : $query->the_post();
                  $post_tumb = get_post_thumbnail_id( $post->ID );
            ?>
            <div class="col-md-4">
               <div class="img__wrapper">
                  <a href="<?php echo get_permalink(); ?>"><img src="<?php echo wp_get_attachment_image_url( $post_tumb, 'medium' ); ?>" alt="<?php echo the_title(); ?>"></a>
               </div>
               <a href="<?php echo get_permalink(); ?>"><strong><?php echo the_title(); ?></strong></a>
               <p><?php echo the_excerpt('20'); ?></p>
               <a href="<?php echo get_permalink(); ?>" class="btn btn-outline-accent">Подробнее</a>
            </div>
            <?php
                endwhile; wp_reset_postdata();
                endif;
            ?>

            <div class="col-12 text-center">
               <a href="/blog/" class="btn btn-accent">Все новости</a>
            </div>
         </div>
      </div>
   </section>

<?php get_footer(); ?>