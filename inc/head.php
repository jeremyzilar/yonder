<section id="head">
  <div class="container">
  
    <div class="row">
      <div class="col-xs-12">
      	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo THEME . '/img/globe4.png'; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="img-responsive logo" /></a>
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a></h1>
        <h3>Connecting global events into a new narrative. <span>By <a href="<?php echo esc_url( home_url( '/' ) ); ?>about/" title="More about Andrej Mrevlje and Yonder">Andrej Mrevlje</a>.</span></h3>
      </div>
    </div>

    <!-- Newsletter Promo -->
    <?php include(INC . '/newsletter-promo.php'); ?>

    <!-- Social Promo -->
    <?php include(INC . '/social.php'); ?>

  </div>

</section>