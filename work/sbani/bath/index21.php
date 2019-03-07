<?php get_header(); ?>

<?php
global $header_contacts, $footer_contacts;
?>

<div class="main-block">
    <!-- Main-menu -->
    <header class="header-main-menu"> <!-- Цвет линии между меню и верхним инф блоком - #efefef-->
        <div class="logo-main">
            <a class="logo-main__logo-image" href="/"></a>
            <a class="logo-main__logo-text" href="/"></a>
        </div>
        <div class="main-info-block">
            <div class="main-info-block__soc-seti">
                <?php
                    $page = get_page($CONTENT_PAGES['soc_icons']);
                ?>
                <div class="p"><?=$page->post_content?></div>
            </div>
            <div class="main-info-block__phones-main">
                <?if(BATH_CITY === 1):?>
                    <p class="phone-main-number"><?=$header_contacts[0][1]?></p>    
                    <p class="phone-main-address"><?=$header_contacts[0][0]?></p>
                <?else:?>
                    <?=$header_contacts[1][0]?>
                    <?=$header_contacts[1][1]?>
                <?endif?>
            </div>
        </div>      
    </header>
    
    
    <main>
        <?php
        $GLOBALS['gallery_style'] = 'large-slider';
        echo get_post_gallery($CONTENT_PAGES['big_slider']);
        ?>
        <i class="leafe-left"><b></b></i>
        <i class="leafe-right"><b></b></i>
    </main>
	
	 <header>
		 <nav class="main-menu-block">
        <ul id="menu">
            <?php
                $menuParameters = array(
                    'container'=>false,
                    'echo'=>false,
                    'items_wrap'=>'%3$s',
                    'walker'=>(new Bath_Walker_Nav_Menu()),);
                echo wp_nav_menu($menuParameters);
            ?>
        </ul>
    </nav>
    <!-- Main-menu - end -->

    <!-- Mobile-menu -->
    <header class="mobile_header">
        <div class="mobile_menu">
            <div class="mobile-button-menu"></div>
        </div>
        <div class="mobile_logo">
            <a class="mobile_logo__logo-image" href="/"></a>
        </div>
        <div class="mobile_phones">
            <div class="mobile-button-phones">&hellip;</div>
            <div class="mobile-phones-info-list">
                <?if(BATH_CITY === 1):?>
                    <p class="phone-main-number"><?=$header_contacts[0][1]?></p>    
                    <p class="phone-main-address"><?=$header_contacts[0][0]?></p>
                <?else:?>
                    <?=$header_contacts[1][0]?>
                    <?=$header_contacts[1][1]?>
                <?endif?>
            </div>
            <div class="mobile-social-info-list">
                <?php
                    $page = get_page($CONTENT_PAGES['soc_icons']);
                ?>
                <div class="p"><?=$page->post_content?></div>
            </div>
        </div>
    </header>
    <div class="mobile-menu-list-block">
        <?
            $menuParameters = array(
            'container'=>false,
            'echo'=>false,
            'items_wrap'=>'%3$s',
            'walker'=>(new Bath_Walker_Nav_Menu()),
            );
            echo wp_nav_menu($menuParameters);
        ?>    
    </div>
    <!-- Mobile-menu - end -->
	 </header>
	<main>
        

        <div class="slide-page wrapper" id="guy-and-massages">
            <?php
            $services_page = get_page($CONTENT_PAGES['services']);
            $services = get_pages(array(
                'parent'=>$CONTENT_PAGES['services'],
                'sort_column'=>'menu_order',
                'sort_order'=>'asc',
            ));
            //echo '<!--',print_r($services, true),'-->';
            $j = 0;
            ?>
            <?php foreach($services as $service):?>
                <article>
                    <?php
                    ++$j;
                    $page = get_page($service->ID);
                    $children = get_pages(array(
                        'parent'=>$service->ID,
                        'sort_column'=>'menu_order',
                        'sort_order'=>'asc',
                    ));
                    ?>
                    
                    <header>
                        <h1><?=$page->post_title?></h1>
                        <a href="<?=get_page_link($CONTENT_PAGES['services'])?>#service<?=$service->ID?>" class="read-all">посмотреть все</a>
                        <div class="p"><?=$page->post_content?></div>
                    </header>
                    <ul class="columns">
                        <?php $i = 0; ?>
                        <?php foreach($children as $p): ?>
                            <?php
                            $thumb = wp_get_attachment_url(get_post_thumbnail_id($p->ID));
                            if(class_exists('MultiPostThumbnails')) {
                                if(MultiPostThumbnails::has_post_thumbnail('page', 'secondary-image', $p->ID)) {
                                    continue;
                                }
                            }
                            ?>
                            <li>
                                <div class="narrow">
                                    <img src="<?=$thumb?>" alt="">
                                    <h2><?=$p->post_title?></h2>
                                    <div class="p"><?=$p->post_content?></div>
                                </div><!--.narrow-end-->
                            <!--li-end-->
                            <?php ++$i;?>
                            <?php if((($j&1) === 1) && ($i > 2)) { break; }?>
                            <?php if((($j&1) === 0) && ($i > 1)) { break; }?>
                        <?php endforeach ?>
                    </ul><!--.columns-end-->
                </article>
            <?php endforeach ?>
            
            <div class="button-cover">
                <a href="<?=get_page_link($CONTENT_PAGES['services'])?>" class="button"><?=$services_page->post_content?></a>
            </div><!--.button-cover-end-->
            
        </div><!--.slide-page-end-->

        <div class="slide-page bg_gray" id="delivery-of-vitamins">
            <article class="wrapper">
                <?php
                $page = get_page($CONTENT_PAGES['vitamins']);
                $children = get_pages(array(
                    'parent'=>$CONTENT_PAGES['vitamins'],
                    'sort_column'=>'menu_order',
                    'sort_order'=>'asc',
                ));
                ?>
                <header>
                    <h1><?=$page->post_title?></h1>
                    <br>
                </header>
                <ul class="columns">
                    <?php foreach($children as $p): ?>
                    <li>
                        <div class="narrow">
                            <?php
                            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($p->ID));
                            ?>
                            <img src="<?=$thumb[0]?>" alt="">
                            <h2><?=$p->post_title?></h2>
                            <div class="p"><?=$p->post_content?></div>
                        </div><!--.narrow-end-->
                    <!--li-end-->
                    <?php endforeach ?>
                </ul><!--.columns-end-->
            </article>
        </div><!--.slide-page-end-->

        <?php
        $GLOBALS['gallery_style'] = 'gallery-slider';
        echo get_post_gallery($CONTENT_PAGES['gallery']);
        ?>
        <div class="slide-page bg_white" id="about">
            <article>
                <?php
                $page = get_page($CONTENT_PAGES['philosophy']);
                $quote = get_page($CONTENT_PAGES['quote']);
                $mission = get_page($CONTENT_PAGES['mission']);
                $rules = get_page($CONTENT_PAGES['rules']);
                ?>
                <header>
                    <h1><?=$page->post_title?></h1>
                </header>
                <div class="wrapper-small">
                    <div class="left">
                        <blockquote>
                            <?=$quote->post_content?>
                        </blockquote>
                        <h3><?=$mission->post_content?></h3>
                        <a href="#regulations" class="button small green lightbox-inline-open">Правила посещения</a>
                        <div id="regulations" class="lightbox mfp-hide">
                            <p class="h1"><?=$rules->post_title?></p>
                            <div class="p"><?=$rules->post_content?></div>
                            <ul class="address-phone">
                                <li>
                                    <p><?=$footer_contacts[0][0]?></p>
                                    <p><?=implode('<br/>', array_slice($footer_contacts[0], 2))?></p>
                                <!--li-end-->
                                <li>
                                    <p><?=$footer_contacts[1][0]?></p>
                                    <p><?=implode('<br/>', array_slice($footer_contacts[1], 2))?></p>
                                <!--li-end-->
                            </ul><!--.address-phone-end-->
                        </div><!--.lightbox-end-->
                    </div><!--.left-end-->
                    <div class="right">
                        <?=$page->post_content?>
                    </div><!--.right-end-->
                </div><!--.wrapper-small-end-->
            </article>
        </div><!--.slide-page-end-->
        
        <div class="slide-page" id="club-program">
            <article>
                <div class="wrapper-small">
                    <div class="left">
                        <div class="img card-parallax">
                            <?if(BATH_CITY === 1):?>
                            <img src="/images/card-club.png" alt="Клубная карта" width="519" height="306">
                            <?else:?>
                            <img src="/wp-content/uploads/2015/05/sertificate.jpg" alt="Сертификат" width="431" height="347">
                            <?endif?>
                        </div><!--.img-end-->
                    </div><!--.left-end-->
                    <div class="right">
                        <?php
                        $page = get_page($CONTENT_PAGES['howto']);
                        ?>
                        <section>
                            <h2 class="hatching"><?=$page->post_title?></h2>
                            <div class="p"><?=$page->post_content?></div>
                        </section>
                        <br>
                        <?php
                        $page = get_page($CONTENT_PAGES['giftcard']);
                        ?>
                        <h4><?=$page->post_title?></h4>
                        <div class="p"><?=$page->post_content?></div>
                    </div><!--.right-end-->
                </div><!--.wrapper-small-end-->
            </article>
        </div><!--.slide-page-end-->

    </main>
    
    <footer id="contacts">
        <div class="wrapper-small">
            <div class="left">
                <p class="h4" style="text-transform: none;">Ждём вас:</p>
<?php
$page = get_page($CONTENT_PAGES['working_hours']);
?>
<p><?=$page->post_content?></p>
                <ul class="select-city">
                    <?php if(BATH_CITY === 2): ?>
                    <li id="city-map-1">	
                        <p class="title"><?=$footer_contacts[1][0]?></p>
                        <p><?=$footer_contacts[1][1]?></p>
                        <p><?=implode('<br/>', array_slice($footer_contacts[1], 2))?></p>
                    <!--li-end-->
                    <li id="city-map-2">	
                        <p class="title"><?=$footer_contacts[0][0]?></p>
                        <p><?=$footer_contacts[0][1]?></p>
                        <p><?=implode('<br/>', array_slice($footer_contacts[0], 2))?></p>
                    <!--li-end-->
                    <?php else: ?>
                    <li id="city-map-1">	
                        <p class="title"><?=$footer_contacts[0][0]?></p>
                        <p><?=$footer_contacts[0][1]?></p>
                        <p><?=implode('<br/>', array_slice($footer_contacts[0], 2))?></p>
                    <!--li-end-->
                    <li id="city-map-2">	
                        <p class="title"><?=$footer_contacts[1][0]?></p>
                        <p><?=$footer_contacts[1][1]?></p>
                        <p><?=implode('<br/>', array_slice($footer_contacts[1], 2))?></p>
                    <!--li-end-->
                    <?endif?>
                </ul><!--.select-city-end-->
            </div><!--.left-end-->
            <div class="right">
                <div class="social">
                    <img src="/images/logo-footer.png" alt="Суворовские бани">
                    <p>в соцсетях</p>
                    <?php
                    $page = get_page($CONTENT_PAGES['soc_icons']);
                    ?>
                    <div class="p"><?=$page->post_content?></div>
                </div><!--.social-end-->
            </div><!--.right-end-->
        </div><!--.wrapper-small-end-->
        
        <div class="map">
            <div id="map_canvas" class="map-canvas eq1"></div>
            <div id="map_canvas2" class="map-canvas eq2"></div>
            
            <script>
            function initialize_city_maps() 
            {
                // Карта Краснодар
                var mapOptions = {
                    center: new google.maps.LatLng(45.062851421777595, 38.948494156622246),
                    zoom: 17,
                    scrollwheel: false,
                    mapTypeControl: false,
                    panControl: false,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                
                <?php if(BATH_CITY === 2): ?>
                var map = new google.maps.Map(document.getElementById("map_canvas2"), mapOptions);
                <?php else: ?>
                var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
                <?php endif ?>

                var companyLogo = new google.maps.MarkerImage('/images/marker.png',
                    new google.maps.Size(169,142),
                    new google.maps.Point(0,0),
                    new google.maps.Point(84,138)
                );
            
                var companyMarker = new google.maps.Marker({
                    position: new google.maps.LatLng(45.062451421777595, 38.948494156622246),
                    map: map,
                    icon: companyLogo
                });
                
                var infowindow = new google.maps.InfoWindow({
                    content: '<div class="baloon"><nobr><b>Суворовские бани</b></nobr><div>г. Краснодар, ул. Совхозная, 41/2</div></div>'
                });
                
                google.maps.event.addListener(companyMarker, 'click', function() {
                    infowindow.open(map,companyMarker);
                });
                
                // Карта Кореновск
                var mapOptions2 = {
                    center: new google.maps.LatLng(45.451429, 39.44868550000001),
                    zoom: 17,
                    scrollwheel: false,
                    mapTypeControl: false,
                    panControl: false,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                
                <?php if(BATH_CITY === 2): ?>
                var map2 = new google.maps.Map(document.getElementById("map_canvas"), mapOptions2);
                <?php else: ?>
                var map2 = new google.maps.Map(document.getElementById("map_canvas2"), mapOptions2);
                <?php endif ?>
                
                var companyLogo2 = new google.maps.MarkerImage('/images/marker.png',
                    new google.maps.Size(169,142),
                    new google.maps.Point(0,0),
                    new google.maps.Point(84,138)
                );
            
                var companyMarker2 = new google.maps.Marker({
                    position: new google.maps.LatLng(45.451097, 39.44868550000001),
                    map: map2,
                    icon: companyLogo2
                });
                
                var infowindow2 = new google.maps.InfoWindow({
                    content: '<div class="baloon"><nobr><b>Суворовские бани</b></nobr><div>г. Кореновск, ул. Суворова 1а</div></div>'
                });
                
                google.maps.event.addListener(companyMarker2, 'click', function() {
                    infowindow2.open(map2,companyMarker2);
                });
            }
                
            $(function()
            {
                function loadScript() {
                    var script = document.createElement("script");
                    script.type = "text/javascript";
                    script.src = "http://maps.googleapis.com/maps/api/js?callback=initialize_city_maps";
                    document.body.appendChild(script);
                }
                
                window.onload = loadScript;
                
                $('footer .wrapper-small').wrap('<div class="shadow"/>');
                var $city = $('footer .select-city');
                $city.append('<li class="bg"><i/></li>').addClass('hover-style');
                var sizeCityBg = function () {
                    $('.bg', $city).width($('li.active', $city).innerWidth()).height($city.innerHeight()-5);
                }
                sizeCityBg();
                $(window).load(sizeCityBg);
                $('li:first-child', $city).addClass('active');
                $('li:not(.bg)', $city).on('click',	function(){
                    if ( $(this).hasClass('active') ) return false;
                    $('li.active', $city).removeClass('active');
                    $(this).addClass('active');
                    $('.bg', $city).width($('li.active', $city).innerWidth()).css('left', $(this).position().left);
                    if ( $(this).index() == 2 ) 
                        $('.map').css('left','-200%');
                    else if ( $(this).index() == 1 ) 
                        $('.map').css('left','-100%');
                    else if ( $(this).index() == 0 ) 
                        $('.map').css('left','0%');
                });
            });
            </script>
        </div><!--.map-end-->
    </footer>
</div><!--.main-block-end-->

<?php get_footer(); ?>