<?php
/**
 * Template Name: Gallery Page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package slow_wheels
 */

get_header();
?>

	<main id="primary" class="site-main gallery__page">
		<h2 class="wfa__strapline" ><?php echo get_theme_mod( 'gallery_page_subtitle_setting'); ?></h2>
		<div class="hero__image" style="background-image: url('<?php echo get_theme_mod('gallery_page_hero_setting'); ?>')">
			<h2 class="wfa__strapline" ><?php echo get_theme_mod( 'gallery_page_subtitle_setting'); ?></h2>
		</div>
		<h2 class="wfa__strapline" ><?php echo get_theme_mod( 'gallery_page_subtitle_setting'); ?></h2>

		<div class="wfa__mission wfa__container" data-aos="fade-up">
			<h3 class="wfa__mission--text" ><?php echo get_theme_mod( 'gallery_page_instruction_setting'); ?></h3>
			<div class="h__line"></div>
		</div>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>



	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
