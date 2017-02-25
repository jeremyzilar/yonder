<?php

function scripts_styles() {
	global $wp_styles;
	$q = 'v126';
	
	// Le JS
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('moment-js', get_template_directory_uri() . '/js/moment.min.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('andrej', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), $q, true );

	// Le CSS
	wp_enqueue_style( 'yonder-styles', get_template_directory_uri() . '/assets/css/main.min.css',array(), $q);
	wp_enqueue_style( 'andrej', get_stylesheet_uri(),array(), $q);
}
add_action( 'wp_enqueue_scripts', 'scripts_styles' );

// function load_admin_style() {
//   $v = date('d');
//   wp_enqueue_script( 'admin_js', get_template_directory_uri() . '/assets/js/admin.js', array( 'jquery' ), $v, 'all' );
//   wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/assets/css/admin.css', false, $v, 'all' );
// }
// add_action( 'admin_enqueue_scripts', 'load_admin_style' );


function andrej_media_popup_init() {
  $v = date('d');
  wp_enqueue_script( 'admin-media', get_template_directory_uri() . '/js/media.js', array( 'media-editor' ), $v, 'all');
}
add_action( 'load-post.php', 'andrej_media_popup_init' );
add_action( 'load-post-new.php', 'andrej_media_popup_init' );

// First, make sure Jetpack doesn't concatenate all its CSS
add_filter( 'jetpack_implode_frontend_css', '__return_false' );

// Then, remove each CSS file, one at a time
function jeherve_remove_all_jp_css() {
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
  wp_deregister_script('wp-mediaelement');
	wp_deregister_style('wp-mediaelement');
}
add_action('wp_print_styles', 'jeherve_remove_all_jp_css' );

add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

add_filter( 'jetpack_enable_open_graph', '__return_false' );