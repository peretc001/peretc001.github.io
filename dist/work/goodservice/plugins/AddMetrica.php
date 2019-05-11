<?php
/**
 * Plugin Name: Metrica
 * Description: Плагин добавляет меню Метрика на сайт для установки счетчиков Метрики
 * Author URI:  https://peretc001.github.io
 * Author:      Красовский Игорь
 *
 * @link https://peretc001.github.io
 * @author Krasovsky
 * @package WordPress
 * @subpackage Optimazed
 */


// Hook for adding admin menus
add_action('admin_menu', 'optimazedMetrica_add_pages');

// action function for above hook
function optimazedMetrica_add_pages() {
    add_menu_page('Метрика', 'Метрика', 9, __FILE__, 'optimazedMetrica_page', 'dashicons-admin-site', 85.6);
    register_setting( 'optimazedMetricaCustom', 'optimazedMetrica_settings' ); 
}
 
// mt_toplevel_page() displays the page content for the custom Test Toplevel menu
function optimazedMetrica_page() { 
	
	$options = get_option( 'optimazedMetrica_settings' );
?>
    <link rel='stylesheet' id='bootstrap-css'  href='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' type='text/css' media='all' />
   <form action='options.php' method='post'>

   	<section class="mt-3">
   		<div class="container">
	   		<div class="text-center">
				   <h2>Счетчики метрики</h2>
				   <p>Добавьте сюда коды счетчиков метрики</p>
	   		</div>

	   		<div class="row">
	   			<div class="col-md-4 offset-md-4 text-center">
	   				<textarea class="form-control text-center mt-2" rows="8" name='optimazedMetrica_settings[yandex]'><?php echo $options['yandex']; ?></textarea>
	   			</div>
	   		</div>

   		</div>
	   </section>
	   
	   <?php
	        settings_fields( 'optimazedMetricaCustom' );
	        do_settings_sections( 'optimazedMetricaCustom' );
	        submit_button('Сохранить');
	    ?>
	</form>
<?php }