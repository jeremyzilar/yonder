
  <section id="footer">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
          <?php $curYear = date('Y'); ?>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
          <p class="datespan"><?php echo $curYear; ?></p>
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

</body>
</html>