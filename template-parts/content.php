<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package slow_wheels
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="sw_page-header">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="sw_entry_meta">
				<?php
				slow_wheels_posted_on();
				slow_wheels_posted_by();
				?>
			</div><!-- .sw_entry_meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php slow_wheels_post_thumbnail(); ?>

	<div class="sw_entry_content-page">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'slow-wheels' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'slow-wheels' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="sw_entry_footer">
		<?php slow_wheels_entry_footer(); ?>
	</footer><!-- .sw_entry_footer -->
</article><!-- #post-<?php the_ID(); ?> -->
