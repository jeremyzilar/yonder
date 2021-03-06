<?php

add_action( 'add_meta_boxes', 'related_link_add' );
function related_link_add() {
	add_meta_box( 'related-link-id', 'Related Link', 'related_link', 'post', 'normal', 'high' );
}

function related_link( $post ){
	$values = get_post_custom( $post->ID );
	$source = isset( $values['related_link_source'] ) ? esc_attr( $values['related_link_source'][0] ) : '';
	$newsletter = isset( $values['related_link_newsletter'] ) ? esc_attr( $values['related_link_newsletter'][0] ) : '';
	$url = isset( $values['related_link_url'] ) ? esc_attr( $values['related_link_url'][0] ) : '';
	$check = isset( $values['show_on_homepage'] ) ? esc_attr( $values['show_on_homepage'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>

	<style type="text/css" media="screen">
	  #related_links_box{}
	  #related_links_box label,
	  #related_links_box input,
	  #related_links_box small{}
	  #related_links_box label{
	    padding:0 2px;
	  }
    #related_link_source{
      width:30%;
    }
    #related_link_url{
      width:100%;
    }
    #related_links_box small{
      padding:0 3px;
      color:#999;
    }
	</style>

	<div id="related_links_box">
		<p>
  		<input type="checkbox" name="show_on_homepage" id="show_on_homepage" <?php checked( $check, 'on' ); ?> />
  		<label for="show_on_homepage">Show on Homepage</label>
  	</p>

    <p>
  		<label for="related_link_source">Source</label><br />
  		<input type="text" name="related_link_source" id="related_link_source" value="<?php echo $source; ?>" /><br />
  		<small>nytimes.com</small>
  	</p>

  	<p>
  		<label for="related_link_newsletter">Source</label><br />
  		<input type="text" name="related_link_newsletter" id="related_link_newsletter" value="<?php echo $newsletter; ?>" /><br />
  		<small>newsletter</small>
  	</p>

  	<p>
  		<label for="related_link_url">URL</label><br />
  		<input type="text" name="related_link_url" id="related_link_url" value="<?php echo $url; ?>" /><br />
  		<small>e.g. http://nytimes.com/<?php echo date('Y'); ?>/<?php echo date('m'); ?>/<?php echo date('d'); ?>/the-future-is-bright</small>
  	</p>

	</div><!-- #related_links_box -->
	<?php	
}


add_action( 'edit_post', 'cd_meta_box_save' );
function cd_meta_box_save( $post_id ){
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	
	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	
	// if our current user can't edit this post, bail
	if (!current_user_can('edit_post', $post_id) ) {
		return;
	}

	// now we can actually save the data
	$allowed = array( 
		'a' => array( // on allow a tags
			'href' => array() // and those anchords can only have href attribute
		)
	);
	
	// Probably a good idea to make sure your data is set
	if( isset( $_POST['related_link_source'] ) ) {
		update_post_meta( $post_id, 'related_link_source', wp_kses( $_POST['related_link_source'], $allowed ) );
	}
		
	if( isset( $_POST['related_link_url'] ) ){
		update_post_meta( $post_id, 'related_link_url', wp_kses( $_POST['related_link_url'], $allowed ) );
	}

	if( isset( $_POST['related_link_newsletter'] ) ){
		update_post_meta( $post_id, 'related_link_newsletter', wp_kses( $_POST['related_link_newsletter'], $allowed ) );
	}
		
	// This is purely my personal preference for saving checkboxes
	$chk = ( isset( $_POST['show_on_homepage'] ) && $_POST['show_on_homepage'] ) ? 'on' : 'off';
	update_post_meta( $post_id, 'show_on_homepage', $chk );
}
