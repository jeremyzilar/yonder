<?php
  if (is_search()) {
    echo '<h4 class="archive-title"><i class="fa fa-search"></i> ' . get_search_query() . '</h4>';
  }
  if (is_tag()) {
    echo '<h4 class="archive-title"><i class="fa fa-tag"></i> ' . single_tag_title('', false) . '</h4>';
  }
  if (is_category()) {
    // andrej_the_kicker();
    $kicker = andrej_get_kicker();
    echo '<h4 class="archive-title"><i class="fa fa-tag"></i> ' . $kicker . '</h4>';
  }
?>

<form class="form" action="<?php echo home_url(); ?>" id="search-form" method="get">
  <?php if (!is_archive() && !is_search()){ ?>
  <label class="col-xs-12 control-label" for="formGroupInputLarge">Search the Yonder Archives</label>
  <?php }?>
  <div class="input-group">
      <input class="form-control input-lg" type="text" name="s" id="s" placeholder="Search..." />
      <span class="input-group-btn">
        <button type="submit" class="btn btn-default btn-primary btn-lg" value="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>            
</form>

<?php

if (is_search()) {
  echo '<p class="results_num">' . $wp_query->found_posts . ' results found</p>';
}
?>