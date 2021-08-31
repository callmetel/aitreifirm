<?php
	add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
	function theme_enqueue_styles() {
	  wp_enqueue_style( 'divi', get_template_directory_uri() . '/style.css' );
	  wp_enqueue_style( 'divi-child', get_stylesheet_directory_uri() . '/css/style.css' );
	}

	// Remove Disable jQuery
	function load_custom_scripts() {
	    wp_register_script('custom_script', get_stylesheet_directory_uri() . '/js/scripts.min.js', 'jquery', true); // true will place script in the footer
	    wp_enqueue_script( 'custom_script' );
	}

	// Add function to check if on edit page in admin
	function is_edit_page($new_edit = null){
	    global $pagenow;
	    //make sure we are on the backend
	    if (!is_admin()) return false;


	    if($new_edit == "edit")
	        return in_array( $pagenow, array( 'post.php',  ) );
	    elseif($new_edit == "new") //check for new post page
	        return in_array( $pagenow, array( 'post-new.php' ) );
	    else //check for either new or edit
	        return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
	}

	// Enqueue Scripts on Frontend Only
	if(!is_admin() && !is_edit_page()) {
    add_action('wp_enqueue_scripts', 'load_custom_scripts', 99);
	}

	// Remove Query Strings From Static Resources 
	function _remove_script_version( $src ){ 
	$parts = explode( '?', $src ); 	
	return $parts[0]; 
	} 
	add_filter( 'script_loader_src', '_remove_script_version', 15, 1 ); 
	add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

	// Remove Dashicons
	add_action( 'wp_print_styles', 'my_deregister_styles', 100 );

	function my_deregister_styles()    {
	    if( !is_user_logged_in() ) 
	        wp_deregister_style( 'dashicons'); 
	}

	// Remove Emoji Icons
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');

	// Allow SVG Uploads
	function cc_mime_types($mimes) {
	  $mimes['svg'] = 'image/svg+xml';
	  return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');

	// Add Shortcode Functionality for Menus 
	function print_menu_shortcode($atts, $content = null) {
	    extract(shortcode_atts(array( 'id' => null, 'class' => null, 'name' => null, ), $atts));
	    return wp_nav_menu( array( 'menu_id' => $id, 'menu_class' => $class, 'menu' => $name, 'echo' => false ) );
	}
	add_shortcode('menu', 'print_menu_shortcode');  // add using this shortcode [menu id="custom-id" name="Menu Name"]

	// Removing Default Image Link

	function wpb_imagelink_setup() {
	    $image_set = get_option( 'image_default_link_type' );
	     
	    if ($image_set !== 'none') {
	        update_option('image_default_link_type', 'none');
	    }
	}
	add_action('admin_init', 'wpb_imagelink_setup', 10);

	// Disable support for comments and trackbacks in post types
	function df_disable_comments_post_types_support() {
		$post_types = get_post_types();
		foreach ($post_types as $post_type) {
			if(post_type_supports($post_type, 'comments')) {
				remove_post_type_support($post_type, 'comments');
				remove_post_type_support($post_type, 'trackbacks');
			}
		}
	}
	add_action('admin_init', 'df_disable_comments_post_types_support');
	// Close comments on the front-end
	function df_disable_comments_status() {
		return false;
	}
	add_filter('comments_open', 'df_disable_comments_status', 20, 2);
	add_filter('pings_open', 'df_disable_comments_status', 20, 2);
	// Hide existing comments
	function df_disable_comments_hide_existing_comments($comments) {
		$comments = array();
		return $comments;
	}
	add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);
	// Remove comments page in menu
	function df_disable_comments_admin_menu() {
		remove_menu_page('edit-comments.php');
	}
	add_action('admin_menu', 'df_disable_comments_admin_menu');
	// Redirect any user trying to access comments page
	function df_disable_comments_admin_menu_redirect() {
		global $pagenow;
		if ($pagenow === 'edit-comments.php') {
			wp_redirect(admin_url()); exit;
		}
	}
	add_action('admin_init', 'df_disable_comments_admin_menu_redirect');
	// Remove comments metabox from dashboard
	function df_disable_comments_dashboard() {
		remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
	}
	add_action('admin_init', 'df_disable_comments_dashboard');
	// Remove comments links from admin bar
	function df_disable_comments_admin_bar() {
		if (is_admin_bar_showing()) {
			remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
		}
	}
	add_action('init', 'df_disable_comments_admin_bar');

	// First, make sure Jetpack doesn't concatenate all its CSS
	add_filter( 'jetpack_implode_frontend_css', '__return_false' );
	// Then, remove each CSS file, one at a time
	function remove_jetpack_styles() {
	  wp_deregister_style( 'AtD_style' ); // After the Deadline
	  wp_deregister_style( 'jetpack_likes' ); // Likes
	  wp_deregister_style( 'jetpack_related-posts' ); //Related Posts
	  wp_deregister_style( 'jetpack-carousel' ); // Carousel
	  wp_deregister_style( 'grunion.css' ); // Grunion contact form
	  wp_deregister_style( 'the-neverending-homepage' ); // Infinite Scroll
	  wp_deregister_style( 'infinity-twentyten' ); // Infinite Scroll - Twentyten Theme
	  wp_deregister_style( 'infinity-twentyeleven' ); // Infinite Scroll - Twentyeleven Theme
	  wp_deregister_style( 'infinity-twentytwelve' ); // Infinite Scroll - Twentytwelve Theme
	  wp_deregister_style( 'noticons' ); // Notes
	  wp_deregister_style( 'post-by-email' ); // Post by Email
	  wp_deregister_style( 'publicize' ); // Publicize
	  wp_deregister_style( 'sharedaddy' ); // Sharedaddy
	  wp_deregister_style( 'sharing' ); // Sharedaddy Sharing
	  wp_deregister_style( 'stats_reports_css' ); // Stats
	  wp_deregister_style( 'jetpack-widgets' ); // Widgets
	  wp_deregister_style( 'jetpack-slideshow' ); // Slideshows
	  wp_deregister_style( 'presentations' ); // Presentation shortcode
	  wp_deregister_style( 'jetpack-subscriptions' ); // Subscriptions
	  wp_deregister_style( 'tiled-gallery' ); // Tiled Galleries
	  wp_deregister_style( 'widget-conditions' ); // Widget Visibility
	  wp_deregister_style( 'jetpack_display_posts_widget' ); // Display Posts Widget
	  wp_deregister_style( 'gravatar-profile-widget' ); // Gravatar Widget
	  wp_deregister_style( 'widget-grid-and-list' ); // Top Posts widget
	  wp_deregister_style( 'jetpack-widgets' ); // Widgets
	  wp_dequeue_style( 'wp-pagenavi');
	  wp_dequeue_style( 'n10s-hover');
	  wp_dequeue_style( 'wpml-legacy-horizontal-list-0');
	  wp_dequeue_style( 'prefix-font-awesome');
	}
	add_action('wp_print_styles', 'remove_jetpack_styles' );

	define('ICL_DONT_LOAD_NAVIGATION_CSS', true);

	// Add is_blog Functionality
	function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
	}

	// Add a Shortcode for the Date 
	function year_shortcode() {
	  $year = date('Y');
	  return $year;
	}
	add_shortcode('year', 'year_shortcode');

	// Unregister Projects Post Type
	function remove_divi_projects(){
		unregister_post_type( 'project' );
	}
	add_action('init','remove_divi_projects');

	// Move Gravity Forms Scripts to Footer
	add_filter( 'gform_init_scripts_footer', '__return_true' );

	// Remove Specific Menu Items for Shop Managers
	add_action( 'admin_init', 'my_remove_menu_pages' );
	function my_remove_menu_pages() {

		$user = wp_get_current_user();

		if ( in_array( 'shop_manager', (array) $user->roles ) ) {
			remove_menu_page('link-manager.php'); // Links
			remove_menu_page('edit-comments.php'); // Comments
			remove_menu_page('edit.php?post_type=page'); // Pages
			remove_menu_page('plugins.php'); // Plugins
			remove_menu_page('themes.php'); // Appearance
			remove_menu_page('users.php'); // Users
			remove_menu_page('tools.php'); // Tools
			remove_menu_page('options-general.php'); // Settings

			// WooCommerce Links
			remove_submenu_page( 'woocommerce', 'edit.php?post_type=wc_zapier_feed' ); // Zapier Feeds
			remove_submenu_page( 'woocommerce', 'wf_woocommerce_order_im_ex' ); // Order Export/Import
			remove_submenu_page( 'woocommerce', 'wf_coupon_csv_im_ex' ); // Coupon Export/Import
			remove_submenu_page( 'woocommerce', 'wf_woocommerce_subscription_order_im_ex' ); // Subscription Export/Import
			remove_submenu_page( 'woocommerce', 'wf_woocommerce_order_im_ex_xml' ); // Order XML Export/Import
			remove_submenu_page( 'woocommerce', 'checkout_form_designer' ); // Checkout Form
			remove_submenu_page( 'woocommerce', 'wc-addons' ); // Extensions
			remove_submenu_page( 'woocommerce', 'wc-status' ); // Status
			remove_submenu_page( 'woocommerce', 'wc-settings' ); // Settings
	    remove_submenu_page( 'woocommerce', 'wc-credits' ); // Credits
	    remove_submenu_page( 'woocommerce', 'wc-translators' ); // Translators
		}
	}

	// Disable Ajax Call from WooCommerce on front page and posts*/
add_action( 'wp_enqueue_scripts', 'dequeue_woocommerce_cart_fragments', 11);
function dequeue_woocommerce_cart_fragments() {
if (is_front_page() || is_single() ) wp_dequeue_script('wc-cart-fragments');
}

// Disable All WooCommerce  Styles and Scripts Except Shop Pages*/
add_action( 'wp_enqueue_scripts', 'dequeue_woocommerce_styles_scripts', 99 );
function dequeue_woocommerce_styles_scripts() {
	if ( function_exists( 'is_woocommerce' ) ) {
		if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
			# Styles
			wp_dequeue_style( 'woocommerce-general' );
			wp_dequeue_style( 'woocommerce-layout' );
			wp_dequeue_style( 'woocommerce-smallscreen' );
			wp_dequeue_style( 'woocommerce_frontend_styles' );
			wp_dequeue_style( 'woocommerce_fancybox_styles' );
			wp_dequeue_style( 'woocommerce_chosen_styles' );
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
			# Scripts
			wp_dequeue_script( 'wc_price_slider' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-add-to-cart' );
			wp_dequeue_script( 'wc-cart-fragments' );
			wp_dequeue_script( 'wc-checkout' );
			wp_dequeue_script( 'wc-add-to-cart-variation' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-cart' );
			wp_dequeue_script( 'wc-chosen' );
			wp_dequeue_script( 'woocommerce' );
			wp_dequeue_script( 'prettyPhoto' );
			wp_dequeue_script( 'prettyPhoto-init' );
			wp_dequeue_script( 'jquery-blockui' );
			wp_dequeue_script( 'jquery-placeholder' );
			wp_dequeue_script( 'fancybox' );
			wp_dequeue_script( 'jqueryui' );
		}
	}
}
?>