<?php get_header(); ?>
  <section id="search-area">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-10">
          <?php include(INC . '/search-bar.php'); ?>
        </div>
      </div>
    </div>
  </section>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-7">
          <?php loop(); ?>
        </div>
        <div class="col-xs-12 col-sm-3">
          <?php include(INC . '/tag-cloud.php'); ?>
        </div>
      </div>
      
      
    
    </div>
  </section>
<?php get_footer(); ?>