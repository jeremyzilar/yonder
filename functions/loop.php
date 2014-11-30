<?php

// This loop is designed to wrap all the posts that occur in one day in specific markup.
function loop(){
	global $wp_query;
	$i = 0;
	$start = <<< EOF
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-10">
EOF;
	$end = <<< EOF
		</div>
	</div>
</div>
EOF;
	$day_check = '';
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); 

			$day = get_the_date('j');
			if ($day != $day_check) {
		    if ($day_check != '') {
		      echo $end;
		    }
			  echo $start;

			  // Insert Home Link
			  homelink($i);

			  // Insert Tag Name
			  archive_top($i);
		  }

		  // Article Template
			get_template_part('content', get_post_format());

			// Post pages show other posts posted on the same day
			if (is_single()) {
				$id = get_the_ID();
				$year  = get_the_time('Y'); 
				$month = get_the_time('m'); 
				$day   = get_the_time('d');
				loop_day($id, $year, $month, $day);
			}

			// The final ending block for the loop
			$i++;
			if ($i == $wp_query->post_count) {
				echo $end;
			}

			// Set the $day_check variable for the next iteration of the loop
			$day_check = $day;
			
		}
	}
}


function loop_day($id, $year, $month, $day){
	$i = 0;
	$args = array(
		'post__not_in' => array($id),
		'date_query' => array(
			array(
				'year'  => $year,
				'month' => $month,
				'day'   => $day,
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

function homelink($i){
	if (!$i==0) {
  	return;
  }
  if (!is_home()) {
  	echo '<h5 class="home-link"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).' Home"><i class="fa fa-arrow-left"></i> Home</a></h5>';
  }
}

function archive_top($i){
	if (!$i==0) {
		return;
	}
	if (is_tag() && $i==0) {
  	echo '<h4 class="archive-title"><i class="fa fa-tag"></i> ' . single_tag_title('', false) . '</h4>';
  } else if (is_category()) {
  	echo '<h4 class="archive-title"><i class="fa fa-tag"></i> ' . single_category_title('', false) . '</h4>';
  }
}


?>