<div class="product">
	
	<?php #print_r($products); ?>
	<div class="product_image">
		<a href="<?php echo get_permalink( $post->ID ); ?>"><?php if (has_post_thumbnail($post->ID))echo get_the_post_thumbnail($post->ID, 'product-category-thumb'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="270" height="194" class="img-responsive" />'; ?></a>
	</div>
	<h1 class="SKU"><strong><?php echo $product->get_sku(); ?></strong></h1>
	<div class="product_description">
		<h2 class="product_title"><?php echo $post->post_title ?></h2>
		<div style="height: 80px; margin: bottom: 30px; overflow: hidden;"><p style="color:<?php echo $textColor ?>">
			<?php if ( $this->options->showDescription ) { ?>
				<?php echo $this->prepare( ( $this->options->useShortDescription ) ? $post->post_excerpt : $post->post_content ); ?>
			<?php } ?>
		</p></div>

		<?php if(!$_GET['price'] && $_GET['price']!='none'): ?>
			<?php if ( $this->options->showPrice ) { ?>
				<?php echo $product->get_price_html(); ?>
			<?php } ?>
		<?php endif; ?>

	</div>
</div>