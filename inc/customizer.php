<?php
/**
 * slow wheels Theme Customizer
 *
 * @package slow_wheels
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function slow_wheels_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'slow_wheels_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'slow_wheels_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'slow_wheels_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function slow_wheels_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function slow_wheels_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function slow_wheels_customize_preview_js() {
	wp_enqueue_script( 'slow-wheels-customizer', slow_wheels_js . 'customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'slow_wheels_customize_preview_js' );


add_action( 'customize_register', 'slow_wheels_register_theme_customizer' );

/*********************** Custom Settings *************************************/

function slow_wheels_register_theme_customizer( $wp_customize ) {
	// Create the panel.
	$wp_customize->add_panel( 'slow_wheels_panel', array(
		'priority'       => 1,
		'theme_supports' => '',
		'title'          => __( 'Slow Wheels Theme Options', 'slow_wheels' ),
		'description'    => __( 'Set editable elements Slow Wheels theme.', 'slow_wheels' ),
	) );

		////////////////////////////// WFA MISSION //////////////////////////////

		$wp_customize->add_section('sw_mission' , array(
				'title'    		=> __('WFA Mission Statement','slow_wheels'),
				'description' => __( 'Short paragraph detailing the WFA mission.', 'slow_wheels' ),
				'panel'    		=> 'slow_wheels_panel',
				'priority' 		=> 1
		) );

		$wp_customize->add_setting( 'sw_mission_setting', array(
			 'default'           => __( 'Wheels For All Mission Statement', 'slow_wheels' ),
			 'sanitize_callback' => 'sanitize_text'
		) );

		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize, 'sw_mission', array(
				'label'    => __( 'Mission Statement', 'slow_wheels' ),
				'priority' => 1,
				'section'  => 'sw_mission',
				'settings' => 'sw_mission_setting',
				'type'     => 'textarea'
		) ) );

		////////////////////////////// LANDING PAGE //////////////////////////////
		$wp_customize->add_section('landing_page' , array(
				'title'    		=> __('Landing Page','slow_wheels'),
				'description' => __( 'Landing Page elements consist of 3 headers, 3 (short) paragraphs and 4 images. The headers hide the paragraphs until someone hovers over.', 'slow_wheels' ),
				'panel'    		=> 'slow_wheels_panel',
				'priority' 		=> 1
		) );

			/**************************** SETTINGS ****************************/
			$wp_customize->add_setting( 'landing_page_header_1_setting', array(
				 'default'           => __( 'ACCESSIBLE CYCLING', 'slow_wheels' ),
				 'sanitize_callback' => 'sanitize_text'
			) );

			$wp_customize->add_setting( 'landing_page_para_1_setting', array(
				 'default'           => __( 'Inclusive cycling for everybody. Get fit, learn to cycle or just for fun.', 'slow_wheels' ),
				 'sanitize_callback' => 'sanitize_text'
			) );

			$wp_customize->add_setting( 'landing_page_header_2_setting', array(
				 'default'           => __( 'Safe space for all', 'slow_wheels' ),
				 'sanitize_callback' => 'sanitize_text'
			) );

			$wp_customize->add_setting( 'landing_page_para_2_setting', array(
				 'default'           => __( 'Cycle freely, without the worry of other road users. We might even play your favourite song.', 'slow_wheels' ),
				 'sanitize_callback' => 'sanitize_text'
			) );

			$wp_customize->add_setting( 'landing_page_header_3_setting', array(
				 'default'           => __( 'supportive environment', 'slow_wheels' ),
				 'sanitize_callback' => 'sanitize_text'
			) );

			$wp_customize->add_setting( 'landing_page_para_3_setting', array(
				 'default'           => __( 'All our sessions are overseen by the Wheels For All team, so if its a ride along buddy or a wobbly wheel, we have you covered.', 'slow_wheels' ),
				 'sanitize_callback' => 'sanitize_text'
			) );

			$wp_customize->add_setting( 'landing_page_img_1_setting', array(
					'default' => get_theme_file_uri('assets/defaults/images/landing_image_1.jpg'), // Add Default Image URL
					'sanitize_callback' => 'esc_url_raw'
			) );

			$wp_customize->add_setting( 'landing_page_img_2_setting', array(
					'default' => get_theme_file_uri('assets/defaults/images/landing_image_1.jpg'), // Add Default Image URL
					'sanitize_callback' => 'esc_url_raw'
			) );

			$wp_customize->add_setting( 'landing_page_img_3_setting', array(
					'default' => get_theme_file_uri('assets/defaults/images/landing_image_1.jpg'), // Add Default Image URL
					'sanitize_callback' => 'esc_url_raw'
			) );

			$wp_customize->add_setting( 'landing_page_img_default_setting', array(
					'default' => get_theme_file_uri('assets/defaults/images/landing_image_1.jpg'), // Add Default Image URL
					'sanitize_callback' => 'esc_url_raw'
			) );

			/**************************** CONTROLS ****************************/

			/* Deafulat image when no hover event */
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'landing_page_image_default', array(
					'label' => 'Main Image',
					'description' => __( 'This is the first image people see, when not hovering over one of the headers.' ),
					'priority' => 1,
					'section'  => 'landing_page',
					'settings' => 'landing_page_img_default_setting',
					'button_labels' => array(// All These labels are optional
											'select' => 'Select Image',
											'remove' => 'Remove Image',
											'change' => 'Change Image',
			) ) ) );

			/* BLOCK 1 */
			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize, 'landing_page_header_1', array(
					'label'    => __( 'Header One', 'slow_wheels' ),
					'priority' => 2,
					'section'  => 'landing_page',
					'settings' => 'landing_page_header_1_setting',
					'type'     => 'text'
			) ) );

			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize, 'landing_page_para_1', array(
		      'label'    => __( 'Paragraph One', 'slow_wheels' ),
					'priority' => 3,
		      'section'  => 'landing_page',
		      'settings' => 'landing_page_para_1_setting',
		      'type'     => 'textarea'
			) ) );

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'landing_page_image_1', array(
					'label' => 'Image One',
					'description' => __( 'This is image revealed when we are hovering over header one.' ),
					'priority' => 4,
					'section'  => 'landing_page',
					'settings' => 'landing_page_img_1_setting',
					'button_labels' => array(// All These labels are optional
											'select' => 'Select Image',
											'remove' => 'Remove Image',
											'change' => 'Change Image',
			) ) ) );

			/* BLOCK 2 */
			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize, 'landing_page_header_2', array(
					'label'    => __( 'Header Two', 'slow_wheels' ),
					'priority' => 5,
					'section'  => 'landing_page',
					'settings' => 'landing_page_header_2_setting',
					'type'     => 'text'
			) ) );

			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize, 'landing_page_para_2', array(
		      'label'    => __( 'Paragraph Two', 'slow_wheels' ),
					'priority' => 6,
		      'section'  => 'landing_page',
		      'settings' => 'landing_page_para_2_setting',
		      'type'     => 'textarea'
			) ) );

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'landing_page_image_2', array(
					'label' => 'Image Two',
					'description' => __( 'This is image revealed when we are hovering over header two.' ),
					'priority' => 7,
					'section'  => 'landing_page',
					'settings' => 'landing_page_img_2_setting',
					'button_labels' => array(// All These labels are optional
											'select' => 'Select Image',
											'remove' => 'Remove Image',
											'change' => 'Change Image',
			) ) ) );

			/* BLOCK 3 */
			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize, 'landing_page_header_3', array(
					'label'    => __( 'Header Three', 'slow_wheels' ),
					'priority' => 8,
					'section'  => 'landing_page',
					'settings' => 'landing_page_header_3_setting',
					'type'     => 'text'
			) ) );

			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize, 'landing_page_para_3', array(
		      'label'    => __( 'Paragraph Three', 'slow_wheels' ),
					'priority' => 9,
		      'section'  => 'landing_page',
		      'settings' => 'landing_page_para_3_setting',
		      'type'     => 'textarea'
			) ) );

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'landing_page_image_3', array(
					'label' => 'Image Three',
					'description' => __( 'This is image revealed when we are hovering over header three.' ),
					'priority' => 10,
					'section'  => 'landing_page',
					'settings' => 'landing_page_img_3_setting',
					'button_labels' => array(// All These labels are optional
											'select' => 'Select Image',
											'remove' => 'Remove Image',
											'change' => 'Change Image',
			) ) ) );

	////////////////////////////// END LANDING PAGE //////////////////////////////


	////////////////////////////// CONTACT PAGE //////////////////////////////

	$wp_customize->add_section('contact_page' , array(
			'title'    => __('Contact Page','slow_wheels'),
			'panel'    => 'slow_wheels_panel',
			'priority' => 4
	) );

	/**************************** SETTINGS ****************************/

	$wp_customize->add_setting( 'contact_page_form_header_setting', array(
		 'default'           => __( 'Default Text', 'slow_wheels' ),
		 'sanitize_callback' => 'sanitize_text'
	) );

	$wp_customize->add_setting( 'contact_page_address_header_setting', array(
		 'default'           => __( 'Default Text', 'slow_wheels' ),
		 'sanitize_callback' => 'sanitize_text'
	) );

	$wp_customize->add_setting( 'contact_page_address_line_1_setting', array(
		 'default'           => __( 'Default Text', 'slow_wheels' ),
		 'sanitize_callback' => 'sanitize_text'
	) );

	$wp_customize->add_setting( 'contact_page_address_line_2_setting', array(
		 'default'           => __( 'Default Text', 'slow_wheels' ),
		 'sanitize_callback' => 'sanitize_text'
	) );

	$wp_customize->add_setting( 'contact_page_address_line_3_setting', array(
		 'default'           => __( 'Default Text', 'slow_wheels' ),
		 'sanitize_callback' => 'sanitize_text'
	) );

	$wp_customize->add_setting( 'contact_page_address_line_4_setting', array(
		 'default'           => __( 'Default Text', 'slow_wheels' ),
		 'sanitize_callback' => 'sanitize_text'
	) );

	$wp_customize->add_setting( 'contact_page_what_three_words_setting', array(
		 'default'           => __( 'Default Text', 'slow_wheels' ),
		 'sanitize_callback' => 'sanitize_text'
	) );

	$wp_customize->add_setting( 'contact_page_general_tel_setting', array(
		 'default'           => __( 'Default Text', 'slow_wheels' ),
		 'sanitize_callback' => 'sanitize_text'
	) );

	$wp_customize->add_setting( 'contact_page_general_email_setting', array(
		 'default'           => __( 'Default Text', 'slow_wheels' ),
		 'sanitize_callback' => 'sanitize_text'
	) );

	$wp_customize->add_setting( 'contact_page_booking_tel_setting', array(
		 'default'           => __( 'Default Text', 'slow_wheels' ),
		 'sanitize_callback' => 'sanitize_text'
	) );

	$wp_customize->add_setting( 'contact_page_booking_email_setting', array(
		 'default'           => __( 'Default Text', 'slow_wheels' ),
		 'sanitize_callback' => 'sanitize_text'
	) );

	/**************************** CONTROLS ****************************/

	/* Form header */
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, 'contact_header', array(
		'label'    => __( 'Contact Form Title', 'slow_wheels' ),
		'description' => __( 'Title above the contact form. Note the form itself is setup in Seninblue tab on the main wordpress dashboard.' ),
		'priority' => 3,
		'section' => 'contact_page',
		'settings' => 'contact_page_form_header_setting',
		'type'     => 'text'
	) ) );

	/* Address header */
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, 'address_header', array(
		'label'    => __( 'Address Title', 'slow_wheels' ),
		'description' => __( 'Title above the address details.' ),
		'priority' => 4,
		'section' => 'contact_page',
		'settings' => 'contact_page_address_header_setting',
		'type'     => 'text'
	) ) );

	/* Address line 1 */
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, 'address_line_1', array(
		'label'    => __( 'Line 1', 'slow_wheels' ),
		'description' => __( '' ),
		'priority' => 5,
		'section' => 'contact_page',
		'settings' => 'contact_page_address_line_1_setting',
		'type'     => 'text'
	) ) );

	/* Address line 2 */
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, 'address_line_2', array(
		'label'    => __( 'Line 2', 'slow_wheels' ),
		'description' => __( '' ),
		'priority' => 6,
		'section' => 'contact_page',
		'settings' => 'contact_page_address_line_2_setting',
		'type'     => 'text'
	) ) );

	/* Address line 3 */
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, 'address_line_3', array(
		'label'    => __( 'Line 3', 'slow_wheels' ),
		'description' => __( '' ),
		'priority' => 7,
		'section' => 'contact_page',
		'settings' => 'contact_page_address_line_3_setting',
		'type'     => 'text'
	) ) );

	/* Address line 4 */
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, 'address_line_4', array(
		'label'    => __( 'Line 4', 'slow_wheels' ),
		'description' => __( '' ),
		'priority' => 8,
		'section' => 'contact_page',
		'settings' => 'contact_page_address_line_4_setting',
		'type'     => 'text'
	) ) );

	/* Address what three words */
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, 'address_what_three_words', array(
		'label'    => __( 'What Three Words', 'slow_wheels' ),
		'description' => __( 'The simplest way to talk about location, see https://what3words.com/' ),
		'priority' => 9,
		'section' => 'contact_page',
		'settings' => 'contact_page_what_three_words_setting',
		'type'     => 'text'
	) ) );

	/* Address what three words */
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, 'address_general_tel', array(
		'label'    => __( 'Telephone for general equiries', 'slow_wheels' ),
		'description' => __( '' ),
		'priority' => 10,
		'section' => 'contact_page',
		'settings' => 'contact_page_general_tel_setting',
		'type'     => 'text'
	) ) );

	/* Address what three words */
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, 'address_general_email', array(
		'label'    => __( 'Email for general equiries', 'slow_wheels' ),
		'description' => __( '' ),
		'priority' => 11,
		'section' => 'contact_page',
		'settings' => 'contact_page_general_email_setting',
		'type'     => 'text'
	) ) );

	/* Address what three words */
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, 'address_booking_tel', array(
		'label'    => __( 'Telephone for booking equiries', 'slow_wheels' ),
		'description' => __( '' ),
		'priority' => 12,
		'section' => 'contact_page',
		'settings' => 'contact_page_booking_tel_setting',
		'type'     => 'text'
	) ) );

	/* Address what three words */
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, 'address_booking_email', array(
		'label'    => __( 'Email for booking equiries', 'slow_wheels' ),
		'description' => __( '' ),
		'priority' => 13,
		'section' => 'contact_page',
		'settings' => 'contact_page_booking_email_setting',
		'type'     => 'text'
	) ) );


	////////////////////////////// END CONTACT PAGE //////////////////////////////



	// Sanitize text
	function sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}

}

add_action( 'customize_register', 'slow_wheels_register_theme_customizer');


/**
 *
 */
function featured_image_gallery_customize_register( $wp_customize ) {

    if ( ! class_exists( 'CustomizeImageGalleryControl\Control' ) ) {
        return;
    }

    $wp_customize->add_section( 'featured_image_gallery_section', array(
        'title'      => __( 'Sponsor Logos' ),
        'priority'   => 1,
    ) );
    $wp_customize->add_setting( 'featured_image_gallery', array(
        'default' => array(),
        'sanitize_callback' => 'wp_parse_id_list',
    ) );
    $wp_customize->add_control( new CustomizeImageGalleryControl\Control(
        $wp_customize,
        'featured_image_gallery',
        array(
            'label'    => __( 'Selected images' ),
						'description' => __( 'Only use images in PNG format with a transparent background. Once uploaded ensure there is liitle or no white space around the image. Contact arran@madeslowly.co.uk if you need help converting an image.' ),
            'section'  => 'featured_image_gallery_section',
            'settings' => 'featured_image_gallery',
            'type'     => 'image_gallery',
        )
    ) );
}
add_action( 'customize_register', 'featured_image_gallery_customize_register' );

function numag_remove_sections( $wp_customize ) {

	$wp_customize->remove_section('header_image');
	//$wp_customize->remove_panel('nav_menus');
	$wp_customize->remove_panel('widgets');
	$wp_customize->remove_section('custom_css');
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('background_image');
	//$wp_customize->remove_section('title_tagline');
}
#add_action( 'customize_register', 'numag_remove_sections');
