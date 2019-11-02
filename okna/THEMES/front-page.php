<?php get_header(); ?>
  
  <section class="slider">
    <div id="StarwoodCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">  
        <?php 
          $query = new WP_Query('post_parent=67&post_type=page');
            if ($query->have_posts()):
            while ( $query->have_posts() ) : $query->the_post();
            $post_tumb = get_post_thumbnail_id( $post->ID );
        ?>  
        <div class="carousel-item<?php if ($query->current_post == 0) echo(' active'); ?>">
          <img class="lazy" src="<?php echo get_stylesheet_directory_uri() .'/img/img.jpg'; ?>" data-src="<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ) ?>" alt="<?php the_title(); ?>">  
          <div class="carousel-caption">  
            <?php if ($query->current_post == 0) { ?><h1><?php the_title(); ?></h1><?php } else { ?><h2><?php the_title(); ?></h2><?php } ?>  
            <?php the_excerpt(); ?>
          </div>
        </div>
        <?php
          endwhile; wp_reset_postdata();
          endif;
        ?>
      </div> 
      <a class="carousel-control-prev" href="#StarwoodCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#StarwoodCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="slider__card">
    <?php
      $query = new WP_Query('page_id=67&post_type=page');
        if ($query->have_posts()):
        while ( $query->have_posts() ) : $query->the_post();
        $post_tumb = get_post_thumbnail_id( $post->ID );
        
        echo the_content();

      endwhile; wp_reset_postdata();
      endif;
    ?>
    </div>
    <div class="slider__form">
      <p class="caption">Хочешь деревянные <span>окна?</span></p>
      <div class="slider__form__right">
          <p>Ответь на несколько вопросов и получи <span>стоимость своего окна</span></p>
          <a href="" class="btn btn-accent" data-toggle="modal" data-target="#selectForm">Рассчитать</a>
      </div>
    </div>
  </section>
  <?php if ( is_front_page() ) { echo '</main>'; } ?>
  
  <?php
      $query = new WP_Query('page_id=296&post_type=page');
        if ($query->have_posts()):
        while ( $query->have_posts() ) : $query->the_post();
        $post_tumb = get_post_thumbnail_id( $post->ID ); 
  ?>
  <section class="about_home" style="background-image: url('<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ); ?>')">
    <div class="container">

      <?php  echo the_content(); ?>
    
    </div>
  </section>
  <?php endwhile; wp_reset_postdata();
      endif;
  ?>
  <section class="advantages">
    <div class="container">
    <?php 
        $query = new WP_Query('page_id=216&post_type=page');
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
  
  <section class="catalog__home">
    <div class="container-fluid">
      <h2 class="h2_title">Каталог</h2>
      <div class="row">
      <?php 
        $query = new WP_Query( array( 'post_parent__in' => array(8), 'post_type' => 'page', 'order' => 'ASC', 'orderby' => 'menu_order' ) );
          if ($query->have_posts()):
          while ( $query->have_posts() ) : $query->the_post();
          $post_tumb = get_post_thumbnail_id( $post->ID );
      ?>
      <div class="col-sm-6 col-md-4">
          <a href="<?php echo get_permalink(); ?>"><img src="<?php echo wp_get_attachment_image_url( $post_tumb, 'medium' ); ?>"></a>
          <h3><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h3>
          <?php 
            $query_child = new WP_Query( array( 'post_parent__in' => array( $post->ID ), 'post_type' => 'page' ) );
              if ($query_child->have_posts()):
              while ( $query_child->have_posts() ) : $query_child->the_post();
              $post_tumb = get_post_thumbnail_id( $post->ID );
          ?>
          <?php echo the_content(); ?>
          <?php
              endwhile;
              endif;
          ?>
      </div>

        
        
        <?php
          endwhile; wp_reset_postdata();
          endif;
        ?>
      </div>
    </div>
  </section>  
  
  <?php  #WHY
    $query = new WP_Query('page_id=85&post_type=page');
      if ($query->have_posts()):
      while ( $query->have_posts() ) : $query->the_post();
      $post_tumb = get_post_thumbnail_id( $post->ID );
  ?>
  <section class="why lazy" style="background-image: url('<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ); ?>')">
    <div class="container">
      <h3 class="h2_title inverse"><?php echo the_title(); ?></h3>
      <?php echo the_content(); ?>
      <div class="text-center">
        <button class="btn btn-outline-white" data-toggle="modal" data-target="#callback">Заказать консультацию</button>
      </div>
    </div>
  </section>
  <?php
    endwhile; wp_reset_postdata();
    endif;
  ?>

  <section class="work">
    <div class="container">
      <h4 class="h2_title">Примеры работ</h4>
      
      <div class="row">
      <?php 
        $query = new WP_Query(array ( 'category__in' => array(3), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 4));
          if ($query->have_posts()):
          while ( $query->have_posts() ) : $query->the_post();
          $post_tumb = get_post_thumbnail_id( $post->ID );
      ?>
      <div class="col-md-6">
          <div class="img_wrapper">
            <a href="<?php echo get_permalink(); ?>">
              <img class="lazy" src="<?php echo get_stylesheet_directory_uri() .'/img/img.jpg'; ?>" data-src="<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ) ?>" alt="<?php the_title(); ?>">  
            </a>
          </div>
        <p><a href="<?php echo get_permalink(); ?>"><?php echo $post->post_title; ?></a></p>
      </div>
      <?php
        endwhile; wp_reset_postdata();
        endif;
      ?>
      </div>

      <p class="text-center"><a href="/portfolio/" class="btn btn-outline-accent">Посмотреть все</a></p>

    </div>
  </section>

  <?php 
    $query = new WP_Query('page_id=431&post_type=page');
      if ($query->have_posts()):
      while ( $query->have_posts() ) : $query->the_post();
  ?>
  <section class="contact__form" style="background-image: url('<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ); ?>')">
    <div class="container">
      <h4 class="h2_title"><?php echo the_title(); ?></h4>
      <form action="/" class="callback__form" method="post">
        <?php echo the_content(); ?>
      </form>
    </div>
  </section>
  <?php
    endwhile; wp_reset_postdata();
    endif;
  ?>

<?php  #STEPS
    $query = new WP_Query('page_id=103&post_type=page');
      if ($query->have_posts()):
      while ( $query->have_posts() ) : $query->the_post();
  ?>
  <section class="steps">
    <div class="container">
      <h3 class="h2_title"><?php echo the_title(); ?></h3>
    </div>
    <?php echo the_content(); ?>
  </section>
  <?php
    endwhile; wp_reset_postdata();
    endif;
  ?>

<?php  #FOOTER
    $query = new WP_Query('page_id=129&post_type=page');
      if ($query->have_posts()):
      while ( $query->have_posts() ) : $query->the_post();
  ?>
  <section class="footer">
    <div class="map">
      <div class="map_wrapper">
        
      </div>
    </div>
    <div class="footer_block">
      <?php echo the_content(); ?>
    </div>
  </section>
  <?php
    endwhile; wp_reset_postdata();
    endif;
  ?>

<?php get_footer(); ?>
		