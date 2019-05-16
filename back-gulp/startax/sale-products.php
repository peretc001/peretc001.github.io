<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if(is_user_logged_in()):

get_header( 'shop' ); ?>

<?php
	
	//print_r($_GET);
		//[s] => github
	
		//if(get_sub_field('topslider_shirt', $product_cat) && !empty(get_field('topslider_shirt', $product_cat)))
		if (is_product_category()) {
			global $wp_query;
			$cat = $wp_query->get_queried_object();
			$term_id = $cat->term_id;
		}else{
			$cat=array();
			$term_id = '';
		}
	
	
	$args = array(
		'delimiter' => '<span class="delimiter">/</span>'
	);
?>
<div class="block__white"><div class="container"><?php woocommerce_breadcrumb($args); if(is_product_category())echo do_shortcode('[pdfcatalog catid="'.$term_id.'"]'); ?></div></div>

<main class="content"><div class="container">
	
	<?php		
	
		
		//print_r($cat);
		//echo get_field('_aioseop_keywords',$cat->term_id);
		//print_r(get_term_meta($cat->term_id, '_aioseop_keywords', false));
		//echo get_term_meta($cat->term_id, '_aioseop_keywords', true);
		
		if(!empty($term_id)):
		
		$product_cat = 'product_cat_'.$cat->term_id;
		//echo $product_cat;
		?>
		
		<div class="row">
		
			<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 products-filter">
			
				<?php //echo do_shortcode('[woocommerce_product_filter]'); ?>
				<?php //echo do_shortcode('[woocommerce_product_filter_products]'); ?>
				<?php //echo do_shortcode('[woocommerce_product_filter_category]'); ?>
				
				<?php //echo do_shortcode("[woof sid='auto_shortcode' taxonomies=product_cat:$cat->term_id]"); ?>
				<h4>Сортировать по:</h4>
				<?php woocommerce_catalog_ordering(); ?>
				
				<?php echo do_shortcode('[wa-wcc]'); ?>
				
				<?php //echo '<h4>Производитель:</h4>'.do_shortcode("[woof autosubmit=0 is_ajax=0 per_page=12 taxonomies=product_cat:$cat->term_id]"); ?>
			
			</div>
			
			<div class="col-sm-12 col-md-12 col-lg-9 col-xl-9 products-list">
	
	<?php //if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php //echo do_shortcode('[recent_products per_page="12" columns="4"]'); ?>
			<?php //woocommerce_content(); ?>
			
			
			<?php //echo do_shortcode("[woof_products is_ajax=0 per_page=12 taxonomies=product_cat:$cat->term_id custom_tpl='/woof_tpls/custom-archive-product.php']"); ?>
			
			<ul class="products columns-4">
			<?php
				
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				//$paged = get_query_var('paged');
				//$paged = 1;
				
				//$args = array();
				/*$args['post_type'] = 'product';
				$args['status'] = 'publish';
				$args['posts_per_page'] = 12;
				$args['numberposts'] = 12;
				$args['paged'] = $paged;
				$args['orderby'] = 'date';
				$args['order'] = 'DESC';*/
				
				
				$term = get_term_by('id', $cat->term_id, 'product_cat', 'ARRAY_A');
				//$args['category'] = array($term['slug']);
				
				/*$args = array(
					'post_type' => 'product',
					'tax_query' => array(
						array(
							'taxonomy' => 'product',
							'field'    => $term['slug']
						),
					),
				);*/
				
				//print_r($args);
				
				/*if(is_search()):
				
					$args='';
					$args = array(
						'status' => 'publish',
						'posts_per_page' => -1,
						'post_type' => 'variable',
						's' => get_search_query(),
					);
				
				endif;*/
				
				$offset=0;
				if($paged==1){
					$offset = 0;
				}else{
					$offset = ($paged - 1) * 12;
				}
				
				//$products = wc_get_products($args);
				$args = array(
					'post_type' => 'product',
					'posts_per_page' => 12,
					'numberposts' => 12,
					'number' => 12,
					'paged' => $paged,
					'category' => array($term['slug']),
					'offset' => $offset,
				);
				$query = new WC_Product_Query($args);
				
				$query->set('meta_key', '_stock_status');
				$query->set('orderby', array('meta_value' => 'ASC'));
				
				$products = $query->get_products();
				
				//$loop = new WP_Query($args);
				//if ( $loop->have_posts() ):
				//while ( $loop->have_posts() ) : $loop->the_post(); global $product;
				
				//print_r($products);

				if($products):
				foreach ( $products as $product) :
				
					//if($i==1)print_r($product);
				
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
			
			</ul>
			
			<?php
				
				$args['paginate'] = true;
				$results = wc_get_products($args);
				
				//$vararr = get_query_vars();
				
				//print_r($results);
				
				//echo $paged;
				
				echo paginate_links( array(
					'base'        => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
					'format' 	  => '?paged=%#%',
					'add_args'    => false,
					'current' 	  => max( 1, $paged ),
					'total' 	  => $results->max_num_pages,
					'prev_next'   => false,
					'type'        => 'list',
					//'end_size'    => 3,
					//'mid_size'    => 3
				) );
			
			?>
			
			</div>
			
		</div>
			
		<?php elseif(is_search()): ?>
		
			<h1>Результаты поиска по запросу «<strong><?php echo get_search_query(); ?></strong>»</h1>
			
			<?php
				
				//$cat_id = $query->get('cat_id');
				/*$cat='';
				if (is_product_category()) {
					global $wp_query;
					$cat = $wp_query->get_queried_object();
				}else{
					$cat=array();
					$cat['term_id']=0;
				}*/
				
				//echo 'page='.$_GET['page'].'<br>';
				
				
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				//$paged = get_query_var('paged');
				//$paged = 1;
				
				$args='';
				$args = array(
					'status' => 'publish',
					'posts_per_page' => -1,
					's' => get_search_query(),
					'posts_per_page' => 12,
					'numberposts' => 12,
					'paged' => $paged,
					'orderby' => 'date',
					'order' => 'DESC',
				);
				
				$products = wc_get_products($args);
				$i=0;
				if($products && is_search()): ?>
				
				<ul class="list-products">
				
				<?php
				foreach ( $products as $product) : $i++;
				
					//if($i==1)print_r($product);
				
				?>
				<li id="id-<?php echo $product->id; ?>">
					<a href="<?php echo esc_url(get_permalink($product->id)); ?>"><?php if (has_post_thumbnail($product->id)) echo get_the_post_thumbnail($product->id, 'product-category-thumb', array( 'class' => 'lazyload')); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="270" height="194" class="lazyload" />'; ?></a>
					<div class="product-wrap">
						<div class="product-title"><a href="<?php echo esc_url(get_permalink($product->id)); ?>"><?php echo $product->name; ?></a></div>
						<div class="product-sku">Артикул: <?php echo $product->sku; ?></div>
						<div class="product-in-stock">
							<span>Наличие:</span>
							<?php
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
			<?php endforeach; ?>
			</ul>
			
			<?php
				
				$args['paginate'] = true;
				$results = wc_get_products($args);
				
				//$vararr = get_query_vars();
				
				//print_r($results);
				
				//echo $paged;
				
				echo paginate_links( array(
					'base'        => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
					'format' 	  => '?paged=%#%',
					'add_args'    => false,
					'current' 	  => max( 1, $paged ),
					'total' 	  => $results->max_num_pages,
					'prev_next'   => false,
					'type'        => 'list',
					//'end_size'    => 3,
					//'mid_size'    => 3
				) );
			
			?>
			
			<?php endif; ?>
			<?php //wp_reset_query(); wp_reset_postdata(); ?>
		<?php //endwhile; endif; ?>
		
		<?php else: ?>
		
		<div class="row">
		
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 categories-list">
			
				<ul class="menu-categories">
					<?php
					
						/*$args='';
						$args = array(
							'taxonomy'   => 'product_cat',
							'number'     => 0,
							'orderby'    => 'term_group',
							'order'      => 'ASC',
							'hide_empty' => true,
							'include'    => array(),
						);
						$product_categories = get_terms($args);
						foreach($product_categories as $cat){
							echo $cat->name.'<br>';
						}*/
						
						wp_list_categories( array(
							'depth' => 1,
							'taxonomy' => 'product_cat',
							'title_li' => '',
							'orderby' => 'name',
							'exclude' => array(711),
							'walker' => new List_Category_Images
						));
					
						/*
						wp_nav_menu(array(
							'theme_location' => 'categories',
							'container'       => 'false',
							'items_wrap'      => '%3$s',
							'depth'           => 2));
						*/
					?>
				</ul>
			
			</div>
			
		</div>
		
		<?php endif; ?>
		
	</div></main>

<?php get_footer( 'shop' ); ?>

<?php
else:
	/*global $wp_query;
	$wp_query->set_404();
	status_header(404);
	get_template_part(404);*/
	wp_safe_redirect(get_page_link(47));
	exit();
endif;
 ?>