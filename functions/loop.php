<?php

function loop($limit){
	$i = 0;
	
	$posts = new WP_Query();
  $posts->query('posts_per_page=1&orderby=rand');
  $day_check = '';
	if (have_posts()) {
		while (have_posts()) {
			the_post();
				$day = get_the_date('j');
				if ($day != $day_check) {
			    if ($day_check != '') {
			      echo <<< EOF
</div></div></div>
EOF;
			    }
			  echo <<< EOF
<div class="container"><div class="row"><div class="col-xs-12">
EOF;
			  }
				
			get_template_part('content', get_post_format() );

			$day_check = $day;
			$i++;
		}
		echo <<< EOF
</div></div></div>
EOF;
		// include TDIR . '/nextprev.php';
	} else {
		// get_template_part( 'content', 'none' );
	}
}

?>