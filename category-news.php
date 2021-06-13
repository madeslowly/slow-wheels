<?php
/**
 * The main category template file, if nothing more specific exists, like category-unicorn.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package slow_wheels
 */

get_header();
?>

	<main id="primary" class="sw__page news">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>

				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content-landing', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
