<?php
/**
 * Various theme functionalities.
 *
 * @package Yamaha
 */

/**
 * MENUS
 */
function _custom_theme_register_menu() {
	register_nav_menus(
		array(
			'menu-main'   => __( 'Main menu' ),
			'menu-footer' => __( 'Footer menu' ),
		)
	);
}
add_action( 'init', '_custom_theme_register_menu' );

/**
 * SETUP
 */
function custom_setup() {
	// Images.
	add_theme_support( 'post-thumbnails' );

	// Custom logo.
	add_theme_support( 'custom-logo' );

	// Title tags.
	add_theme_support( 'title-tag' );

	// Excerpt.		
	add_post_type_support( 'page', 'excerpt' );

	// Languages.
	load_theme_textdomain( 'yamaha', get_template_directory() . '/languages' );

	// HTML 5 - Example : deletes type="*" in scripts and style tags.
	add_theme_support( 'html5', array( 'script', 'style' ) );

	// Remove useless WP image sizes.
	remove_image_size( '1536x1536' );
	remove_image_size( '2048x2048' );
}
add_action( 'after_setup_theme', 'custom_setup' );


/**
 * Remove default image sizes to avoid overcharging server - comment line if you need size.
 *
 * @param sizes $sizes to remove.
 */
function remove_default_image_sizes( $sizes ) {
	#unset( $sizes['medium'] );
	unset( $sizes['large'] );
	#unset( $sizes['medium_large'] );
	return $sizes;
}
add_filter( 'intermediate_image_sizes_advanced', 'remove_default_image_sizes' );

// disabling big image sizes scaled.
// add_filter( 'big_image_size_threshold', '__return_false' );
function custom_big_image_size_threshold($threshold) {
    return 1920; 
}
add_filter('big_image_size_threshold', 'custom_big_image_size_threshold');



// Remove WP Emoji.
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wp_generator' );

/**
 * Delete wp-embed.js from footer.
 */

function my_deregister_scripts() {
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

/**
 * Add SVG to allowed file uploads.
 *
 * @param $mime_types $mime_types allowed types.
 */
function add_file_types_to_uploads( $mime_types ) {
	$mime_types['svg'] = 'image/svg+xml';
	return $mime_types;
}
add_action( 'upload_mimes', 'add_file_types_to_uploads', 1, 1 );

/**
 * Disable update emails.
 */
add_filter( 'auto_plugin_update_send_email', '__return_false' );
add_filter( 'auto_theme_update_send_email', '__return_false' );

/**
 * Completely remove comments
 */
add_action(
	'admin_init',
	function () {
		// Redirect any user trying to access comments page.
		global $pagenow;

		if ( 'edit-comments.php' === $pagenow ) {
			wp_safe_redirect( admin_url() );
			exit;
		}

		// Remove comments metabox from dashboard.
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );

		// Disable support for comments and trackbacks in post types.
		foreach ( get_post_types() as $post_type ) {
			if ( post_type_supports( $post_type, 'comments' ) ) {
				remove_post_type_support( $post_type, 'comments' );
				remove_post_type_support( $post_type, 'trackbacks' );
			}
		}
	}
);

// Close comments on the front-end.
add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );

// Hide existing comments.
add_filter( 'comments_array', '__return_empty_array', 10, 2 );

// Remove comments page in menu.
add_action(
	'admin_menu',
	function () {
		remove_menu_page( 'edit-comments.php' );
	}
);

// Remove comments links from admin bar.
add_action(
	'init',
	function () {
		if ( is_admin_bar_showing() ) {
			remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
		}
	}
);

function enqueue_theme_basics() {
    // Enqueue Fancybox JavaScript
    wp_enqueue_script('fancybox-js', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array(), false, true);

    // Enqueue Fancybox CSS
    wp_enqueue_style('fancybox-css', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css');

	// Enqueue Autocomplete for search function
	wp_enqueue_script( 'autocomplete', get_template_directory_uri() . '/node_modules/autocomplete.js/dist/autocomplete.jquery.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );

	  // Enqueue Slick CSS (Core and Theme)
	  wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
	  wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
	  
	  // Enqueue Slick JS
	  wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), false, true);
	
}
add_action('wp_enqueue_scripts', 'enqueue_theme_basics');



if ( ! function_exists( 'var_dumpl' ) ) {
	/**
	 * Outputs formatted dump for better legiblity
	 */
	function var_dumpl() {
		if ( isset( $_SERVER['REMOTE_ADDR'] ) ) {
			if ( '89.212.119.6' === $_SERVER['REMOTE_ADDR'] ||true ) {
				$args = func_get_args();
				foreach ( $args as $a ) {
					echo '<pre class="dump">';
					array_map( 'var_dump', $args );
					echo '</pre>';
				}
			}
		}
	}
}

if ( ! function_exists( 'lvar_dump' ) ) {
    /**
     * Alias for var_dumpl()
     */
    function lvar_dump() {
        call_user_func_array( 'var_dumpl', func_get_args() );
    }
}