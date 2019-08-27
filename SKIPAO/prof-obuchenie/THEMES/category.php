<?php get_header(); ?>
<div class="breadcrumb">
    <div class="container">
        <a href="/">Главная</a> <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }
    ?>
    </div>
</div>

<section class="blog">
      <div class="container">
         <h5 class="h2__title">
            <?php single_cat_title(); 
            $category = get_queried_object()->term_id; ?>
         </h5>

         <div class="row">
             <?php 
                $query = new WP_Query(array ( 'category__in' => array($category), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 8));
                  if ($query->have_posts()):
                  while ( $query->have_posts() ) : $query->the_post();
                  $post_tumb = get_post_thumbnail_id( $post->ID );
            ?>
            <div class="col-md-4">
               <div class="img__wrapper">
                  <a href="<?php echo get_permalink(); ?>"><img src="<?php echo wp_get_attachment_image_url( $post_tumb, 'large' ); ?>" alt="<?php echo the_title(); ?>"></a>
               </div>
               <a href="#"><strong><?php echo the_title(); ?></strong></a>
               <p><?php echo the_excerpt(); ?></p>
               <a href="<?php echo get_permalink(); ?>" class="btn btn-outline-accent">Подробнее</a>
            </div>
            <?php
                endwhile; wp_reset_postdata();
                endif;
            ?>
         </div>
      </div>
   </section>

   <section class="course" id="course">
      <div class="container">
         <h2 class="h2__title">
            Программы обучения
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

<?php get_footer(); ?>