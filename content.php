<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

	<?php date_marker(); ?>

	<header class="entry-header">

		<?php andrej_the_kicker(); ?>

		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h3 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h3>
		<?php endif; // is_single() ?>

		<?php echo andrej_featured_media('large'); ?>
		
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<p><?php entry_excerpt(); ?></p>
		</div><!-- .entry-summary -->
	<?php else : ?>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php echo get_related(); ?>
		</div><!-- .entry-content -->

	<?php endif; ?>
	<?php if (!is_page() ) { ?>
		<footer class="entry-meta">
		  <?php andrej_entry_meta($post->ID); ?>
		</footer><!-- .entry-meta -->
	<?php } ?>
	

	<!-- Comments Start here -->
	<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
		<?php //comments_template(); ?>
	<?php } ?>
</article> <!-- #post -->