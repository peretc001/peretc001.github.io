<div class="main-block">  
    <?php get_template_part('content', 'header'); ?>
    
    <?php
    global $CONTENT_PAGES;
    ?>
    
    <main>
        <div class="slide-page wrapper">
            <?php
            $services_page = get_page($CONTENT_PAGES['services']);
            $services = get_pages(array(
                'parent'=>$CONTENT_PAGES['services'],
                'sort_column'=>'menu_order',
                'sort_order'=>'asc',
            ));
            //echo '<!--',print_r($services, true),'-->';
            $j = 0;
            $herbs_count = 0;
            $herb_icon_left = true;
            ?>
            <?php foreach($services as $service):?>
                <article id="service<?=$service->ID?>">
                    <?php
                    $page = get_page($service->ID);
                    $children = get_pages(array(
                        'parent'=>$service->ID,
                        'sort_column'=>'menu_order',
                        'sort_order'=>'asc',
                    ));
                    ?>
                    <header>
                        <h1><?=$page->post_title?></h1>
                        <div class="p"><?=$page->post_content?></div>
                    </header>
                    
                    <?php if(rwmb_meta('rwmb_show_as_list', array(), $service->ID) == 1):?>
                        <?php foreach($children as $i=>$p): ?>
                            <?php
                            //$thumb = wp_get_attachment_url(get_post_thumbnail_id($p->ID));
                            $price = rwmb_meta('rwmb_service_price', array(), $p->ID);
                            if(strlen($price) && !preg_match('/[^0-9 ]/i', $price)) {
                                $price .= ' р.';
                            }
                            ?>
                            <div class="service-list">
                                <img src="<?//=$thumb?>/images/icons/service-list.png" alt="">
                                <h2><?=$p->post_title?></h2>
                                <?php if(strlen($price)):?>
                                <h5><?=$price?></h5>
                                <?php endif ?>
                                <div class="p"><?=$p->post_content?></div>
                            </div><!--.service-list-end-->
                        <?php endforeach ?>
                    <?php else:?>
                    <ul class="columns">
                        <?php
                        $li_class = '';
                        ?>
                        <?php foreach($children as $i=>$p): ?>
                            <?php
                            $thumb = wp_get_attachment_url(get_post_thumbnail_id($p->ID));
                            $price = rwmb_meta('rwmb_service_price', array(), $p->ID);
                            if(strlen($price) && !preg_match('/[^0-9 ]/i', $price)) {
                                $price .= ' р.';
                            }
                            $second_thumb = false;
                            if(class_exists('MultiPostThumbnails')) {
                                if(MultiPostThumbnails::has_post_thumbnail('page', 'secondary-image', $p->ID)) {
                                    $second_thumb = MultiPostThumbnails::get_post_thumbnail_url(
                                        'page', 
                                        'secondary-image', 
                                        $p->ID, 
                                        'service-thumb'
                                    );
                                    if(++$herbs_count % 3 === 0) {
                                        $herb_icon_left = !$herb_icon_left;
                                    }
                                }
                            }
                            ?>
                            <?php if($second_thumb): ?>
                                <li class="<?=$li_class?>">
                                    <div class="narrow">
                                        <div class="extra-image">
                                            <div class="img-mask">
                                                <img src="<?=$second_thumb?>">
                                            </div><!--.img-mask-end-->
                                            <?php if($herb_icon_left): ?>
                                            <img src="<?=$thumb?>" alt="">
                                            <?php else: ?>
                                            <img src="<?=$thumb?>" alt="" class="right-pos">
                                            <?php endif ?>
                                        </div><!--.extra-image-end-->
                                    </div><!--.narrow-end-->
                                <!--li-end-->
                            <?php else: ?>
                                <li class="<?=$li_class?>">
                                    <div class="narrow">
                                        <img src="<?=$thumb?>" alt="">
                                        <h2><?=$p->post_title?></h2>
                                        <?php if(strlen($price)):?>
                                        <h5><?=$price?></h5>
                                        <?php endif ?>
                                        <div class="p"><?=$p->post_content?></div>
                                    </div><!--.narrow-end-->
                                <!--li-end-->
                            <?php endif ?>
                            <?php
                            if(($i + 1) % 5 === 0 || ($i + 1) % 5 === 3) 
                            {
                                if(($i + 1) % 5 === 3) {
                                    $li_class = 'half';
                                } else {
                                    $li_class = '';
                                }
                            }
                            ?>
                        <?php endforeach ?>
                    </ul><!--.columns-end-->
                    <?php endif?>
                </article><br>
            <?php endforeach ?>

            <div class="wrapper-small">
                <?php
                $page = get_page($CONTENT_PAGES['team']);
                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'article-photo');
                ?>
                <section class="team">
                    <h3>Ознакомьтесь с полным ассортиментом<br> предоставляемых услуг</h3>
                    <a href="#team" class="button small green lightbox-inline-open">Наши цены</a>
                    <div id="team" class="lightbox mfp-hide">
                        <p class="h1"><?=$page->post_title?></p>
                        <div class="img">
                            <div class="round-edge">
                                <img src="<?=$thumb[0]?>" alt="" >
                            </div><!--.round-edge-end-->
                        </div><!--.img-end-->
                        <div class="p"><?=$page->post_content?></div>
                    </div><!--.lightbox-end-->
                </section>
            </div><!--.wrapper-small-end-->
        
        </div><!--.slide-page-end-->
        
        <?php
        $GLOBALS['gallery_style'] = 'gallery-slider';
        echo get_post_gallery($CONTENT_PAGES['gallery']);
        ?>
    </main>
    
    <?php get_template_part('content', 'footer'); ?>
</div><!--.main-block-end-->