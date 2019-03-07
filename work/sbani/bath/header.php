<?php define('START_TIME', microtime(true)); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?wp_title('|', true, 'right')?><?bloginfo('name')?></title>
    
    <link href="/styles/styles.min.css" rel="stylesheet" />
	<link href="/styles/skrollr.css" rel="stylesheet" data-skrollr-stylesheet>
	<link href="/js/royalslider/royalslider.css" rel="stylesheet" />
	<link href="/js/royalslider/skins/default/rs-default.css" rel="stylesheet">
    <link href="/js/touchcarousel/touchcarousel.css" rel="stylesheet">
	<link href="/js/touchcarousel/black-and-white-skin/black-and-white-skin.css" rel="stylesheet">
	<link href="/js/magnific-popup/magnific-popup.css" rel="stylesheet">
	<link href="/styles/uikit.css" rel="stylesheet">
													
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
    <script src="/js/jquery.cookie.js" defer></script>
    <script src="/js/base.js"></script>
    
    <script src="/js/skrollr.stylesheets.min.js" defer></script>
	<script src="/js/skrollr.min.js" defer></script>
	<script src="/js/royalslider/jquery.royalslider.min.js"></script>
	<script src="/js/touchcarousel/jquery.touchcarousel-1.2.min.js" defer></script> 
	<script src="/js/jquery.singlepagenav.min.js" defer></script>
    <script src="/js/magnific-popup/jquery.magnific-popup.min.js" defer></script>
	<script src="/js/uikit.min.js"></script>
	
	
	
    
	
    
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

<?php
$GLOBALS['header_contacts'] = array(
    array_map('trim', explode("\n", get_option('bath_header_contacts_1'))),
    array_map('trim', explode("\n", get_option('bath_header_contacts_2'))),
);
$GLOBALS['footer_contacts'] = array(
    array_map('trim', explode("\n", get_option('bath_footer_contacts_1'))),
    array_map('trim', explode("\n", get_option('bath_footer_contacts_2'))),
);
?>