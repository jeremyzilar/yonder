<section id="head">
  <div class="container">
  
    <div class="row">
      <div class="col-xs-12 col-sm-5 col-md-4">
        <div class="globe-logo">
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo THEME . '/assets/img/yonder-main.png'; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="img-responsive logo" /></a></h1>
            <?php if (!is_archive() && !is_search() && !is_page_template( 'search.php' )) { ?>
              <h3>Connecting global events into</br> a new narrative. <span>by Andrej Mrevlje</span></h3>
            <?php } ?>
            
        </div>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-5">
        <?php include(INC . '/navbar.php'); ?>
        <?php if (!is_archive() && !is_search()){ ?>
        <div class="yonder-newsletter-box">
          <?php include(INC . '/newsletter-promo.php'); ?>
        </div>
        <?php }?>
      </div>
    </div>
    
  </div>
</section>