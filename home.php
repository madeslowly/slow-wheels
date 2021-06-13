<?php
/**
 * The main template file, feeds and home will defualt to here, before going to index.php
 *
 * We have a template for front page to this should only ever be used for feeds
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package slow_wheels
 */

// Currently only used for posts feed

get_header();
?>

<main id="post-<?php the_ID(); ?>" <?php post_class('sw__page'); ?>>

	<?php	if ( is_home() && ! is_front_page() ) :	?>



	<div class="post-thumbnail sw__hero">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<header class="sw__header">
		<h1 class="page--header"><?php single_post_title(); ?></h1>
	</header>

	<?php endif; ?>

	<div id="primaryContent" class="sw__page--content sw__page--feed">

		<?php	/* Start the Loop */
		while ( have_posts() ) :
			the_post();
			// only news posts
			if ( in_category( 'news' ) ) {
				get_template_part( 'template-parts/content-post', get_post_type() );
			}
		endwhile; ?>

	</div>

	<?php	the_posts_navigation();	?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
