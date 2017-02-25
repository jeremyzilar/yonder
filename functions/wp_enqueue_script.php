<?php

function scripts_styles() {
	global $wp_styles;
	$q = 'v126';
	
	// Le JS
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('moment-js', get_template_directory_uri() . '/js/moment.min.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('andrej', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), $q, true );

	// Le CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/main.min.css',array(), $q);
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

?>
