<?php

// This loop is designed to wrap all the posts that occur in one day in specific markup.
function loop(){
	if ( have_posts() ) {
	  while ( have_posts() ) {
	    the_post();
	    if (is_archive() ){
	    	get_template_part('content', 'archive');
	    } else if (is_search()){
	    	get_template_part('content', 'archive');
	    } else {
				get_template_part('content', '');
	    }
	  } // end while
	} // end if
}