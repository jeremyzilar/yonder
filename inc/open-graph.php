<?php 
// Open Graph tags for Twitter and Facebook
  
  $siteurl = esc_url( home_url( '/' ) );
  $the_title = wp_title( '|', false, 'right' ) . esc_attr( get_bloginfo( 'name', 'display' ) );
  $sitename = esc_attr( get_bloginfo( 'name', 'display' ) );
  $twitter = 'yondernews';

  if ( is_home() || is_archive() ) {
    $type = 'website';
    $permalink = "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'];
    $description = esc_attr( get_bloginfo( 'description', 'display' ) );
    $the_content = '';
  } else {
    $type = 'article';
    $permalink = esc_url( get_permalink($post->ID) );
    $description = get_the_excerpt();
    $the_content = get_the_content();
  }

  $thumbnail = '';
  if ( function_exists('has_post_thumbnail') && has_post_thumbnail($post->ID) ) {
    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
    if (empty($thumbnail)) {
      $thumbnail = '';
    } else {
      $thumbnail = '<meta property="og:image" content="'.$thumbnail['0'].'" />';
    }
  }

  $icon = THEME . '/img/yonder-logo.png';
  $logo = THEME . '/img/andrej_1000.png';


  echo <<< EOF

    <!-- Facbook 1 -->
    <meta property="og:type" content="$type" />
    <meta property="og:title" content="$the_title" />
    <meta property="og:description" content="$description" />
    <meta property="og:url" content="$permalink" />
    <meta property="og:site_name" content="$sitename" />
    $thumbnail
    <meta property="og:image" content="$logo" />
    <meta property="og:image" content="$icon" />

    <!-- Twitter 1 -->
    <link rel="me" href="https://twitter.com/$twitter" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@$twitter">
    <meta name="twitter:creator" content="@$twitter">
    <meta name="twitter:title" content="$sitename">
    <meta name="twitter:description" content="$description">
    
EOF;


