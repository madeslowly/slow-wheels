<?php
/**
 * Template Name: Front Page
 * The template for displaying homepage
 *
 * We could put this in root and wordpress would defualt to it for the page that is set as front, but this is a bit tidier
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package slow_wheels
 */

get_header();
?>

<main id="post-<?php the_ID(); ?>" <?php post_class('sw__page'); ?>>

	<div class="front__page">

		<div class="hero__img">
			<div id="heroImg_default" class="hero__img--default visible" style="background-image: url('<?php echo get_theme_mod('landing_page_img_default_setting'); ?>')"></div>
			<div id="heroImg_1" class="hero__img--1 " style="background-image: url('<?php echo get_theme_mod('landing_page_img_1_setting'); ?>')"></div>
			<div id="heroImg_2" class="hero__img--2 " style="background-image: url('<?php echo get_theme_mod('landing_page_img_2_setting'); ?>')"></div>
			<div id="heroImg_3" class="hero__img--3 " style="background-image: url('<?php echo get_theme_mod('landing_page_img_3_setting'); ?>')"></div>
		</div>

		<div class="hero__text">
			<div class="hero__title" onmouseover="bigImg('#heroImg_1')" onmouseout="normalImg('#heroImg_1')">
				<div class="hero__title--1" >
					<h1><?php	echo get_theme_mod( 'landing_page_header_1_setting'); ?></h1>
				</div>
				<p class="hero__para"><?php	echo get_theme_mod( 'landing_page_para_1_setting'); ?></p>
			</div>

			<div class="hero__title" onmouseover="bigImg('#heroImg_2')" onmouseout="normalImg('#heroImg_2')">
				<div class="hero__title--2">
					<h1><?php	echo get_theme_mod( 'landing_page_header_2_setting'); ?></h1>
				</div>
				<p class="hero__para"><?php	echo get_theme_mod( 'landing_page_para_2_setting'); ?></p>
			</div>

			<div class="hero__title" onmouseover="bigImg('#heroImg_3')" onmouseout="normalImg('#heroImg_3')">
				<div class="hero__title--3">
					<h1><?php	echo get_theme_mod( 'landing_page_header_3_setting'); ?></h1>
				</div>
				<p class="hero__para"><?php	echo get_theme_mod( 'landing_page_para_3_setting'); ?></p>
			</div>

		</div>

	</div><!-- .w__100 .hero__container .h__100 .front__page -->

	<!-- ID for skip to content -->
	<section id="primaryContent" class="sw__container">

		<?php	get_template_part( 'template-parts//site-mission' ) ?>
		<?php	get_template_part( 'template-parts//site-cta' ) ?>

	</section><!-- #primaryContent .sw__container -->

</main><!-- #post-<?php the_ID(); ?> --><!-- .sw__page -->


<?php
get_sidebar();
get_footer();
