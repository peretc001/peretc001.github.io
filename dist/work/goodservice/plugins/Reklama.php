<?php
/**
 * Plugin Name: Reklama
 * Description: Плагин добавляет рекламные блоки на сайт
 * Author URI:  https://peretc001.github.io
 * Author:      Красовский Игорь
 *
 * @link https://peretc001.github.io
 * @author Krasovsky
 * @package WordPress
 * @subpackage Optimazed
 */


// Hook for adding admin menus
add_action('admin_menu', 'optimazedReklama_add_pages');

// action function for above hook
function optimazedReklama_add_pages() {
    add_menu_page('Реклама', 'Реклама', 9, __FILE__, 'optimazedReklama_page', 'dashicons-admin-site', 86.6);
    register_setting( 'optimazedReklamaCustom', 'optimazedReklama_settings' ); 
}
 
// mt_toplevel_page() displays the page content for the custom Test Toplevel menu
function optimazedReklama_page() { 
	
	$options = get_option( 'optimazedReklama_settings' );
?>
    <link rel='stylesheet' id='bootstrap-css'  href='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' type='text/css' media='all' />
   <form action='options.php' method='post'>

   	<section class="mt-3">
   		<div class="container">
	   		<div class="text-center">
				   <h2>Рекламные блоки</h2>
				   <p>Добавьте сюда рекламные блоки</p>
	   		</div>

	   		<div class="row">
					<div class="col-md-6 text-center mb-3">
						<p>Левый блок</p>
	   				<textarea class="form-control text-center mt-2" rows="8" name='optimazedReklama_settings[left]'><?php echo $options['left']; ?></textarea>
					</div>
					<div class="col-md-6 text-center mb-3">
						<p>Правый блок</p>
	   				<textarea class="form-control text-center mt-2" rows="8" name='optimazedReklama_settings[right]'><?php echo $options['right']; ?></textarea>
	   			</div>
	   			<div class="col-md-4 text-center mb-3">
						<p>Под записью / под категорией (стр. категорий)</p>
	   				<textarea class="form-control text-center mt-2" rows="8" name='optimazedReklama_settings[single]'><?php echo $options['single']; ?></textarea>
					</div>
					<div class="col-md-4 text-center mb-3">
						<p>Шапке</p>
	   				<textarea class="form-control text-center mt-2" rows="8" name='optimazedReklama_settings[header]'><?php echo $options['header']; ?></textarea>
					</div>
					<div class="col-md-4 text-center mb-3">
						<p>Подвале</p>
	   				<textarea class="form-control text-center mt-2" rows="8" name='optimazedReklama_settings[footer]'><?php echo $options['footer']; ?></textarea>
	   			</div>
	   		</div>

   		</div>
	   </section>
	   
	   <?php
	        settings_fields( 'optimazedReklamaCustom' );
	        do_settings_sections( 'optimazedReklamaCustom' );
	        submit_button('Сохранить');
	    ?>
	</form>
<?php }