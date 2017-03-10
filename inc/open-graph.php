<?php 
  
  // Open Graph tags for Twitter and Facebook
  
  $siteurl = esc_url( home_url( '/' ) );
  $the_title = wp_title( '|', false, 'right' ) . esc_attr( get_bloginfo( 'name', 'display' ) );
  $sitename = esc_attr( get_bloginfo( 'name', 'display' ) );
  $twitter = 'yondernews';
  
  global $post;
  setup_postdata( $post );
  $postid = get_the_ID();

  if ( is_home() || is_archive() ) {
    $type = 'website';
    $permalink = "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'];
    $description = esc_attr( get_bloginfo( 'description', 'display' ) );
    $the_content = '';
    $keywords = 'Yonder, Andrej Mrevlje, Global Events, World Events';
    $headline = '';
    $thumbnail = '';
  } else {
    $type = 'article';
    $permalink = esc_url( get_permalink($postid) );
    $headline = '<meta property="og:title" content="'.get_the_title().'" />';
    $description = get_the_excerpt();
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
    $thumbnail = '';
    $twitter_thumbnail = '';
    if ( function_exists('has_post_thumbnail') && has_post_thumbnail($postid) ) {
      $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($postid), 'full' );
      if (empty($thumbnail)) {
        $thumbnail = '';
      } else {
        $thumbnail = '<meta property="og:image" content="'.$thumbnail['0'].'" />';
        $twitter_thumbnail = '<meta name="twitter:image" content="'.$thumbnail['0'].'">';
      }
    }
  }


  $yonderlogo = THEME . '/assets/img/yonder-sq-500.png';
  $andrej = THEME . '/assets/img/andrej-2017.jpeg';

  echo <<< EOF

    <meta name="description" content="$description" />
    <meta name="keywords" content="$keywords" />

    <!-- Facbook -->
    <meta property="og:type" content="$type" />
    $headline
    <meta property="og:description" content="$description" />
    <meta property="og:url" content="$permalink" />
    <meta property="og:site_name" content="$sitename" />
    $thumbnail
    <meta property="og:image" content="$yonderlogo" />

    <!-- Twitter -->
    <link rel="me" href="https://twitter.com/$twitter" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@$twitter">
    <meta name="twitter:creator" content="@$twitter">
    <meta name="twitter:title" content="$sitename">
    <meta name="twitter:description" content="$description">
    $twitter_thumbnail
    
EOF;
