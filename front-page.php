<?php
/**
 * The template for displaying homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package slow_wheels
 */

get_header();


?>

	<main id="primary" class="site-main front__page h__100">

		<div class="w__100 hero__container">
			<div class="hero__img">
				<div class="hero_img_default visible" style="background-image: url('<?php echo get_theme_mod('landing_page_img_default_setting'); ?>')"></div>
				<div class="hero_img_1 " style="background-image: url('<?php echo get_theme_mod('landing_page_img_1_setting'); ?>')"></div>
				<div class="hero_img_2 " style="background-image: url('<?php echo get_theme_mod('landing_page_img_2_setting'); ?>')"></div>
				<div class="hero_img_3 " style="background-image: url('<?php echo get_theme_mod('landing_page_img_3_setting'); ?>')"></div>
			</div>

			<div class="hero__text">
				<div class="hero__title" onmouseover="bigImg('.hero_img_1')" onmouseout="normalImg('.hero_img_1')">
					<div class="title_1" >
						<h1><?php	echo get_theme_mod( 'landing_page_header_1_setting'); ?></h1>
					</div>
					<p class="hero__para"><?php	echo get_theme_mod( 'landing_page_para_1_setting'); ?></p>
				</div>

				<div class="hero__title" onmouseover="bigImg('.hero_img_2')" onmouseout="normalImg('.hero_img_2')">
					<div class="title_2">
						<h1><?php	echo get_theme_mod( 'landing_page_header_2_setting'); ?></h1>
					</div>
					<p class="hero__para"><?php	echo get_theme_mod( 'landing_page_para_2_setting'); ?></p>
				</div>

				<div class="hero__title" onmouseover="bigImg('.hero_img_3')" onmouseout="normalImg('.hero_img_3')">
					<div class="title_3">
						<h1><?php	echo get_theme_mod( 'landing_page_header_3_setting'); ?></h1>
					</div>
					<p class="hero__para"><?php	echo get_theme_mod( 'landing_page_para_3_setting'); ?></p>
				</div>
			</div>
		</div>
	</main>

	<section class="wfa__container">
		<div class="wfa__mission" data-aos="fade-up">
			<h2 class="wfa__mission--text" ><?php echo get_theme_mod( 'wfa_mission_text'); ?></h2>
			<div class="h__line"></div></div>
		<div class="wfa__cta">
			<a data-aos="fade-right" href="/book-session/"><span class="wfa__btn wfa__btn--bright wfa__btn--solid">BOOK A SESSION</span></a>
			<a data-aos="fade-left" href=""><span class="wfa__btn wfa__btn--mute wfa__btn--wire">GET MORE INFO</span></a>
		</div>
	</section>



<?php
get_sidebar();
get_footer();
