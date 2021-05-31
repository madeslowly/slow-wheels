<!-- Styles and scripts, called by /functions.php -->
<?php

// slow_wheels_uri is defined in /functions.php

// Define Theme JS Directory URI
define( 'slow_wheels_js', slow_wheels_uri . 'assets/js/' );

// Define Theme CSS Directory URI
define( 'slow_wheels_css', slow_wheels_uri . 'assets/css/' );

/**
 * Enqueue styles.
 */
function slow_wheels_register_styles() {

	wp_enqueue_style( 'animate-on-scroll', 'https://unpkg.com/aos@next/dist/aos.css' );

	wp_enqueue_style( 'slow-wheels', get_stylesheet_uri(), array(), _S_VERSION , 'all' );

	wp_style_add_data( 'slow-wheels', 'rtl', 'replace' );

}

// add_action( 'wp_enqueue_scripts', 'slow_wheels_register_styles' );

/**
 * Enqueue scripts
 * wp_enqueue_script( 'id', slow_wheels_js . 'filename.js', 'version', $in_footer = false/true);
 */
function slow_wheels_register_scripts() {

	wp_enqueue_script( 'slow-wheels-navigation', slow_wheels_js . 'navigation.js', array(), '', true );

	wp_enqueue_script( 'nav-scrolled', slow_wheels_js . 'nav-scroll.js', array(), '', true );

	if ( is_front_page() ) {
	wp_enqueue_script( 'img-swapper', slow_wheels_js . 'img_swapper.js', array(), '', true );
	}

	/* If we have a gallery run the script to ani each image in */
	/* This need to be conditional so we dont load on every page */
	wp_enqueue_script( 'add-gallery-class', slow_wheels_js . 'gallery_add_class.js', array(), '', true );

	wp_enqueue_script( 'aos-script', 'https://unpkg.com/aos@next/dist/aos.js', array(), '', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

// add_action( 'wp_enqueue_scripts', 'slow_wheels_register_scripts' );

?>
