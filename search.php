<?php
/* Template Name: Search */

get_header(); ?>
  
  <section id="search-area">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-10">
          <?php include(INC . '/search-bar.php'); ?>
          <?php if (is_page_template( 'search.php' )) {
            include(INC . '/tag-cloud.php');
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  
  <?php if (is_search()) { ?>
    <section id="main">
      <div class="container">
        <div class="row">
          <div id="blog" class="col-xs-12 col-sm-7">
            <?php loop(); ?>
          </div>
          <div class="col-xs-12 col-sm-3">
            <?php include(INC . '/tag-cloud.php'); ?>
          </div>
          
        </div>
      </div>
    </section>
  <?php } ?>
  
<?php get_footer(); ?>