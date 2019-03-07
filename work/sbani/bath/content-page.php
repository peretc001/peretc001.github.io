<div class="main-block">  
    <?php get_template_part('content', 'header'); ?>
    
    <main>
        <div class="slide-page">
            <article>
                <header>
                    <h1><?php the_title();?></h1>
                </header>
                <div class="wrapper-small">
                    <?php if(has_post_thumbnail()): ?>
                    <div class="round-edge">
                        <?=get_the_post_thumbnail(the_ID(), 'article-photo')?> 
                    </div><!--.round-edge-end-->
                    <?php endif; ?>
                    <div><?php the_content();?></div>
                </div><!--.wrapper-small-end-->
            </article>
        
        </div><!--.slide-page-end-->

    </main>
    
    <?php get_template_part('content', 'footer'); ?>
</div><!--.main-block-end-->