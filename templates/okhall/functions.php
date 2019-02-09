<?php
function enqueue_styles() {
	wp_enqueue_style( 'whitesquare-style', get_stylesheet_uri());
	wp_register_style('font-style', 'http://fonts.googleapis.com/css?family=Oswald:400,300');
	wp_enqueue_style( 'font-style');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts () {
	wp_register_script('html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js');
	wp_enqueue_script('html5-shim');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

//Menu admin
if (function_exists('add_theme_support')) {
	add_theme_support('menus');
}
register_nav_menus(array(
	'top' => 'Верхнее меню'
));


//User global


global $mystrings;

$mobile = '+7 (925) 344-25-77';
function wpSetup_api_add_admin_menu( ) {
    add_options_page( 'НАСТРОЙКИ КОМПАНИИ', 'НАСТРОЙКИ КОМПАНИИ', 'manage_options', 'wpSetup-settings-page', 'wpSetup_api_options_page' );
}

function wpSetup_api_settings_init( ) {
    register_setting( 'wpSetupCustom', 'wpSetup_api_settings' );
    add_settings_section(
        'wpSetup_api_wpSetupCustom_section',
        __( '', 'wordpress' ),
        'wpSetup_api_settings_section_callback',
        'wpSetupCustom'
    );

    add_settings_field(
        'wpSetup_api_text_description',
        __( 'Описание', 'wordpress' ),
        'wpSetup_api_text_description_render',
        'wpSetupCustom',
        'wpSetup_api_wpSetupCustom_section'
    );

    add_settings_field(
        'wpSetup_api_text_phone',
        __( 'Телефон', 'wordpress' ),
        'wpSetup_api_text_phone_render',
        'wpSetupCustom',
        'wpSetup_api_wpSetupCustom_section'
    );
    add_settings_field(
        'wpSetup_api_text_mobile',
        __( 'Мобильный', 'wordpress' ),
        'wpSetup_api_text_mobile_render',
        'wpSetupCustom',
        'wpSetup_api_wpSetupCustom_section'
    );
}

function wpSetup_api_text_description_render( ) {
    $options = get_option( 'wpSetup_api_settings' );
    ?>
    <input type='text' name='wpSetup_api_settings[wpSetup_api_text_description]' value='<?php echo $options['wpSetup_api_text_description']; ?>'>
    <?php
    $phone = $options['wpSetup_api_text_description'];
}

function wpSetup_api_text_phone_render( ) {
    $options = get_option( 'wpSetup_api_settings' );
    ?>
   <input type='text' name='wpSetup_api_settings[wpSetup_api_text_phone]' value='<?php echo $options['wpSetup_api_text_phone']; ?>'>
    <?php
}
function wpSetup_api_text_mobile_render( ) {
    $options = get_option( 'wpSetup_api_settings' );
    ?>
   <input type='text' name='wpSetup_api_settings[wpSetup_api_text_mobile]' value='<?php echo $options['wpSetup_api_text_mobile']; ?>'>
    <?php
}

function wpSetup_api_settings_section_callback( ) {
    echo __( 'На данной странице вы можете изменить данные о компании, номера телефонов, адреса и тд', 'wordpress' );
}

function wpSetup_api_options_page( ) {
    ?>
    <form action='options.php' method='post'>
        <h2>НАСТРОЙКИ КОМПАНИИ</h2>
        <?php
        settings_fields( 'wpSetupCustom' );
        do_settings_sections( 'wpSetupCustom' );
        submit_button();
        ?>
    </form>
    <?php
}
add_action( 'admin_menu', 'wpSetup_api_add_admin_menu' );
add_action( 'admin_init', 'wpSetup_api_settings_init' );



?>