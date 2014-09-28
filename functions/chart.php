<?php

add_action( 'add_meta_boxes', 'chart_config_add' );
function chart_config_add() {
	add_meta_box( 'chart_config-id', 'Chart Config', 'chart_config', 'post', 'normal', 'high' );
}

function chart_config( $post )
{
	$values = get_post_custom( $post->ID );
	$name = isset( $values['chart_config_name'] ) ? esc_attr( $values['chart_config_name'][0] ) : '';
	$type = isset( $values['chart_config_type'] ) ? esc_attr( $values['chart_config_type'][0] ) : '';
	$url = isset( $values['chart_config_url'] ) ? esc_attr( $values['chart_config_url'][0] ) : '';
	$check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
	<style type="text/css" media="screen">
	  #chart_config_box{}
	  #chart_config_box label,
	  #chart_config_box input,
	  #chart_config_box small{}
	  #chart_config_box label{
	    padding:0 2px;
	  }
    #chart_config_name{
      width:30%;
    }
    #chart_config_url{
      width:100%;
    }
    #chart_config_box small{
      padding:0 3px;
      color:#999;
    }
	</style>
	<div id="chart_config_box">
    <p>
  		<label for="chart_config_name">Chart Name</label><br />
  		<input type="text" name="chart_config_name" id="chart_config_name" value="<?php echo $name; ?>" /><br />
  		<small>nytimes.com</small>
  	</p>

  	<p>
  		<label for="chart_config_type">Chart Type</label><br />
  		<select type="select" name="chart_config_type" id="chart_config_type">
  			<option value="Bar" <?php selected( $type, 'Bar' ); ?> >Bar</option>
  			<option value="Line" <?php selected( $type, 'Line' ); ?> >Line</option>
  			<option value="Pie" <?php selected( $type, 'Pie' ); ?> >Pie</option>
  			<option value="Doughnut" <?php selected( $type, 'Doughnut' ); ?> >Doughnut</option>
  			<option value="PolarArea" <?php selected( $type, 'PolarArea' ); ?> >PolarArea</option>
  			<option value="Radar" <?php selected( $type, 'Radar' ); ?> >Radar</option>
  		</select>
  	</p>
  	<p>
  		<label for="chart_config_url">URL</label><br />
  		<input type="text" name="chart_config_url" id="chart_config_url" value="<?php echo $url; ?>" /><br />
  		<small>e.g. http://nytimes.com/<?php echo date('Y'); ?>/<?php echo date('m'); ?>/<?php echo date('d'); ?>/the-future-is-bright</small>
  	</p>

  	<p>
  		<input type="checkbox" name="my_meta_box_check" id="my_meta_box_check" <?php checked( $check, 'on' ); ?> />
  		<label for="my_meta_box_check">Don't Check This.</label>
  	</p>
	</div><!-- #chart_config_box -->
	<?php	
}


add_action( 'save_post', 'chart_meta_box_save' );
function chart_meta_box_save( $post_id )
{
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	
	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;
	
	// now we can actually save the data
	$allowed = array( 
		'a' => array( // on allow a tags
			'href' => array() // and those anchords can only have href attribute
		)
	);
	
	// Probably a good idea to make sure your data is set
	if( isset( $_POST['chart_config_name'] ) )
		update_post_meta( $post_id, 'chart_config_name', wp_kses( $_POST['chart_config_name'], $allowed ) );

	if( isset( $_POST['chart_config_type'] ) )
		 update_post_meta( $post_id, 'chart_config_type', wp_kses( $_POST['chart_config_type'], $allowed ) );
		
	if( isset( $_POST['chart_config_url'] ) )
		update_post_meta( $post_id, 'chart_config_url', wp_kses( $_POST['chart_config_url'], $allowed ) );
		
	// This is purely my personal preference for saving checkboxes
	$chk = ( isset( $_POST['my_meta_box_check'] ) && $_POST['my_meta_box_check'] ) ? 'on' : 'off';
	update_post_meta( $post_id, 'my_meta_box_check', $chk );
}


// Chart Scripts
function get_charts(){
  $name = get_post_meta( get_the_ID(), 'chart_config_name', true );
  $varname = $name . 'Chart';
  $type = get_post_meta( get_the_ID(), 'chart_config_type', true );

  echo <<< EOF
  <script type="text/javascript">
	  (function($){
		  jQuery(document).ready(function() {
		  	// Get context with jQuery - using jQuery's .get() method.
			  var ctx = $("#$name-chart").get(0).getContext("2d");

			  // This will get the first returned node in the jQuery collection.
			  var myNewChart = new Chart(ctx);

			  var data = [
		      {
		          value: 300,
		          color:"#F7464A",
		          highlight: "#FF5A5E",
		          label: "Red"
		      },
		      {
		          value: 50,
		          color: "#46BFBD",
		          highlight: "#5AD3D1",
		          label: "Green"
		      },
		      {
		          value: 100,
		          color: "#FDB45C",
		          highlight: "#FFC870",
		          label: "Yellow"
		      }
			  ];

			  //Define the Chart
			  var $varname = new Chart(ctx).$type(data);
			  
			});
		})(jQuery);
	</script>
EOF;
}


?>



