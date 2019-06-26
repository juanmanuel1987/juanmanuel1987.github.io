<?php
// Declare Woo support
add_action( 'after_setup_theme', 'splash_woocommerce_support' );
function splash_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

//Remove Woo Breadcrumbs
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

function splash_remove_woo_widgets() {
	unregister_widget( 'WC_Widget_Recent_Products' );
	unregister_widget( 'WC_Widget_Featured_Products' );
	//unregister_widget( 'WC_Widget_Product_Categories' );
	unregister_widget( 'WC_Widget_Product_Tag_Cloud' );
	//unregister_widget( 'WC_Widget_Cart' );
	unregister_widget( 'WC_Widget_Layered_Nav' );
	unregister_widget( 'WC_Widget_Layered_Nav_Filters' );
	//unregister_widget( 'WC_Widget_Price_Filter' );
	unregister_widget( 'WC_Widget_Product_Search' );
	//unregister_widget( 'WC_Widget_Top_Rated_Products' );
	unregister_widget( 'WC_Widget_Recent_Reviews' );
	unregister_widget( 'WC_Widget_Recently_Viewed' );
	unregister_widget( 'WC_Widget_Best_Sellers' );
	unregister_widget( 'WC_Widget_Onsale' );
	unregister_widget( 'WC_Widget_Random_Products' );
}
add_action( 'widgets_init', 'splash_remove_woo_widgets' );

add_filter( 'woocommerce_enqueue_styles', '__return_false' );

add_filter( 'woocommerce_show_page_title', '__return_false' );

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );
add_filter( 'add_to_cart_fragments', 'splash_header_add_to_cart_fragment' );
function splash_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	<span class="stm-current-items-in-cart"><?php echo intval($woocommerce->cart->cart_contents_count); ?></span>
	<?php
	$fragments['.stm-current-items-in-cart'] = ob_get_clean();

	return $fragments;
}

/*Removing actions*/
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' , 10 );

add_filter( 'woocommerce_checkout_fields' , 'splash_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function splash_override_checkout_fields( $fields ) {
	$fields['billing']['billing_first_name']['placeholder'] = esc_html__('Nombre', 'splash');
	$fields['billing']['billing_last_name']['placeholder'] = esc_html__('Apellido', 'splash');
	$fields['billing']['billing_company']['placeholder'] = esc_html__('Nombre de la compañia', 'splash');
	$fields['billing']['billing_email']['placeholder'] = esc_html__('Email', 'splash');
	$fields['billing']['billing_phone']['placeholder'] = esc_html__('Teléfono', 'splash');
	$fields['billing']['billing_city']['placeholder'] = esc_html__('Ciudad', 'splash');
	$fields['billing']['billing_state']['placeholder'] = esc_html__('País', 'splash');
	$fields['billing']['billing_postcode']['placeholder'] = esc_html__('Código Postal', 'splash');

	$fields['shipping']['shipping_first_name']['placeholder'] = esc_html__('Nombre', 'splash');
	$fields['shipping']['shipping_last_name']['placeholder'] = esc_html__('Apellido', 'splash');
	$fields['shipping']['shipping_company']['placeholder'] = esc_html__('Nombre de la compañia', 'splash');
	$fields['shipping']['shipping_city']['placeholder'] = esc_html__('Ciudad', 'splash');
	$fields['shipping']['shipping_state']['placeholder'] = esc_html__('País', 'splash');
	$fields['shipping']['shipping_postcode']['placeholder'] = esc_html__('Código Postal', 'splash');

	return $fields;
}

//woocommerce single product add custom info

/**
 * woocommerce_single_product_summary hook.
 *
 * @hooked woocommerce_template_single_title - 5
 * @hooked woocommerce_template_single_rating - 10
 * @hooked woocommerce_template_single_price - 10
 * @hooked woocommerce_template_single_excerpt - 20
 * @hooked woocommerce_template_single_add_to_cart - 30
 * @hooked woocommerce_template_single_meta - 40
 * @hooked woocommerce_template_single_sharing - 50
 */

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30 );

if(is_layout("bb")){
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	add_action( 'woocommerce_single_product_summary', 'addInStockInfo', 10 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	add_action( 'woocommerce_variable_add_to_cart', 'stm_variable_add_to_cart', 30 );
} elseif(is_layout("af") || is_layout("baseball")){
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	add_action( 'woocommerce_single_product_summary', 'addInStockInfo', 10 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	add_action( 'woocommerce_variable_add_to_cart', 'stm_variable_add_to_cart', 30 );
} elseif(is_layout("sccr") || is_layout('soccer_two')) {
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	add_action( 'woocommerce_single_product_summary', 'addInStockInfo', 9 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 11 );
	add_action( 'woocommerce_variable_add_to_cart', 'stm_variable_add_to_cart', 30 );
}

function addInStockInfo(){
	get_template_part('/partials/global/woocommerce/stock');
}

function stm_variable_add_to_cart() {
	get_template_part('/partials/global/woocommerce/variable');
}

add_action( 'after_setup_theme', 'stm_woo_setup' );
function stm_woo_setup() {
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
}