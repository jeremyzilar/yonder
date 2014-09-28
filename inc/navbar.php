<nav class="navbar navbar-default" role="navigation">
  <div class="container">
	  <div class="row">
    	<?php
				$args = array(
					'theme_location'  => 'main',
					'menu'            => 'main',
					'menu_class'      => 'nav navbar-nav',
					'menu_id'         => '',
					'container'       => 'div',
					'container_class' => 'nav-wrap col-xs-12 col-sm-8 col-sm-offset-2',
					'container_id'    => '',
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
  </div><!-- /.container-fluid -->
</nav>