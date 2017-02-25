<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <?php if ( is_home() ) { ?>
    <title>Yonder — Global News &amp; Commentary<?php wp_title( '|', true, 'right' ); ?></title>
    <?php } else { ?>
    <title><?php wp_title( '|', true, 'right' ); ?>Yonder — Global News &amp; Commentary</title>
    <?php } ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />

    <!-- Open Graph Tags -->
    <?php include INC . 'open-graph.php'; ?>
    
    <link rel="profile" href="http://gmpg.org/xfn/11" />
  	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Typekit -->
    <script src="https://use.typekit.net/uhe5gkd.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

    <!-- Fonts: Lato / http://www.latofonts.com/ -->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>


    <!-- RSS -->
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />

    <?php wp_head(); ?>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body <?php body_class(); ?>>

    <!-- Header -->
    <?php
      include(INC . '/head.php');
      if ( is_user_logged_in() ) {
        include_once(INC . '/editor-tools.php');
      }
      
    ?>
