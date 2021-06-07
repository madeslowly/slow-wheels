<?php
/**
 * Template Name: Contact Page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package slow_wheels
 */

get_header();
?>

	<main id="primary" class="site-main">
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
		<div class="sw_entry_content-page">
			<h2 class="strapline" ><?php echo get_theme_mod( 'contact_page_subtitle_setting'); ?></h2>
		</div>
		<section class="wfa__container wfa__flexwrap">
			<div class="wfa__contact--form">
				<h2 class="wfa__header" ><?php echo get_theme_mod( 'contact_page_form_header_setting'); ?></h2>
				<?php echo do_shortcode("[contact-form-7 id='695' title='Contact form 1']"); ?>
			</div>


			<div class="wfa__contact--address">
				<h2 class="wfa__header" ><?php echo get_theme_mod( 'contact_page_address_header_setting'); ?></h2>
				<p><?php echo get_theme_mod( 'contact_page_address_line_1_setting'); ?></p>
				<p><?php echo get_theme_mod( 'contact_page_address_line_2_setting'); ?></p>
				<p><?php echo get_theme_mod( 'contact_page_address_line_3_setting'); ?></p>
				<p><?php echo get_theme_mod( 'contact_page_address_line_4_setting'); ?></p>
				<p>What Three Words: <a href="https://what3words.com/<?php echo get_theme_mod( 'contact_page_what_three_words_setting'); ?>"><?php echo get_theme_mod( 'contact_page_what_three_words_setting'); ?> </a></p>

				<!-- workaround, need a way of passing controll to user but i dont know how best -->
				<iframe loading="lazy" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d617.6820027547448!2d-1.1888235117996993!3d51.738009998723385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTHCsDQ0JzE2LjgiTiAxwrAxMScxNy44Ilc!5e0!3m2!1sen!2suk!4v1610554667298!5m2!1sen!2suk" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" width="600" height="450" frameborder="0"></iframe>

			</div>

			<div class="wfa__contact--direct">
				<h2 class="wfa__header" >Contact Us Directly</h2>
				<h3 class="wfa__header" >General Enquires</h3>
				<p><?php echo get_theme_mod( 'contact_page_general_tel_setting'); ?></p>
				<p><?php echo get_theme_mod( 'contact_page_general_email_setting'); ?></p>
				<h3 class="wfa__header" >Booking Enquires</h3>
				<p><?php echo get_theme_mod( 'contact_page_booking_tel_setting'); ?></p>
				<p><?php echo get_theme_mod( 'contact_page_booking_email_setting'); ?></p>
			</div>

		</section>




		<section class="wfa__container">
			<div class="wfa__mission" data-aos="fade-up">
				<h2 class="wfa__mission--text" ><?php echo get_theme_mod( 'wfa_mission_text'); ?></h2>
				<div class="h__line"></div></div>
			<div class="wfa__cta">
				<a data-aos="fade-right" href="/book-session/"><span class="wfa__btn wfa__btn--bright wfa__btn--solid">BOOK A SESSION</span></a>
				<a data-aos="fade-left" href=""><span class="wfa__btn wfa__btn--mute wfa__btn--wire">GET MORE INFO</span></a>
			</div>
		</section>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
