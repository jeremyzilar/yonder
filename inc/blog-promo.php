<section id="blog-promo">
	<div class="blog-icon">
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2">

				<!-- <h3>Recent Updates</h3> -->
				<h3>Project Overview</h3>

				<ul class="nav">
				  <li class="active"><a href="<?php echo esc_url( home_url( '/' ) ); ?>mission/">Our Mission</a></li>
				  <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>blog/">Read Our Blog</a></li>
				  <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>team/">Get to Know Our Team</a></li>
				</ul>

				<div class="blog-highlights">
					<?php 
						$the_query = new WP_Query('category_name=featured');

						if ( $the_query->have_posts() ) {
							while ( $the_query->have_posts() ) {
								$the_query->the_post(); ?>

								<div class="item">
									<h5 class="entry-title">
										<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
									</h5>
									<p class="entry-summary">
										<?php entry_excerpt(); ?>
									</p>
									
									<footer class="entry-meta">
									  <?php andrej_entry_meta($post->ID); ?>
									</footer><!-- .entry-meta -->
								</div>

							<?php 
							}
						}
					?>	
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 text-center">
				<a class="btn btn-learn" href="<?php echo esc_url( home_url( '/' ) ); ?>blog/">Read our Blog <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>
</section>