<?php
/**
 * Template part for displaying page content in index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package slow_wheels
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- if we dont have a featured image, push content down by $hero-height -->
	<?php

		if (!has_post_thumbnail()) {
			echo '<div class="no__feature"></div>';
		}

	?>

	<?php slow_wheels_post_thumbnail(); ?>

	<header class="">
		<?php the_title( '<h1 class="sw_page-header">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="sw_entry_content-page">
		<?php

		if ( wp_get_post_parent_id( get_the_ID() ) ) {
			echo "INSERT CHILD PAGE NAV";
		}
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'slow-wheels' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="sw_entry_footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'slow-wheels' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .sw_entry_footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
