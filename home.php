<?php
/**
 * The main template file, feeds and home will defualt to here, before going to index.php
 *
 * We have a template for front page to this should only ever be used for feeds
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

get_header();
?>

<main id="primary" class="site-main">

	<?php

		if ( is_home() && ! is_front_page() ) : ?>
		<!-- if we have posts and we are !home -->
			<div class="post-thumbnail sw_hero-wrap">

				<?php
					$page_for_posts = get_option( 'page_for_posts' );
    			echo get_the_post_thumbnail($page_for_posts, 'large');
				?>

			</div><!-- .post-thumbnail -->

			<header>
				<h1 class="sw_page-header"><?php single_post_title(); ?></h1>
			</header>

		<?php endif; ?>

		<div class="sw_entry_content-feed">

			<?php
			/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					/*
					 * Include the Post-Type-specific template for the content.
					 * Specificaly pointing to content-news.php
					 */
					get_template_part( 'template-parts/content-news', get_post_type() );

				endwhile;
			?>
		</div>

		<?php	the_posts_navigation();	?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
