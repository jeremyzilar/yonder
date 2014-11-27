<section id="head">
	<div class="row blue"></div>

  <div class="container">
    <div class="row">
      <div class="col-xs-12">
      	<img src="<?php echo THEME . '/img/globe4.png'; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="img-responsive logo" />
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">Yonder</a></h1>
        <h3>A weekly newsletter on the news from <a href="https://twitter.com/andrejmrevlje" title="Follow Andrej Mrevlje on Twitter">Andrej Mrevlje</a>, <span>deivered every Sunday.</span></h3>
      </div>
    </div>

    <!-- Newsletter Promo -->
    <?php include(INC . '/newsletter-promo.php'); ?>

    <div id="social" class="row">
    	<div class="col-xs-12">
    		<a href="http://twitter.com/andrejmrevlje" title="Follow Andrej Mrevlje on Twitter"><i class="fa fa-twitter"></i></a>
    		<a href="http://facebook.com/" title="Subscribe to Yonder from Andrej Mrevlje on Facebook"><i class="fa fa-facebook"></i></a>
    	</div>
    </div>

  </div>

</section>