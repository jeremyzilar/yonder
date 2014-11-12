<?php

function loop($limit){
	$i = 0;
	
	$posts = new WP_Query();
  $posts->query('posts_per_page=1&orderby=rand');

	if (have_posts()) {
		while (have_posts()) {
			the_post();
				get_template_part('content', get_post_format() );
			?>
		<?php
		$i++;
		}
		// include TDIR . '/nextprev.php';
	} else {
		// get_template_part( 'content', 'none' );
	}
}

?>
