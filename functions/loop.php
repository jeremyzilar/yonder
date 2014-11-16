<?php

function loop(){
	$i = 0;
	$start = <<< EOF
<div class="container">
	<div class="row">
		<div class="col-xs-12">
EOF;
	$end = <<< EOF
		</div>
	</div>
</div>
EOF;
  $day_check = '';
	if (have_posts()) {
		while (have_posts()) {
			the_post();
				$day = get_the_date('j');
				if ($day != $day_check) {
			    if ($day_check != '') {
			      echo $end;
			    }

			  echo $start;
			  }
				
			get_template_part('content', get_post_format());

			$day_check = $day;
			$i++;
		}
		$id = get_the_ID();
		loop_day($id);
		echo $end;
		// loop_day();
		// include TDIR . '/nextprev.php';
	} else {
		// get_template_part( 'content', 'none' );
	}
}


function loop_day($id){
	$i = 0;
	$args = array(
		'post__not_in' => array($id),
		'date_query' => array(
			array(
				'year'  => 2014,
				'month' => 11,
				'day'   => 14,
			),
		),
	);
	// The Query
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			get_template_part('content', get_post_format());
		}
	} else {
		// no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();
	
}

?>