	<?php
		$args = array(
			'theme_location'  => 'main-menu',
			'menu'            => 'main',
			'menu_class'      => 'navbar',
			'menu_id'         => '',
			'container'       => 'div',
			'container_class' => 'nav-wrap col-xs-12',
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
