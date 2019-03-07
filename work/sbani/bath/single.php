<?php get_header('secondary'); ?>

<div class="title-main">
    <div class="wrapper">
        <div class="narrow">
            <h1>
                <?php 
                    $cat = get_the_category(); 
                    $cat = $cat[0];
                    echo $cat->cat_name;
                ?>
            </h1>
        </div><!--.narrow-end-->
    </div><!--.wrapper-end-->
</div><!--.title-main-end-->

<div class="wrapper">
    
    <section>
    
        <aside>
            <ul class="arhive-menu">
                <li><a href="<?=get_category_link($cat->cat_ID)?>">&larr; назад к списку</a></li>
            </ul>
        </aside>

        <div class="mainbar">
            <div class="narrow">
                <?php if($cat->cat_ID === SSK_CAT_PHOTO_ID):?>
                <div class="photo-open">
                <?php endif?>
                
                    <?php
                    while(have_posts()) { 
                        the_post();
                        get_template_part('content', 'post-detail');
                    }
                    ?>
                
                <?php if($cat->cat_ID === SSK_CAT_PHOTO_ID):?>
                </div><!--.photo-open-end-->
                <?php endif?>
            </div><!--.narrow-end-->
            
        </div><!--.mainbar-end-->
    
        <div class="social">
            <div class="narrow">
                <?=do_shortcode('[raw_html_snippet id="ssk_social_buttons"]')?>                 
            </div><!--.narrow-end-->
        </div><!--.social-end-->
    </section>
</div><!--.wrapper-end-->
    
<?php get_footer(); ?>
