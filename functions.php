<?php

ini_set( 'upload_max_size' , '64M' );
ini_set( 'post_max_size', '64M');
ini_set( 'max_execution_time', '300' );

include_once 'functions/wp_enqueue_script.php';
include_once 'functions/loop.php';
include_once 'functions/kicker.php';
include_once 'functions/related-link.php';



// Variables
$tdir = get_template_directory_uri();
define('TDIR', $tdir);

$theme = get_template_directory_uri();
define('THEME', $theme);

$root = get_template_directory();
define('ROOT', $root);

// Includes Path
$inc = $root . '/inc/';
define('INC', $inc);



function yonder_setcookie() {
  // setcookie( 'yonder_newvisitor', 'my-value', time() + 3600, COOKIEPATH, COOKIE_DOMAIN );
  $expires = time() + 10 ;
	setcookie('yonder_newvisitor', '', $expires, '/');
}
add_action( 'init', 'yonder_setcookie' );


function yonder_getcookie() {
   $yonder_newvisitor = isset( $_COOKIE['yonder_newvisitor'] ) ? $_COOKIE['yonder_newvisitor'] : '';
   return $yonder_newvisitor;
}
add_action( 'wp_head', 'yonder_getcookie' );
$newvisitor = yonder_getcookie();


// The Common Grid — used in multiple places
// $grid = 'entry-box col-lg-10 col-md-8 col-sm-9 col-md-offset-1 col-sm-offset-1';
$grid = 'entry-box col-xs-12 col-sm-8 col-sm-offset-2';
define('GRID', $grid);


// Hide WP Admin Bar
add_filter('show_admin_bar', '__return_false');


// WP Theme Supports
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image',  'video', 'audio', 'chat', 'status', 'quote', 'link') );
add_theme_support( 'infinite-scroll', array(
	'type'			 		 => 'click',
	'container' 		 => 'blog',
	'render'  		 	 => 'loop',
	'footer' => 'page'
) );


// Adds Post Thumnails
add_theme_support( 'post-thumbnails' );



// Register a Menu
function andrej_register_menu() {
  register_nav_menu('main-menu',__( 'Main Menu' ));
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'andrej_register_menu' );


// Nav Menu
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
	if( in_array('current-menu-item', $classes) ){
		$classes[] = 'active ';
	}
	return $classes;
}









if (!is_admin()) {
	// If Logged In, Add DRAFTS to Query
	if ( is_user_logged_in() ) {
		add_action( 'pre_get_posts', 'add_my_post_status_to_query' );
		function add_my_post_status_to_query( $query ) {
			if ( is_home() && $query->is_main_query() || is_feed())
				$query->set(
					'post_status', array('publish', 'pending', 'draft', 'future', 'private', 'inherit')
				);
			return $query;
		}
	}
}

function date_marker(){
	// Date Marker
	$post_date = the_date('l F j, Y', '', '', FALSE); // returns the_date
	$year  = get_the_time('Y'); 
	$month = get_the_time('m'); 
	$day   = get_the_time('d');
	$archiveurl = get_day_link( $year, $month, $day );
	if (!empty($post_date) && !is_page()) {
		echo '<div class="date-hed"><h5><a href="'.$archiveurl.'"><i class="fa fa-globe"></i> '.$post_date.'</a></h5></div>';
	}
}



function andrej_get_link_url() {
	$has_url = get_the_post_format_url();
	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}



// Related
function get_related(){
  $newsletter = get_post_meta( get_the_ID(), 'related_link_newsletter', true );
  $source = get_post_meta( get_the_ID(), 'related_link_source', true );
  $url = get_post_meta( get_the_ID(), 'related_link_url', true );
	$related = '<p class="via"><img src="http://www.google.com/s2/favicons?domain='.$url.'"/><a href="'.$url.'" title="'.$source.'"><strong>'.$source.'</strong> '.substr($url,0,35).'...';$url.'</a></p>';

	if (!empty($url)) {
		return $related;
	}
}

function andrej_share_buttons() {
	$twitter = '<a title="'.get_the_title().'" href="http://twitter.com/share?url='.get_permalink().'&text='.get_the_title().'"><i class="fa fa-twitter"></i></a>';
	$facebook = '<a href="http://www.facebook.com/sharer.php?u='.get_permalink().'" title="Subscribe to Yonder from Andrej Mrevlje on Facebook"><i class="fa fa-facebook"></i></a>';
	echo '<div class="share-buttons">' . $twitter . ' ' . $facebook . '</div>';
}


// Entry Meta
function andrej_entry_meta($id) {
	$tag_list = get_the_tag_list('', ', ', '');
	if ( $tag_list ) {
		echo ' <div class="tags-list">' . $tag_list . '</div>';
	}

  $author = get_the_author();
  $author_user = get_the_author_meta( 'user_login' );
  $author_link = get_author_posts_url(get_the_author_meta( 'ID' ));

  andrej_share_buttons();

	echo '<span class="author_img"><img class="hidden" src="'.TDIR.'/img/'.$author_user.'.png" alt="'.$author.'"> By '.$author.' | ';

	andrej_entry_date();

	if ( is_user_logged_in() ) {
		$edit = get_edit_post_link($id);
		echo ' | <a href="'.$edit.'" class="btn-edit"><i class="fa fa-pencil"></i> edit</a>';
	}
}

// CATEGORY
function andrej_category(){
  if (!is_category()) {
    foreach((get_the_category()) as $category) {
      if ($category->cat_name !== 'Uncategorized') {
        echo ' <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> ';
      }
    }
  }
}

// DATE
if ( ! function_exists( 'andrej_entry_date' ) ) :
function andrej_entry_date( $echo = true ) {
  $date = '<a class="date" href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'" rel="bookmark"><time class="dt-published published entry-date rel_time" datetime="'.get_the_date('c').'"><span>'.get_the_time('F j, Y g:i a').'</span></time></a>';
  echo $date;
  return $date;
}
endif;



// The Excerpt

function entry_excerpt(){
  $e = get_the_excerpt() . ' <p><a class="more" href="'. get_permalink( get_the_ID() ) . '">Read&nbsp;More&nbsp;»</a></p>';
  echo $e;
}

function new_excerpt_more( $more ) {
	return '';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );


function custom_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function get_newsletter_link(){
  $newsletter_id = get_cat_ID( 'Newsletter' );
  $newsletter_link = get_category_link( $newsletter_id );
  return $newsletter_link;
}

