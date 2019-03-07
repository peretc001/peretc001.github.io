<?php define('START_TIME', microtime(true)); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5, user-scalable=yes">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->

    <title><?wp_title('|', true, 'right')?><?bloginfo('name')?></title>
    
    <link href="/styles/base.css?149824984" rel="stylesheet" />
	<link href="/styles/media-queries.css" rel="stylesheet" />

    <script src="/js/jquery-1.11.1.min.js"></script>
    <script src="/js/jquery.cookie.js" defer></script>
    <script src="/js/base.js"></script>
    
    <script src="/js/skrollr.stylesheets.min.js" defer></script>
	<script src="/js/skrollr.min.js" defer></script>

	<script src="/js/royalslider/jquery.royalslider.min.js"></script>
	<link href="/js/royalslider/royalslider.css" rel="stylesheet" />
	<link href="/js/royalslider/skins/minimal-white/rs-minimal-white.css" rel="stylesheet" />
    
    <link href="/js/touchcarousel/touchcarousel.css" rel="stylesheet">
	<link href="/js/touchcarousel/black-and-white-skin/black-and-white-skin.css" rel="stylesheet">

	<script src="/js/touchcarousel/jquery.touchcarousel-1.2.min.js" defer></script> 
	
	<script src="/js/jquery.singlepagenav.min.js" defer></script>
    
    <script src="/js/magnific-popup/jquery.magnific-popup.min.js" defer></script>
    <link href="/js/magnific-popup/magnific-popup.css" rel="stylesheet">

    
    <!--[if IE]>
    	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lte IE 7]>
    	<link href="/styles/base.ie.css" rel="stylesheet" />
    <![endif]-->
    <!--[if lt IE 9]>
        <script src="/js/respond.min.js"></script>
    <![endif]-->
    
	<?php wp_head(); ?>
    
    <script>
    $(function() {
        $('body').data('wordpress_ajax_url', '<?=admin_url('admin-ajax.php')?>');
    });
    </script>
</head>

<body>

<?//='<!--<pre>',print_r(get_option('permalink_structure'), true),'</pre>-->'?>
<?//='<!--<pre>',print_r($wp_query, true),'</pre>-->'?>
<?//='<!--<pre>',print_r($wp_rewrite->wp_rewrite_rules(), true),'</pre>-->'?>
<?//='<!--<pre>',print_r($wp_rewrite, true),'</pre>-->'?>

<div class="main-block">
    <header class="second">
        <div class="hhead">
            <div class="wrapper">
                <div class="logo"><a href="/" title="На главную"><img src="/images/logo.png" alt="СОКОЛ"></a></div><!--.logo-end-->
                <div class="coat-of-arms">
                    <a href="http://www.ipsc.org/" target="_blank"><img src="/images/coat-of-arms_ipsc-black.png" alt="I.P.S.C. DVC"></a>
                    <a href="http://ipsc.ru/" target="_blank"><img src="/images/coat-of-arms_ipsc.png" alt="RUSSIA IPSC"></a>						
                </div>
                <nav>
                    <div class="wrap">
                        <?
                        $menuParameters = array(
                            'container'=>false,
                            'echo'=>false,
                            'items_wrap'=>'%3$s',
                            'depth'=>1,
                            'theme_location'=>'primary',
                            'menu_class'=>'wrap',
                            'walker'=>(new SSK_Walker_Nav_Menu()),
                        );
                        echo wp_nav_menu($menuParameters);
                        ?>
                    </div><!--.wrap-end-->
                </nav>
            </div><!--.wrapper-end-->
        </div><!--.hhead-end-->
        <div class="hfoot">
            <img src="/images/bg_header-foot-1.jpg" alt="" class="cover" />
            <div class="wrapper">
                <p class="title">Спортивно-стрелковый клуб</p>
                <div class="contact">
                    <p class="phone"><?=get_option('ssk_phone')?></p>
                    <a href="https://maps.yandex.ru/?text=%D0%A0%D0%BE%D1%81%D1%81%D0%B8%D1%8F%2C%20%D0%9A%D1%80%D0%B0%D1%81%D0%BD%D0%BE%D0%B4%D0%B0%D1%80%2C%20%D0%A6%D0%B5%D0%BD%D1%82%D1%80%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9%20%D0%BC%D0%B8%D0%BA%D1%80%D0%BE%D1%80%D0%B0%D0%B9%D0%BE%D0%BD%2C%20%D0%91%D0%B5%D1%80%D0%B5%D0%B3%D0%BE%D0%B2%D0%B0%D1%8F%20%D1%83%D0%BB%D0%B8%D1%86%D0%B0%2C%2011&sll=38.95246%2C45.01381&ll=38.952460%2C45.013810&spn=0.038409%2C0.020760&z=15&l=map" target="_blank" class="link-white">мы на карте</a>
                </div><!--.contact-end-->
            </div><!--.wrapper-end-->
        </div><!--.hfoot-end-->
    </header>
    <main>