<?php 
  
  // Open Graph tags for Twitter and Facebook
  
  $siteurl = esc_url( home_url( '/' ) );
  $the_title = wp_title( '|', false, 'right' ) . esc_attr( get_bloginfo( 'name', 'display' ) );
  $sitename = esc_attr( get_bloginfo( 'name', 'display' ) );
  $twitter = 'yondernews';
  

  setup_postdata( $post );

  if ( is_home() || is_archive() ) {
    $type = 'website';
    $permalink = "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'];
    $description = esc_attr( get_bloginfo( 'description', 'display' ) );
    $the_content = '';
    $keywords = 'Yonder, Andrej Mrevlje, Global Events, World Events';
  } else {
    $type = 'article';
    $permalink = esc_url( get_permalink($post->ID) );
    $description = get_the_excerpt();
    $the_content = get_the_content();
    $keywords = '';
    $posttags = get_the_tags();
    if ($posttags) {
      foreach($posttags as $tag) {
        $keywords .= $tag->name . ', ';
      }
      $keywords .= 'Yonder, Andrej Mrevlje, Global Events';
    } else {
      $keywords = 'Yonder, Andrej Mrevlje, Global Events, World Events';
    }
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

  $yonderlogo = THEME . '/img/yonder-sq-250.png';
  $andrej = THEME . '/img/andrej-sq-250.png';


  echo <<< EOF

    <meta name="description" content="$description" />
    <meta name="keywords" content="$keywords" />

    <!-- Twitter -->
    <link rel="me" href="https://twitter.com/$twitter" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@$twitter">
    <meta name="twitter:creator" content="@$twitter">
    <meta name="twitter:title" content="$sitename">
    <meta name="twitter:description" content="$description">
    
EOF;


