<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package slow_wheels
 */

get_header();
?>

	<main id="primary" class="sw__page">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-page', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'slow-wheels' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'slow-wheels' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	</div><!-- #primaryContent --><!-- .sw__page--content -->

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
