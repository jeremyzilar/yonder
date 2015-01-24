  <!-- Mission Box -->
  <?php include(INC . '/mission-box.php'); ?>
  
  <section id="footer">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
          <?php $curYear = date('Y'); ?>
          <p class="flag"><i class="fa fa-flag"></i></p>
          <p class="title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a></p>
          <p class="datespan"><i class="fa fa-copyright"></i> <?php echo $curYear; ?></p>
          <p class="colophon">Site by <a href="http://jeremyzilar.com/">Jeremy Zilar</a></p>
        </div>
      </div>
      <div class="row hidden">
        <?php
            $args = array(
              'theme_location'  => 'footer-menu',
              'menu'            => '',
              'container'       => 'div',
              'container_class' => 'col-xs-12',
              'container_id'    => '',
              'menu_class'      => '',
              'menu_id'         => '',
              'echo'            => true,
              'before'          => '',
              'after'           => '',
              'link_before'     => '',
              'link_after'      => '',
              'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
            );
            wp_nav_menu( $args );
          ?>
      </div>
    </div>
  </section>
  
  <?php wp_footer(); ?>

<!-- Twitter -->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

</body>
</html>