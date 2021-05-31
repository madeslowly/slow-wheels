<?php
/**
 * Template part for displaying the news feed, called by index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package slow_wheels
 */

?>

<article id="news-<?php the_ID(); ?>" <?php post_class('sw_post_card'); ?>>

	<?php slow_wheels_post_thumbnail() ; ?>

	<header class="entry-header sw_news-thumb-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title">', '</h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<!--
			<div class="sw_entry_meta">
				<?php
				slow_wheels_posted_on();
				slow_wheels_posted_by();
				?>
			</div>
			--><!-- .sw_entry_meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="sw_news-thumb-content">
		<p>
		<?php
		echo slow_wheels_post_excerpt(30);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'slow-wheels' ),
				'after'  => '</div>',
			)
		);
		?>
	</p>
	</div><!-- .entry-content -->
	<!--
	<footer class="sw_entry_footer">
		<?php slow_wheels_entry_footer(); ?>
	</footer>
	--><!-- .sw_entry_footer -->
 <!-- opened in inc/template-tags.php so that we wrap the whole sw_post_card -->
	</a></article><!-- #post-<?php the_ID(); ?> -->
