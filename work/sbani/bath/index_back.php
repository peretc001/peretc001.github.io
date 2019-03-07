<?php get_header(); ?>

<?php
global $header_contacts, $footer_contacts;
?>


<div class="main-block">
    <!-- Main-menu -->
    <header class="header-main-menu"> <!-- Цвет линии между меню и верхним инф блоком - #efefef-->
        <ul>
            <li class="logo"><a href="/"><img src="/images/logo-main__logo-image.svg"></a></li>
            <li class="position">Для тела и души</li>
            <li class="phone">
                <?if(BATH_CITY === 1):?>
                    <span class="phone"><?=$header_contacts[0][1]?></span><br>    
                    <a href="/contacts/"><?=$header_contacts[0][0]?></a>
                <?else:?>
                    <i class="fa fa-phone" aria-hidden="true"></i> <?=$header_contacts[1][0]?><br>
                    <i class="fa fa-map-marker" aria-hidden="true"></i> <a href="/contacts/"><?=$header_contacts[1][1]?></a>
                <?endif?>
            </li>
			<li class="social">
				<a target="_blank" href="https://vk.com/sbani_krd" rel="noopener"><img src="/images/social/1b.svg"/></a>
				<a target="_blank" href="https://www.facebook.com/groups/840251799405804/" rel="noopener"><img src="/images/social/2b.svg" /></a>
				<a target="_blank" href="https://instagram.com/sbani_krd/" rel="noopener"><img src="/images/social/3b.svg"/></a>
				<a target="_blank" href="https://www.tripadvisor.ru/Attraction_Review-g298532-d12278932-Reviews-Suvorovskiye_Baths-Krasnodar_Krasnodar_Krai_Southern_District.html" rel="noopener"><img src="/images/social/4b.svg"/></a>
			</li>
        </ul> 
	</header>
	
	<!-- Mobile-menu -->
		<div class="mobile_header">
			<ul>
				<li class="mobile_menu">
					<a href="#uk_menu" data-uk-offcanvas><i class="fa fa-bars" aria-hidden="true"></i></a>
				</li>
				<li class="mobile_logo">
					<a href="/"><img class="logo-image" src="/images/logo-mobile.svg"></a>
				</li>
				<li class="mobile_phones">
					<a href="tel:<?if(BATH_CITY === 1):?><?=$header_contacts[0][1]?><?else:?><?=$header_contacts[1][0]?><?endif?>"><i class="fa fa-phone" aria-hidden="true"></i></a>
				</li>
			</ul>
		</div>
		
		<div class="mobile_header_list">	
			<div id="uk_menu" class="uk-offcanvas">
				<div class="uk-offcanvas-bar">
					<div class="mobile-menu-list-block">
						<div class="logo"><a class="logo" href="/"><img src="/images/logo-mobile-menu.svg"></a></div>
						<h3>Меню:</h3>
						<ul>
							<li class="list"><a>Услуги <i class="fa fa-angle-down" aria-hidden="true"></i></a>
								<ul class="child">
									<li><a href="#">Парения</a></li>
									<li><a href="#">SPA</a></li>
									<li><a href="#">Необычная чайная</a></li>
									<li><a href="#">Русская кухня</a></li>
								</ul>
							</li><li class="list"><a>Цены <i class="fa fa-angle-down" aria-hidden="true"></i></a>
								<ul class="child">
									<li><a href="#">Банное меню</a></li>
									<li><a href="#">SPA меню</a></li>
									<li><a href="#">Необычная чайная</a></li>
									<li><a href="#">Русская кухня</a></li>
								</ul>
							</li><li class="list"><a>О нас <i class="fa fa-angle-down" aria-hidden="true"></i></a>
								<ul class="child">
									<li><a href="#">Наша команда</a></li>
									<li><a href="#">Награды</a></li>
									<li><a href="#">Интерьер</a></li>
									<li><a href="#">Видео</a></li>
								</ul>
							</li><li class="list"><a href="#">Банный клуб</a></li><li class="list"><a href="#">Контакты</a></li>
						</ul>
						<ul class="social">
							<a target="_blank" href="https://vk.com/sbani_krd" rel="noopener"><img src="/images/social/1.svg"/></a>
							<a target="_blank" href="https://www.facebook.com/groups/840251799405804/" rel="noopener"><img src="/images/social/2.svg" /></a>
							<a target="_blank" href="https://instagram.com/sbani_krd/" rel="noopener"><img src="/images/social/3.svg"/></a>
							<a target="_blank" href="https://www.tripadvisor.ru/Attraction_Review-g298532-d12278932-Reviews-Suvorovskiye_Baths-Krasnodar_Krasnodar_Krai_Southern_District.html" rel="noopener"><img src="/images/social/4.svg"/></a>
						</ul>						
					</div>
				</div>
			</div>
		</div>
	<!-- Mobile-menu - end -->

    <!-- Carousel -->
	<link href="/styles/flickity.css" rel="stylesheet">
	<script src="/js/flickity.pkgd.js"></script>
		

	<div class="carousel" data-flickity='{ "wrapAround": true, "imagesLoaded": true, "autoPlay": true }'>
		<div class="carousel-cell">
			<img class="carousel-img" src="/images/carousel/1.jpg"/>
			<div class="carousel-caption">
				<div class="caption-bg">
					<p class="title">Липовый комплекс</p>
					<p>Только натуральные, природные материалы в парных</p>
				</div>
			</div>
		</div>
		<div class="carousel-cell">
			<img class="carousel-img" src="/images/carousel/2.jpg"/>
			<div class="carousel-caption">
				<div class="caption-bg">
					<p class="title">Русская кухня</p>
					<p>Только все самое свежее и очень вкусное</p>
				</div>
			</div>
		</div>
		<div class="carousel-cell">
			<img class="carousel-img" src="/images/carousel/3.jpg"/>
			<div class="carousel-caption">
				<div class="caption-bg">
					<p class="title">Эксклюзивные печи</p>
					<p>Дающие уникальный легкий пар</p>
				</div>
			</div>
		</div>
		<div class="carousel-cell">
			<img class="carousel-img" src="/images/carousel/9.jpg"/>
			<div class="carousel-caption">
				<div class="caption-bg">
					<p class="title">Мастера пара</p>
					<p>Владеющие различными техниками парения</p>
				</div>
			</div>
		</div>
		<!--div class="carousel-cell">
			<img class="carousel-img" src="http://s-bani.ru/wp-content/uploads/2015/05/IMG_5020-1400x520.jpg"/>
			<div class="carousel-caption">
				<div class="caption-bg">
					<p class="title">Веничек дубовый, распаренный...</p>
					<p>Подберем веник под каждого</p>
				</div>
			</div>
		</div-->
		<div class="carousel-cell">
			<img class="carousel-img" src="/images/carousel/4.jpg"/>
			<div class="carousel-caption">
				<div class="caption-bg">
					<p class="title">Хаммам</p>
					<p>Ритуал получения удовольствия</p>
				</div>
			</div>
		</div>
		<div class="carousel-cell">
			<img class="carousel-img" src="/images/carousel/5.jpg"/>
			<div class="carousel-caption">
				<div class="caption-bg">
					<p class="title">Массаж и SPA</p>
					<p>Рассалабляем по максимуму </p>
				</div>
			</div>
		</div>
		<div class="carousel-cell">
			<img class="carousel-img" src="/images/carousel/6.jpg"/>
			<div class="carousel-caption">
				<div class="caption-bg">
					<p class="title">Большая парная</p>
					<p>Место хватит всем</p>
				</div>
			</div>
		</div>
		<div class="carousel-cell">
			<img class="carousel-img" src="/images/carousel/8.jpg"/>
			<div class="carousel-caption">
				<div class="caption-bg">
					<p class="title">Пирамидальный тополь</p>
					<p>Не греется и не жжёт</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Carousel - end -->
	<!-- Main-menu -->
	<div id="dropmenu">
    <nav>
        <ul>
			<li class="list"><a>Услуги <i class="fa fa-angle-down" aria-hidden="true"></i></a>
				<ul>
					<li><a href="#">Парения</a></li>
					<li><a href="#">SPA</a></li>
					<li><a href="#">Необычная чайная</a></li>
					<li><a href="#">Русская кухня</a></li>
				</ul>
			</li><li class="list"><a>Цены <i class="fa fa-angle-down" aria-hidden="true"></i></a>
				<ul>
					<li><a href="#">Банное меню</a></li>
					<li><a href="#">SPA меню</a></li>
					<li><a href="#">Необычная чайная</a></li>
					<li><a href="#">Русская кухня</a></li>
				</ul>
			</li><li class="list"><a>О нас <i class="fa fa-angle-down" aria-hidden="true"></i></a>
				<ul>
					<li><a href="#">Наша команда</a></li>
					<li><a href="#">Награды</a></li>
					<li><a href="#">Интерьер</a></li>
					<li><a href="#">Видео</a></li>
				</ul>
			</li><li class="list"><a href="#">Банный клуб</a></li><li class="list"><a href="#">Контакты</a></li>
		</ul>
    </nav>
	</div>
	<!-- Main-menu - end -->

    
	
        
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
                    <div class="narrow">
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
                    <!--.left-end-->
                    </div>
					
					<div class="about_bani">
						<div class="img">
							<img src="/images/about.jpg">
						</div>
						<div class="text">
							<?=$page->post_content?>
						</div>
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