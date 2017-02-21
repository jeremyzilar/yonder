<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

	<?php //date_marker(); ?>

	<header class="entry-header">

		<?php andrej_the_kicker(); ?>

		<?php if ( is_singular() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h3 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h3>
		<?php endif; // is_single() ?>


		<?php
			if (!is_page()) {
			  $author = get_the_author();
			  $author_user = get_the_author_meta( 'user_login' );
			  $author_link = get_author_posts_url(get_the_author_meta( 'ID' ));

				echo '<div class="author_date">By '.$author.' | ';

				andrej_entry_date();

				if ( is_user_logged_in() ) {
					$edit = get_edit_post_link($id);
					echo ' | <a href="'.$edit.'" class="btn-edit"><i class="fa fa-pencil"></i> edit</a>';
				}

			  echo '</div>';
			}
		?>

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