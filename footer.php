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

	<footer class="site-footer">
		<div class="footer-naviagtion">
			<div class="sitemap">
				<h3> Sitemap </h3>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</div>

			<div class="downloadables">
				<h3> Downloadable Content </h3>
				<?php
				wp_nav_menu(
					array(
						'menu_id'        => 'downloadable-content',
					)
				);
				?>

			</div>
			<div class="sponsors">
				<h3>Our Friends and Sponsors</h3>
			<?php echo do_shortcode('[featured_image_gallery link="none" size="medium"] '); ?>
</div>

			</div>
				<div class="site-info">
					<p>&copy; <?php echo get_bloginfo( 'name' ); ?> | <?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( '%1$s by %2$s.', 'slow-wheels' ), '<a href="https://github.com/madeslowly/slow-wheels">Slow Wheels</a>', '<a href="http://madeslowly.co.uk">Made 	Slowly</a>' );
						?></p>
				</div><!-- .site-info -->
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>


<script>

AOS.init({
	disable: false,
	duration: 600,
	easing: 'ease-in-out-cubic'

});

</script>

</body>
</html>
