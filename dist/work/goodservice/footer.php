<?php
	//Вывод рекламного блока
	$options = get_option( 'optimazedReklama_settings' ); 
	if($options['footer']) { ?>
	<section class="footer-banner">
		<div class="container">
		<?php echo $options['footer']; ?>
		</div>
	</section>
<?php } ?>

<footer class="footer">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-lg-4 logo">
                <a href="/" class="navbar-brand"><?php echo bloginfo('name'); ?></a>
                <p><?php echo bloginfo('description'); ?></p>
                <div class="social">
                    <span>Присоединяйтесь:</span>
                    <?php $options = get_option( 'optimazed_settings' ); ?>
                    <a href="<?php echo $options['vk'];?>" target="_blank"><i class="fab fa-vk"></i></a>
                    <a href="<?php echo $options['fb'];?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
                    <a href="<?php echo $options['tw'];?>" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4 footer-menu">
                <p>Меню</p>
            
                <?php wp_nav_menu(array(
                    'theme_location'  => 'category_menu',
                    'container'       => 'ul',
                    'menu_class'      => 'footer-menu-nav', //ul class
                    'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'		  => new Optimazed_Walker_Nav_Menu()
                    )); 
                ?>

            </div>
        
            <div class="col-md-6 col-lg-4">
                <p>
                    Подписаться на рассылку:
                </p>
                <?php echo do_shortcode( '[contact-form-7 id="12" title="footer_email"]' ); ?>
                <div class="policy__checked">
                    <div class="radio">
                        <input id="policy_callback" type="checkbox" name="policy" checked required>
                        <label for="policy_callback">Согласен с условиями</label> <a href="/policy/" target="_blank">Политики конфиденциальности</a>
                    </div>
                </div>
                <div class="row author">
                   
                </div>
                <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139610738-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-139610738-1');
</script>

            </div>
    
        </div>
        
    </div>
</footer>
<div class="copyright">
    © <?php echo date('Y'); ?>. <?php echo bloginfo('name'); ?>. Все права защищены.
</div>
<?php wp_footer() ?>
<?php   $options = get_option( 'optimazedMetrica_settings' );
        echo $options['yandex']; ?>
<div class="toTop">
    <i class="far fa-caret-square-up"></i>
</div>
</body>
</html>