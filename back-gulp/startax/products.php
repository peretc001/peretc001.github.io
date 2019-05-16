<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php global $WOOF; ?>
<?php
	while ($the_products->have_posts()) : $the_products->the_post();
		global $post;
		$product = new WC_Product(get_the_ID());
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
<?php endwhile; ?>