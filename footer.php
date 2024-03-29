<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package slow_wheels
*/

?>

<footer class="sw__footer">
	<div class="footer-header">
		<div class="sponsors">
			<h1>Our Friends and Sponsors</h1>
				<?php slow_wheels_sponsor_logos(); ?>
		</div>
	</div>

	<div class="footer__naviagtion">
		<div class="useful-links">
			<h3>Useful Links</h3>
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'useful-links',
						'container_class' => 'footer__menu--highlight'
					)
				);
			?>
		</div>

		<div class="downloadables">
			<h3>Downloadable Content</h3>
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'downloadable-content',
						'container_class' => 'footer__menu'
					)
				);
			?>
		</div>

		<div class="">
			<div class="sign__up">
				<h3>Newsletter Sign Up</h3>
				<?php echo do_shortcode('[sibwp_form id=1]'); ?>
			</div>
		</div>

	</div>

	<div class="site-info">
		<p>&copy; <?php echo get_bloginfo( 'name' ); ?> <?php echo date("Y"); ?> </p>
		<p><a href="<?php echo get_site_url() ?>/privacy-policy/">Privacy</a> | <a href="<?php echo get_site_url() ?>/terms-and-conditions/">Terms</a></p>
		<p><?php printf( esc_html__( '%1$s by %2$s.', 'slow-wheels' ), '<a href="https://github.com/madeslowly/slow-wheels">Slow Wheels</a>', '<a href="http://madeslowly.co.uk">Made 	Slowly</a>' ); ?>
		</p>

	</div><!-- .site-info -->
</footer><!-- .sw__footer -->


<?php wp_footer(); ?>


<script>

	AOS.init({
	duration: 600,
	easing: 'ease-in-out-cubic',
	disable: 'mobile'
	});

</script>

</body>
</html>
