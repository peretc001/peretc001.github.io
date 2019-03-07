<?php

/*
    1 - Краснодар
    2 - Кореновск
*/
if(isset($_COOKIE['city']) && intval($_COOKIE['city']) === 2)
{
    define('BATH_CITY', 2);
}
else
{
    define('BATH_CITY', 1);
}

define('BATH_KRASNODAR_PAGE', 258);
define('BATH_KORENOVSK_PAGE', 260);
define('BATH_KRASNODAR_SERVICES_PAGE', 27);
define('BATH_KORENOVSK_SERVICES_PAGE', 263);

function bath_setup() 
{
    add_theme_support('post-thumbnails'); 

    add_image_size('default-photo',             1024,   768,   false);
    add_image_size('article-photo',              700,   900,   true);
    add_image_size('index-page-gallery-slider',  600,   207,   false);
    add_image_size('service-thumb',              240,   321,   true);
    add_image_size('index-page-slider',         1400,   520,   true);
    
    add_theme_support( 'title-tag' );
    
    if(class_exists('MultiPostThumbnails')) 
    {
        new MultiPostThumbnails(
            array(
                'label'=>'Дополнительная миниатюра',
                'id'=>'secondary-image',
                'post_type'=>'page',
            )
        );
    }

	register_nav_menu('primary', __( 'Primary Menu', 'bath' ));
	register_nav_menu('footer', __( 'Footer Menu', 'bath' ));
}
add_action('after_setup_theme', 'bath_setup');

add_action('admin_head', 'bath_custom_css');
function bath_custom_css() 
{
    echo '
<!-- some override for gallery editting -->
<style>
    .attachments-browser .media-toolbar {
        right: 600px;
    }
    .media-sidebar {
        width: 567px;
    }
    .attachments-browser .attachments, .attachments-browser .uploader-inline {
        right: 600px;
    }
    .korenovsk-page .row-title {
        color: #D45609;
    }
</style>
';
}

add_filter('post_class', 'bath_post_class', 999, 3);
function bath_post_class($classes, $class, $id)
{
    $ancestors = get_ancestors($id, 'page');
    if($id == BATH_KORENOVSK_PAGE || in_array(BATH_KORENOVSK_PAGE, $ancestors))
    {
        $classes[] = 'korenovsk-page';
    }
    return $classes;
}


$CONTENT_PAGES = array(
    'working_hours'     => 353,
    'city'              => 258,
    'big_slider'        => 11,
    'gallery'           => 90,
    'philosophy'        => 75,
    'mission'           => 77,
    'quote'             => 79,
    'services'          => 27,
    'howto'             => 81,
    'team'              => 87,
    'giftcard'          => 83,
    'rules'             => 85,
    'vitamins'          => 17,
    'soc_icons'         => 130,
);
$KORENOVSK_PAGES = array(
    'working_hours'     => 355,
    'city'              => 260,
    'big_slider'        => 266,
    'gallery'           => 295,
    'philosophy'        => 303,
    'mission'           => 483,
    'quote'             => 485,
    'services'          => 263,
    'vitamins'          => 286,
    'team'              => 309,
    'rules'             => 311,
    'howto'             => 467,
    'giftcard'          => 469,
);
if(BATH_CITY === 2) 
{
    $CONTENT_PAGES = array_merge($CONTENT_PAGES, $KORENOVSK_PAGES);
}

function restrict_post_deletion($post_ID)
{    
    global $CONTENT_PAGES, $KORENOVSK_PAGES;
    if(in_array(intval($post_ID), array_merge(array_values($CONTENT_PAGES), array_values($KORENOVSK_PAGES))) && get_post_type(intval($post_ID)) === 'page')
    {
        echo '
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        Данная страница используется в вёрстке сайта, её нельзя удалять.
    </body>
</html>
';
        exit;
    }
}
add_action('wp_trash_post', 'restrict_post_deletion', 10, 1);
add_action('before_delete_post', 'restrict_post_deletion', 10, 1);





function bath_add_settings() 
{    
    add_settings_field(
        'bath_header_contacts_1', 
        'Контакты в шапке сайта 1', 
        'bath_header_contacts_1_callback_function', 
        'general'
    );        
    add_settings_field(
        'bath_header_contacts_2', 
        'Контакты в шапке сайта 2', 
        'bath_header_contacts_2_callback_function', 
        'general'
    );        
    add_settings_field(
        'bath_footer_contacts_1', 
        'Контакты в подвале сайта 1', 
        'bath_footer_contacts_1_callback_function', 
        'general'
    );        
    add_settings_field(
        'bath_footer_contacts_2', 
        'Контакты в подвале сайта 2', 
        'bath_footer_contacts_2_callback_function', 
        'general'
    );    
    
    register_setting('general', 'bath_header_contacts_1');
    register_setting('general', 'bath_header_contacts_2');    
    register_setting('general', 'bath_footer_contacts_1');
    register_setting('general', 'bath_footer_contacts_2');
}
add_action('admin_init', 'bath_add_settings');


function bath_header_contacts_1_callback_function() {
    ?><textarea cols="30" rows="3" name="bath_header_contacts_1"><?=get_option('bath_header_contacts_1')?></textarea><?
}
function bath_header_contacts_2_callback_function() {
    ?><textarea cols="20" rows="3" name="bath_header_contacts_2"><?=get_option('bath_header_contacts_2')?></textarea><?
}
function bath_footer_contacts_1_callback_function() {
    ?><textarea cols="20" rows="6" name="bath_footer_contacts_1"><?=get_option('bath_footer_contacts_1')?></textarea><?
}
function bath_footer_contacts_2_callback_function() {
    ?><textarea cols="20" rows="6" name="bath_footer_contacts_2"><?=get_option('bath_footer_contacts_2')?></textarea><?
}


class Bath_Walker_Nav_Menu extends Walker_Nav_Menu 
{
    
}


// Специальные шаблоны для галерей.
function custom_post_gallery_template($val, $attr) 
{
    $post = get_post();
    
    $attr = shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $attr, 'gallery');

    $attachments = get_posts(array(
        'post_type'=>'attachment',
        'post_mime_type'=>'image',
        'post_status'=>'inherit',
        'order'=>$attr['order'],
        'orderby'=>$attr['orderby'],
        'include'=>$attr['include'],
    ));
    
    //echo '<pre>',print_r($post, true),'</pre>';
    //echo '<pre>',print_r($attr, true),'</pre>';
    //echo '<pre>',print_r($attachments, true),'</pre>';
    
    if($GLOBALS['gallery_style'] === 'large-slider')
    {
        ob_start();
        ?>
        <div id="main-slider" class="royalSlider rsDefault">
            <?foreach($attachments as $a):?>
            <?
            $src = wp_get_attachment_image_src($a->ID, 'index-page-slider');
            $meta = get_post_meta($a->ID);
            
            $matches = array();
            preg_match('#(https?:)?//[^"\']+#', $meta['_custom_attachment_video'][0], $matches);
            //print_r($matches);
            $meta['_custom_attachment_video'][0] = $matches[0];
            ?>
            
            <?if(strlen($meta['_custom_attachment_video'][0]) > 0):?>
                <div class="rsContent">
                    <a href="<?=$src[0]?>" class="rsImg" data-rsvideo="<?=$meta['_custom_attachment_video'][0]?>"></a>
                </div><!--.rsContent-end-->
            <?else:?>
                <div class="rsContent">
                    <a href="<?=$src[0]?>" class="rsImg"></a>
                    <div class="rsABlock">
                        <div class="wrapper">
                            <p class="title"><?=$meta['_custom_attachment_header'][0]?></p>
                            <p><?=$meta['_custom_attachment_description'][0]?></p>
                        </div><!--.wrapper-end-->
                    </div><!--.rsABlock-end-->
                </div><!--.rsContent-end-->
            <?endif?>
            
            <?endforeach?>
        </div><!--.royalSlider-end-->
        <?
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }    
    elseif($GLOBALS['gallery_style'] === 'gallery-slider')
    {
        ob_start();
        ?>
        <div id="carousel-gallery" class="touchcarousel black-and-white photo-gallery">       			
            <ul class="touchcarousel-container">
                <?foreach($attachments as $a):?>
                <?
                $thumb_src = wp_get_attachment_image_src($a->ID, 'index-page-gallery-slider');
                $full_src = wp_get_attachment_image_src($a->ID, 'default-photo');
                ?>
                <li class="touchcarousel-item">
                    <a href="<?=$full_src[0]?>">
                        <span>
                            <img src="<?=$thumb_src[0]?>" height="207" width="<?=$thumb_src[1]?>" alt="" />
                        </span>
                    </a>
                </li>
                <?endforeach?>
            </ul>
        </div><!--.touchcarousel-end-->
        <?
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }
    
    return false;
}
add_filter('post_gallery', 'custom_post_gallery_template', 999, 2);


function edit_media_custom_fields($form_fields, $post) 
{
    $form_fields['custom_attachment_header'] = array( 
        'label' => 'Заголовок слайда', 
        'input' => 'textarea', 
        'value' => get_post_meta($post->ID, '_custom_attachment_header', true) 
    );      
    $form_fields['custom_attachment_description'] = array( 
        'label' => 'Описание слайда', 
        'input' => 'textarea', 
        'value' => get_post_meta($post->ID, '_custom_attachment_description', true) 
    );          
    $form_fields['custom_attachment_video'] = array( 
        'label' => 'Видео', 
        'input' => 'textarea', 
        'value' => get_post_meta($post->ID, '_custom_attachment_video', true) 
    );        

    return $form_fields;
}
function save_media_custom_fields($post, $attachment) 
{
    update_post_meta($post['ID'], '_custom_attachment_header', $attachment['custom_attachment_header']);
    update_post_meta($post['ID'], '_custom_attachment_description', $attachment['custom_attachment_description']);
    update_post_meta($post['ID'], '_custom_attachment_video', $attachment['custom_attachment_video']);
    return $post;
}
add_filter('attachment_fields_to_edit', 'edit_media_custom_fields', 11, 2);
add_filter('attachment_fields_to_save', 'save_media_custom_fields', 11, 2);


function custom_excerpt_length($length) {
	return 12;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);


function new_excerpt_more( $more ) {
	return '... <a class="link-gold" href="'. get_permalink( get_the_ID() ) . '">' . 'читать дальше' . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );


add_filter('rwmb_meta_boxes', 'bath_register_meta_boxes');
function bath_register_meta_boxes()
{
    $prefix = 'rwmb_';
    return array(array(
        'id'=>'props',
        'title'=>'Свойства',
        'post_types'=>'page',
        'fields'=>array(
            array(
                'id'=>$prefix.'show_as_list',
                'name'=>'Показывать в виде списка',
                'type'=>'checkbox'
            ),
            array(
                'id'=>$prefix.'service_price',
                'name'=>'Цена услуги',
                'type'=>'text'
            ),
        ),
    ));
    
}

add_action('admin_menu', 'sbani_add_pages');

function sbani_add_pages() {
    add_menu_page('ПРАЙС', 'ПРАЙС', 8, __FILE__, 'sbani_page');
    register_setting( 'sbaniCustom', 'sbani_settings' ); 
}
 
// mt_toplevel_page() displays the page content for the custom Test Toplevel menu
function sbani_page() { 
    
    $options = get_option( 'sbani_settings' );
    echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">';

    echo '<form action="options.php" method="post">'; 

    ?>
    <br>
    <br>
    <section class="price">
        <div class="container">
            <h2 class="text-center mb-4">Цены:</h2>
            <div class="row">
                <div class="col-md-6 offset-md-2 mb-2">
                    <input type="text" class="form-control" name="sbani_settings[sb_price_text1]" value="<?php echo $options['sb_price_text1']; ?>">
                </div>
                <div class="col-md-1">
                    <input type="text" class="form-control" name="sbani_settings[sb_price1]" value="<?php echo $options['sb_price1']; ?>">
                </div>
                <div class="col-md-6 offset-md-2 mb-2">
                    <input type="text" class="form-control" name="sbani_settings[sb_price_text2]" value="<?php echo $options['sb_price_text2']; ?>">
                </div>
                <div class="col-md-1">
                    <input type="text" class="form-control" name="sbani_settings[sb_price2]" value="<?php echo $options['sb_price2']; ?>">
                </div>
                <div class="col-md-6 offset-md-2 mb-2">
                    <input type="text" class="form-control" name="sbani_settings[sb_price_text3]" value="<?php echo $options['sb_price_text3']; ?>">
                </div>
                <div class="col-md-1">
                    <input type="text" class="form-control" name="sbani_settings[sb_price3]" value="<?php echo $options['sb_price3']; ?>">
                </div>
            </div>
        </div>    

    </section>
    


    <?php    settings_fields( 'sbaniCustom' );
        do_settings_sections( 'sbaniCustom' );
        submit_button('Сохранить');
        
    echo '</form>';

}
    