<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
	crossorigin="anonymous">
<link rel="stylesheet" href="/wp-content/themes/okhall/css/main.min.css">
<link rel="stylesheet" href="/wp-content/themes/okhall/css/insert.css">
<?php
// подключаем WP, можно конечно обойтись без этого, но зачем?
require( dirname(__FILE__) . '/wp-load.php');

echo $_POST['name'];

$url = site_url();
$options = get_option( 'okHall_settings' );

?>