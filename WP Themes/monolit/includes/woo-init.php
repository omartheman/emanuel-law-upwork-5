<?php
/* banner-php */

// modify breadcrumb
add_filter( 'woocommerce_breadcrumb_defaults', 'monolit_woocommerce_breadcrumb_defaults');

function monolit_woocommerce_breadcrumb_defaults($default){
	$default = array(
					'delimiter'   => '',
					'wrap_before' => '<ul id="breadcrumb" class="main-breadcrumb woo-breadcrumb creat-list">',
					'wrap_after'  => '</ul>',
					'before'      => '<li>',
					'after'       => '</li>',
					'home'        => _x( 'Home', 'woo breadcrumb', 'monolit' ),
				);

	return $default;
}

// remove default breadcrumb
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

//change product list price and rating order
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 15 );

//add next/previous product
add_action( 'woocommerce_after_single_product_summary', 'monolit_product_post_nav', 14 );
function monolit_product_post_nav(){
	if(monolit_global_var('shop_single_navigation')){
	?>
	<div class="single-product-nav">
		<div class="blog-post-nav">
		    <ul class="creat-list">
		    <?php
		    $prev_post = get_adjacent_post( monolit_global_var('shop_single_nav_same_term') , '', true, 'product_cat' );
		    if ( is_a( $prev_post, 'WP_Post' ) ) :
		    ?>
		        <li class="previous"><a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="lef-ar-nav" title="<?php echo get_the_title($prev_post->ID ); ?>"><?php echo esc_html_x('Previous product','Previous product link','monolit') ;?></a></li>
		    <?php endif ?>
		    <?php
		    $next_post = get_adjacent_post( monolit_global_var('shop_single_nav_same_term') , '', false, 'product_cat' );
		    if ( is_a( $next_post, 'WP_Post' ) ) :
		    ?>
		        <li class="next"><a href="<?php echo get_permalink( $next_post->ID ); ?>" class="rig-ar-nav" title="<?php echo get_the_title($next_post->ID ); ?>"><?php echo esc_html_x('Next product','Next product link','monolit');?></a></li>
		    <?php endif ?>
		    </ul>
			<?php
		    if (monolit_global_var('shop_list_link') != ''): ?>
		        <div class="p-all">
		            <a href="<?php echo esc_url(monolit_global_var('shop_list_link')); ?>" ><i class="fa fa-th"></i></a>
		        </div>
		        <?php
		    endif; ?>
		</div>
	</div>
    <?php
	}
}
//filter related product count and columns
add_filter('woocommerce_output_related_products_args','monolit_woocommerce_output_related_products_args' );

function monolit_woocommerce_output_related_products_args($args){
	// $args = array(
	// 	'posts_per_page' 	=> 4,
	// 	'columns' 			=> 4,
	// 	'orderby' 			=> 'rand',
	// );
	if(monolit_global_var('single_related_count')){
		$args['posts_per_page'] = monolit_global_var('single_related_count') ;
	}

	return $args;
}

//filter up-sells product
add_filter('woocommerce_upsells_total','monolit_woocommerce_upsells_total' );
function monolit_woocommerce_upsells_total($limit){
	if(monolit_global_var('single_up_sells_count')){
		$limit = monolit_global_var('single_up_sells_count') ;
	}

	return $limit;
}