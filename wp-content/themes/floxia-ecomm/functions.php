<?php 


function load_scripts(){
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style( 'magnific', get_template_directory_uri() . '/css/magnific-popup.min.css');
    wp_enqueue_style( 'font_awesome', get_template_directory_uri() . '/css/font-awesome.css');
    wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.min.css');
    wp_enqueue_style( 'themify_icons', get_template_directory_uri() . '/css/themify-icons.css');
    wp_enqueue_style( 'niceselect', get_template_directory_uri() . '/css/niceselect.css');
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css');
    wp_enqueue_style( 'flex_slider', get_template_directory_uri() . '/css/flex-slider.min.css');
    wp_enqueue_style( 'owl_carousel', get_template_directory_uri() . '/css/owl-carousel.css');
    wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/css/slicknav.min.css');
    wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/reset.css');
    wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css');
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    
    
    
    
    wp_enqueue_script( 'jquery', get_template_directory_uri(). '/js/jquery.min.js', array('jquery'), true );
    wp_enqueue_script( 'migrate', get_template_directory_uri(). '/js/jquery-migrate-3.0.0.js', array('jquery'), '', true );
    wp_enqueue_script( 'ui', get_template_directory_uri(). '/js/jquery-ui.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'popper', get_template_directory_uri(). '/js/popper.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri(). '/js/bootstrap.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'colors', get_template_directory_uri(). '/js/colors.js', array(''), true );
    wp_enqueue_script( 'slicknav', get_template_directory_uri(). '/js/slicknav.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'owl_carousel', get_template_directory_uri(). '/js/owl-carousel.js', array('jquery'), '', true );
    wp_enqueue_script( 'waypoints', get_template_directory_uri(). '/js/waypoints.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'finalcountdown', get_template_directory_uri(). '/js/finalcountdown.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'nicesellect', get_template_directory_uri(). '/js/nicesellect.js', array('jquery'), '', true );
    wp_enqueue_script( 'flex_slider', get_template_directory_uri(). '/js/flex-slider.js', array('jquery'), '', true );
    wp_enqueue_script( 'magnific_popup', get_template_directory_uri(). '/js/scrollup.js', array('jquery'), '', true );
    wp_enqueue_script( 'onepage', get_template_directory_uri(). '/js/onepage-nav.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'easing', get_template_directory_uri(). '/js/easing.js', array('jquery'), '', true );
    wp_enqueue_script( 'active', get_template_directory_uri(). '/js/active.js', array('jquery'), '', true );

}
add_action( 'wp_enqueue_scripts', 'load_scripts' );
/*********** Disable Gutenberg ************/
add_filter('use_block_editor_for_post', '__return_false', 10);
/*********** Disable Gutenberg ************/
function floxia_custom_menu(){
    
    register_nav_menu('main_menu', __('Main Menu','floxia_custom_menu'));
    register_nav_menu('category_menu', __('Category Menu','floxia_custom_menu'));
    register_nav_menu('search_category_menu', __('Search Category Menu','floxia_custom_menu'));
    
    
}
add_action('init','floxia_custom_menu');

/************** Theme Supports *******************/
add_theme_support( 'title-tag' );
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );   
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

/**
* Apply a coupon for minimum cart total
*/

add_action( 'woocommerce_before_cart' , 'add_coupon_notice' );
add_action( 'woocommerce_before_checkout_form' , 'add_coupon_notice' );

function add_coupon_notice() {

        $cart_total = WC()->cart->get_subtotal();
        $currency_code = get_woocommerce_currency();
        wc_clear_notices();

       if ( $cart_total < $minimum_amount ) {
              WC()->cart->remove_coupon( 'COUPON' );
              wc_print_notice( "Get 50% off if you spend more than  $currency_code!", 'notice' );
        } else {
              $coupon = WC()->cart->apply_coupon( 'COUPON' );
              wc_print_notice( 'You just got' . $coupon . 'off your order!', 'notice' );
        }
          wc_clear_notices();
}
add_action('woocommerce_before_cart_totals', 'apply_product_on_coupon');
function apply_product_on_coupon() {
    global $woocommerce;

    if ( ! empty( $woocommerce->cart->applied_coupons ) ) {
         $my_coupon = $woocommerce->cart->get_coupons() ;
         foreach($my_coupon as $coupon){

            if ( $post = get_post( $coupon->id ) ) {
                    if ( !empty( $post->post_excerpt ) ) {
                        echo "<span class='coupon-name'><b>".$coupon->code."</b></span>";
                        echo "<p class='coupon-description'>".$post->post_excerpt."</p>";
                    }
            }
        }
    }
}
// Add support for responsive embedded content.
add_theme_support( 'responsive-embeds' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
add_theme_support( 'post-thumbnails' );
        /**************** *********************/
        the_post_thumbnail(); // Without parameter ->; Thumbnail
        the_post_thumbnail( 'thumbnail' ); // Thumbnail (default 150px x 150px max)
        the_post_thumbnail( 'medium' ); // Medium resolution (default 300px x 300px max)
        the_post_thumbnail( 'medium_large' ); // Medium-large resolution (default 768px x no height limit max)
        the_post_thumbnail( 'large' ); // Large resolution (default 1024px x 1024px max)
        the_post_thumbnail( 'full' ); // Original image resolution (unmodified)
        the_post_thumbnail( array( 100, 100 ) ); // Other resolutions (height, width)
        /**************** *********************/

/************** Theme Supports *******************/

/************** Drop Down Menu *******************/
function new_submenu_class($menu) {    
    $menu = preg_replace('/ class="sub-menu"/','/ class="dropdown" /',$menu);        
    return $menu;      
}
add_filter('wp_nav_menu','new_submenu_class'); 


function new_submenu_class1($menu) {    
    $menu = preg_replace('/ menu_id="01"/','/ class="sub-category" /',$menu);
    //return $menu;      
}
add_filter('wp_nav_menu','new_submenu_class'); 

/************** Drop Down Menu *******************/




?>