<?php 
  $ex_term1 = get_term_by( 'slug', 'newsletter', 'category' );
  $ex_term2 = get_term_by( 'slug', 'uncategorized', 'category' );
  $ex_terms = $ex_term2->term_id .', '. $ex_term1->term_id;
  $args = array(
    'smallest'                  => 14, 
    'largest'                   => 14,
    'unit'                      => 'px', 
    'number'                    => 45,  
    'format'                    => 'flat',
    'separator'                 => "\n",
    'orderby'                   => 'count', 
    'order'                     => 'DESC',
    'exclude'                   => $ex_terms, 
    'include'                   => null, 
    'topic_count_text_callback' => 'default_topic_count_text',
    'link'                      => 'view', 
    'taxonomy'                  => array( 'post_tag', 'category' ), 
    'echo'                      => true,
    'child_of'                  => null, // see Note!
  );
?>
<div id="tag-cloud">
  <?php 
    wp_tag_cloud( $args );
  ?>  
</div>