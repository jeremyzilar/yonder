<section id="head">
	<div class="row blue"></div>

  <div class="container">
    <div class="row">
      <div class="col-xs-12">
      	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo THEME . '/img/globe4.png'; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="img-responsive logo" /></a>
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a></h1>
        <h3>A weekly newsletter on the news from <a href="https://twitter.com/andrejmrevlje" title="Follow Andrej Mrevlje on Twitter">Andrej Mrevlje</a>, <span>delivered every Sunday.</span></h3>
        <h3 class="hidden">A review of the week's news, <span>from <a href="https://twitter.com/andrejmrevlje" title="Follow Andrej Mrevlje on Twitter">Andrej Mrevlje</a>.</span></h3>
        <h3 class="hidden">The the week's news from here to there, <span>from <a href="https://twitter.com/andrejmrevlje" title="Follow Andrej Mrevlje on Twitter">Andrej Mrevlje</a>.</span></h3>
      </div>
    </div>

    <!-- Newsletter Promo -->
    <?php include(INC . '/newsletter-promo.php'); ?>

    <!-- Social Promo -->
    <?php include(INC . '/social.php'); ?>

    <div class="row">
      <div class="col-xs-12">
        <h3>Coming soon!</h3>
      </div>
    </div>

  </div>

</section>