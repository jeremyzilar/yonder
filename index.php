<?php get_header(); ?>
	<?php include(INC . '/newsletter-promo.php'); ?>
	<section id="blog">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php loop($limit=''); ?>
				</div>
			</div>
		</div>
	</section>
<?php get_footer(); ?>