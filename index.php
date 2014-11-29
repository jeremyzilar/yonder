<?php get_header();
	if ( is_user_logged_in() ) { ?>

	<section id="blog">
		<?php loop(); ?>
	</section>
	<?php }
get_footer(); ?>