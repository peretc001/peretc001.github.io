<?php //echo $post->ID; ?>
<?php if(!is_user_logged_in() && in_array($post->ID, array(5130,5913))): ?>

<?php

	// hide pages by id
	// http://startaks.ru/novaya-produkciya/
	// http://startaks.ru/actions/
	
	/*global $wp_query;
	$wp_query->set_404();
	status_header(404);
	get_template_part(404);*/
	wp_safe_redirect(get_page_link(47));
	exit();

?>

<?php else: ?>

<?php get_header(); ?>

	<?php echo dimox_breadcrumbs($home=''); ?>

	<div class="block__content"><div class="container">
			
	<div class="wp-content">

		<ul class="list-products">
		
		<?php 
		// echo (get_post_meta("1703-BX2", 'sale', true));
		// #$query = new WP_Query( array( 'post_type' => 'product', 'posts_id' => '1703-BX2', 'orderby' => 'date', 'order' => 'DESC' ) );
		// $query = new WP_Query( array( 'sale' => 'yes' ) );
		// while ( $query->have_posts() ) {
		// 	$query->the_post();
		// 	echo get_permalink();
		// 	echo '<br>';
		// 	echo the_title();

		// }


			$xml = simplexml_load_file('http://startaks.ru/wp-import/tmp/import.xml');
			#var_dump($xml);
			foreach($xml as $item) {
				if($item->sale == 'yes') { 
					$arr[] = $item->id;
				}
			}
			#var_dump('<pre>');
			#var_dump($arr);
			echo $comma_separated = implode(",", $arr);
			$array = json_decode(json_encode($arr));
	?>
	<script>
		let data = <?php echo json_encode($arr) ?>;
		let pid = data.map(item => {
			return item[0];
		});
		console.log(pid);
	</script>
	<?php echo do_shortcode( '[products skus="'. $comma_separated .'"]' ); ?>
			<?
			#$first = json_encode($first);
			#$second = json_decode($first);
		
			#var_dump('<pre>');

			#$products = new WP_Query( array( 'post_type' => 'product', 'post_id' =>  )  );
			#var_dump($products); 
			$array = json_decode(json_encode($arr));
			$args = array(
				'post_type' => 'product',
				'post_id' => '1703-BX2',
				'numberposts' => 12,
				'number' => 12,
			);

			$query = new WC_Product_Query($args);
				
				#$query->set('meta_key', '_stock_status');
				#$query->set('orderby', array('meta_value' => 'ASC'));
				
				$products = $query->get_products();

			if($products):
			foreach ( $products as $product) :
		?>
				<li id="id-<?php echo $product->id; ?>">
					<a href="<?php echo esc_url(get_permalink($product->id)); ?>"><?php if (has_post_thumbnail($product->id)) echo get_the_post_thumbnail($product->id, 'full', array( 'class' => 'lazyload')); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="270" height="194" class="lazyload" />'; ?></a>
					<div class="product-wrap">
						<div class="product-title"><a href="<?php echo esc_url(get_permalink($product->id)); ?>"><?php echo $product->name; ?></a></div>
						<div class="product-sku">Артикул: <?php echo $product->sku; ?></div>
						<div class="product-in-stock">
							<span>Наличие:</span>
							<?php
								//echo $product->stock_status.'<br>';
								//if($product->is_in_stock()){
								if($product->stock_status == 'instock'){
									print '<span class="green">На складе</span>';
								}else{
									print '<span class="red">Нет в наличии</span>';
								}
							?>
						</div>
						<?php echo $product->get_price_html(); ?>
						
						<form action="<?php echo do_shortcode('[add_to_cart_url id="'.$product->id.'"]'); ?>" class="cart" method="post" enctype="multipart/form-data">
							<div class="number-input">
								<button onclick="this.parentNode.querySelector('input[type=number]').stepDown(); return false;">-</button>
								<?php woocommerce_quantity_input( array('min_value' => 1, 'max_value' => 10000), $product, true ); ?>
								<button onclick="this.parentNode.querySelector('input[type=number]').stepUp(); return false;" class="plus">+</button>
							</div>
							<button onclick="var qnty = this.parentNode.querySelector('input[type=number]').value; this.setAttribute('data-quantity', qnty); return false;" data-quantity="1" data-product_id="<?php echo $product->id; ?>" type="submit" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Добавить</button>
						</form>
					</div>
				</li>
		<?php endforeach; endif; ?>
		<?
					#print_r($products);
					#the_title();
				// endwhile;
				// 	wp_reset_postdata();
				// endif;
		?>

		</ul>
	</div>

<?php get_footer(); ?>
<?php endif; ?>