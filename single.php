<?php get_header(); ?>
	<section id="blog">
		<?php
		loop();
		include(INC . '/nextprev.php');
		?>
	</section>
<?php get_footer(); ?>