<?php
	add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
	function theme_enqueue_styles() {
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
	// add_filter( 'script_loader_src', '_remove_script_version', 15, 1 ); 
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

	// Remove Specific Menu Items for Site Managers
	add_action( 'admin_init', 'my_remove_menu_pages' );
	function my_remove_menu_pages() {

		$user = wp_get_current_user();

		if ( in_array( 'site_manager', (array) $user->roles ) ) {
			remove_menu_page('link-manager.php'); // Links
			remove_menu_page('edit-comments.php'); // Comments
			remove_menu_page('themes.php'); // Appearance
			remove_menu_page('tools.php'); // Tools
			remove_menu_page('options-general.php'); // Settings
			remove_menu_page('wp-defender'); // Defender
			remove_menu_page('litespeed'); // Litespeed Cache
			remove_menu_page('aioseo'); // All In One SEO
			remove_submenu_page( 'gf_edit_forms', 'gf_new_formf_help' );
			remove_submenu_page( 'gf_edit_forms', 'gf_export' );
			remove_submenu_page( 'gf_edit_forms', 'gf_help' );
		}
	}

// Add Global Options for ACF Field
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        acf_add_options_page(array(
            'page_title'    => __('Theme General Settings'),
            'menu_title'    => __('Theme Settings'),
            'menu_slug'     => 'theme-general-settings',
            'redirect'      => true,
            'icon_url' 			=> 'dashicons-feedback'
        ));

        // Header Settings
        acf_add_options_page(array(
            'page_title'  => __('Header Settings'),
            'menu_title'  => __('Header Settings'),
            'parent_slug' => 'theme-general-settings',
            'autoload'			=> true,
        ));

        // Global Sections Settings
        acf_add_options_page(array(
            'page_title'  => __('Global Sections Settings'),
            'menu_title'  => __('Global Sections Settings'),
            'parent_slug' => 'theme-general-settings',
            'autoload'			=> true,
        ));

        // Prefooter Settings
        acf_add_options_page(array(
            'page_title'  => __('Prefooter Settings'),
            'menu_title'  => __('Prefooter Settings'),
            'parent_slug' => 'theme-general-settings',
            'autoload'			=> true,
        ));

        // Footer Settings
        acf_add_options_page(array(
            'page_title'  => __('Footer Settings'),
            'menu_title'  => __('Footer Settings'),
            'parent_slug' => 'theme-general-settings',
            'autoload'			=> true,
        ));
    }
}

function my_login_stylesheet() {
    wp_enqueue_script( 'custom-login', '/login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

// Update CSS within in Admin
function admin_style() {
  wp_enqueue_style('admin-styles', get_stylesheet_directory_uri().'/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

// Show Admin Menu Pages 
// if (!function_exists('debug_admin_menus')):
// function debug_admin_menus() {
// if ( !is_admin())
//         return;
//     global $submenu, $menu, $pagenow;
//     if ( current_user_can('manage_options') ) { // ONLY DO THIS FOR ADMIN
//         if( $pagenow == 'index.php' ) {  // PRINTS ON DASHBOARD
//             echo '<pre>'; print_r( $menu ); echo '</pre>'; // TOP LEVEL MENUS
//             echo '<pre>'; print_r( $submenu ); echo '</pre>'; // SUBMENUS
//         }
//     }
// }
// add_action( 'admin_notices', 'debug_admin_menus' );
// endif;
?>