<?php
/**
 * Template Name: Contact Page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package slow_wheels
 */

get_header();
?>

	<main id="primary" class="sw__page">
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
		<section class="sw__flexbox">

			<div class="sw__contact--form sw__flexbox--element">
				<h2 class="sw_content--header" ><?php echo get_theme_mod( 'contact_page_form_header_setting'); ?></h2>
				<?php echo do_shortcode("[contact-form-7 id='695' title='Contact form 1']"); ?>
			</div>

			<div class="sw__contact--direct sw__flexbox--element">
				<h2 class="sw_content--header" >Contact Us Directly</h2>
				<h3 class="sw_content--header" >General Enquires</h3>
				<p><?php echo get_theme_mod( 'contact_page_general_tel_setting'); ?></p>
				<p><?php echo get_theme_mod( 'contact_page_general_email_setting'); ?></p>
				<h3 class="sw_content--header" >Booking Enquires</h3>
				<p><?php echo get_theme_mod( 'contact_page_booking_tel_setting'); ?></p>
				<p><?php echo get_theme_mod( 'contact_page_booking_email_setting'); ?></p>
			</div>

		</section>

		<section id="howToFindUs" class="sw__container">
			<div class="sw__contact--address sw__flexbox--element">
				<h2 class="sw_content--header" ><?php echo get_theme_mod( 'contact_page_address_header_setting'); ?></h2>
				<p><?php echo get_theme_mod( 'contact_page_address_line_1_setting'); ?></p>
				<p><?php echo get_theme_mod( 'contact_page_address_line_2_setting'); ?></p>
				<p><?php echo get_theme_mod( 'contact_page_address_line_3_setting'); ?></p>
				<p><?php echo get_theme_mod( 'contact_page_address_line_4_setting'); ?></p>
				<p>What Three Words: <a href="https://what3words.com/<?php echo get_theme_mod( 'contact_page_what_three_words_setting'); ?>"><?php echo get_theme_mod( 'contact_page_what_three_words_setting'); ?> </a></p>

				<!-- workaround, need a way of passing controll to user but i dont know how best -->
				<div class="sw__contact--map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2470.7594784848657!2d-1.1893538843082319!3d51.73743447967362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876c1a39d6c1b19%3A0xa4f5d710cf9f5e52!2sHorspath%20Athletics%20and%20Sports%20Ground!5e0!3m2!1sen!2suk!4v1623663986559!5m2!1sen!2suk" width="800" height="600" style="display: block; border:0" allowfullscreen="" loading="lazy"></iframe>
				</div>
			</div>
		</section>

		<section class="sw__container">

			<?php	get_template_part( 'template-parts//site-cta' ) ?>

		</section>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
