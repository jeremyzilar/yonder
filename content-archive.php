<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

	<header class="entry-header">

		<?php andrej_the_kicker(); ?>

		<h3 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h3>
		
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<p><?php entry_excerpt(); ?></p>
	</div><!-- .entry-summary -->

</article> <!-- #post -->