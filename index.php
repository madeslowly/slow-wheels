<?php
/**
 * Main template file, default template
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package slow_wheels
 */

// Default template

get_header();
?>

<!--
- .sw__page
o .sw__page--header
o .sw__page--content
-->

<main id="post-<?php the_ID(); ?>" <?php post_class('sw__page'); ?>>

	<?php
	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) :
	?>

			<header>
				<h1 class="page-title screen-reader-text">
					<?php single_post_title(); ?>
				</h1>
			</header>
			<?php

		endif;

		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-page', get_post_type() );

		endwhile;

	endif;
	?>
</div><!-- #primaryContent --><!-- .sw__page--content -->

</main><!-- #post-<?php the_ID(); ?> --><!-- .sw__page -->

<?php
get_sidebar();
get_footer();
