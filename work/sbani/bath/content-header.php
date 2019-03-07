<?php
global $header_contacts, $footer_contacts;
?>
<div class="main-block">
    <!-- Main-menu -->
    <header class="header-main-menu white"> <!-- Цвет линии между меню и верхним инф блоком - #efefef-->
        <ul>
            <li class="logo"><a href="/"><img src="/images/logo-main__logo-image.svg"></a></li>
            <li class="position">Для тела и души</li>
            <li class="phone">
                <span class="phone">8 (918) 14 14 410</span><br>    
                <a href="/contacts/">Краснодар, Совхозная 41/2</a>
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