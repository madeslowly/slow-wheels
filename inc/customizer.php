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
	wp_enqueue_script( 'slow-wheels-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
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


		////////////////////////////// LANDING PAGE //////////////////////////////
		$wp_customize->add_section('landing_page' , array(
				'title'    		=> __('Landing Page','slow_wheels'),
				'description' => __( 'Edit Landing Page elements, the 3 titles, 3 paragraphs, 3 images and the mission statement at the bottom.', 'slow_wheels' ),
				'panel'    		=> 'slow_wheels_panel',
				'priority' 		=> 1
		) );

			/**************************** SETTINGS ****************************/
			$wp_customize->add_setting( 'landing_page_header_1_setting', array(
				 'default'           => __( 'Default Text', 'slow_wheels' ),
				 'sanitize_callback' => 'sanitize_text'
			) );

			$wp_customize->add_setting( 'landing_page_para_1_setting', array(
				 'default'           => __( 'Default Text', 'slow_wheels' ),
				 'sanitize_callback' => 'sanitize_text'
			) );

			$wp_customize->add_setting( 'landing_page_header_2_setting', array(
				 'default'           => __( 'Default Text', 'slow_wheels' ),
				 'sanitize_callback' => 'sanitize_text'
			) );

			$wp_customize->add_setting( 'landing_page_para_2_setting', array(
				 'default'           => __( 'Default Text', 'slow_wheels' ),
				 'sanitize_callback' => 'sanitize_text'
			) );

			$wp_customize->add_setting( 'landing_page_header_3_setting', array(
				 'default'           => __( 'Default Text', 'slow_wheels' ),
				 'sanitize_callback' => 'sanitize_text'
			) );

			$wp_customize->add_setting( 'landing_page_para_3_setting', array(
				 'default'           => __( 'Default Text', 'slow_wheels' ),
				 'sanitize_callback' => 'sanitize_text'
			) );

			$wp_customize->add_setting( 'landing_page_mission_setting', array(
				 'default'           => __( 'Default Text', 'slow_wheels' ),
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
					'label' => 'Upload Image',
					'description' => __( 'Default image when no one is hovering over a title.' ),
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
					'label'    => __( 'Title 1', 'slow_wheels' ),
					'priority' => 2,
					'description' => __( 'One of three titles.' ),
					'section'  => 'landing_page',
					'settings' => 'landing_page_header_1_setting',
					'type'     => 'text'
			) ) );

			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize, 'landing_page_para_1', array(
		      'label'    => __( 'Paragraph 1', 'slow_wheels' ),
					'priority' => 3,
					'description' => __( 'One of three paragraphs. Revealed when user hovers over a title.' ),
		      'section'  => 'landing_page',
		      'settings' => 'landing_page_para_1_setting',
		      'type'     => 'textarea'
			) ) );

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'landing_page_image_1', array(
					'label' => 'Upload Image',
					'description' => __( 'Image when we are hovering over title 1.' ),
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
					'label'    => __( 'Title 2', 'slow_wheels' ),
					'priority' => 5,
					'description' => __( 'One of three titles.' ),
					'section'  => 'landing_page',
					'settings' => 'landing_page_header_2_setting',
					'type'     => 'text'
			) ) );

			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize, 'landing_page_para_2', array(
		      'label'    => __( 'Paragraph 2', 'slow_wheels' ),
					'priority' => 6,
					'description' => __( 'One of three paragraphs. Revealed when user hovers over a title.' ),
		      'section'  => 'landing_page',
		      'settings' => 'landing_page_para_2_setting',
		      'type'     => 'textarea'
			) ) );

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'landing_page_image_2', array(
					'label' => 'Upload Image',
					'description' => __( 'Image when we are hovering over title 2.' ),
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
					'label'    => __( 'Title 3', 'slow_wheels' ),
					'priority' => 8,
					'description' => __( 'One of three titles.' ),
					'section'  => 'landing_page',
					'settings' => 'landing_page_header_3_setting',
					'type'     => 'text'
			) ) );

			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize, 'landing_page_para_3', array(
		      'label'    => __( 'Paragraph 3', 'slow_wheels' ),
					'priority' => 9,
					'description' => __( 'One of three landing page paragraphs. Revealed on Title hover.' ),
		      'section'  => 'landing_page',
		      'settings' => 'landing_page_para_3_setting',
		      'type'     => 'textarea'
			) ) );

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'landing_page_image_3', array(
					'label' => 'Upload Image',
					'description' => __( 'Image when we are hovering over title 3.' ),
					'priority' => 10,
					'section'  => 'landing_page',
					'settings' => 'landing_page_img_3_setting',
					'button_labels' => array(// All These labels are optional
											'select' => 'Select Image',
											'remove' => 'Remove Image',
											'change' => 'Change Image',
			) ) ) );

			/* MISSION */
			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize, 'wfa_mission', array(
		      'label'    => __( 'WFA Mission Statement', 'slow_wheels' ),
					'priority' => 11,
		      'section'  => 'landing_page',
		      'settings' => 'landing_page_mission_setting',
		      'type'     => 'textarea'
			) ) );

			////////////////////////////// END LANDING PAGE //////////////////////////////

			////////////////////////////// BOOKING PAGE //////////////////////////////

			$wp_customize->add_section('booking_page' , array(
					'title'    => __('Booking Page','slow_wheels'),
					'panel'    => 'slow_wheels_panel',
					'priority' => 2
			) );

			/**************************** SETTINGS ****************************/
			$wp_customize->add_setting( 'booking_page_subtitle_setting', array(
				 'default'           => __( 'Default Text', 'slow_wheels' ),
				 'sanitize_callback' => 'sanitize_text'
			) );

			$wp_customize->add_setting( 'booking_page_instruction_setting', array(
				 'default'           => __( 'Default Text', 'slow_wheels' ),
				 'sanitize_callback' => 'sanitize_text'
			) );

			$wp_customize->add_setting( 'booking_page_hero_setting', array(
					'default' => get_theme_file_uri('assets/defaults/images/landing_image_1.jpg'), // Add Default Image URL
					'sanitize_callback' => 'esc_url_raw'
			) );

			/**************************** CONTROLS ****************************/

			/* HERO IMAGE */
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'booking_page_hero', array(
					'label' => 'Hero Image',
					'description' => __( 'Large image at the top of the page.' ),
					'priority' => 3,
					'section' => 'booking_page',
					'settings' => 'booking_page_hero_setting',
					'button_labels' => array(// All These labels are optional
											'select' => 'Select Image',
											'remove' => 'Remove Image',
											'change' => 'Change Image',
			) ) ) );

		/* STRAPLINE */
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize, 'booking_strapline', array(
	      'label'    => __( 'Booking Page Subtitle.', 'slow_wheels' ),
				'description' => __( 'Subtitle below the page title.' ),
				'priority' => 1,
				'section' => 'booking_page',
	      'settings' => 'booking_page_subtitle_setting',
	      'type'     => 'text'
		) ) );

		/* INSTRUCTION */
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize, 'booking_instruction', array(
	      'label'    => __( 'Booking instructions', 'slow_wheels' ),
				'description' => __( 'A single paragraph immediately above the booking form. ' ),
				'priority' => 2,
				'section' => 'booking_page',
	      'settings' => 'booking_page_instruction_setting',
	      'type'     => 'textarea'
		) ) );

		////////////////////////////// END BOOKING PAGE //////////////////////////////

		////////////////////////////// GALLERY PAGE //////////////////////////////

		$wp_customize->add_section('gallery_page' , array(
				'title'    => __('Gallery Page','slow_wheels'),
				'panel'    => 'slow_wheels_panel',
				'priority' => 3
		) );

		/**************************** SETTINGS ****************************/
		$wp_customize->add_setting( 'gallery_page_subtitle_setting', array(
			 'default'           => __( 'Default Text', 'slow_wheels' ),
			 'sanitize_callback' => 'sanitize_text'
		) );

		$wp_customize->add_setting( 'gallery_page_instruction_setting', array(
			 'default'           => __( 'Default Text', 'slow_wheels' ),
			 'sanitize_callback' => 'sanitize_text'
		) );

		$wp_customize->add_setting( 'gallery_page_hero_setting', array(
				'default' => get_theme_file_uri('assets/defaults/images/landing_image_1.jpg'), // Add Default Image URL
				'sanitize_callback' => 'esc_url_raw'
		) );

		/**************************** CONTROLS ****************************/

		/* HERO IMAGE */
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'gallery_page_hero', array(
				'label' => 'Hero Image',
				'description' => __( 'Large image at the top of the page.' ),
				'priority' => 3,
				'section' => 'gallery_page',
				'settings' => 'gallery_page_hero_setting',
				'button_labels' => array(// All These labels are optional
										'select' => 'Select Image',
										'remove' => 'Remove Image',
										'change' => 'Change Image',
		) ) ) );

	/* STRAPLINE */
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize, 'gallery_strapline', array(
			'label'    => __( 'Gallery Page Subtitle.', 'slow_wheels' ),
			'description' => __( 'Subtitle below the page title.' ),
			'priority' => 1,
			'section' => 'gallery_page',
			'settings' => 'gallery_page_subtitle_setting',
			'type'     => 'text'
	) ) );

	/* INSTRUCTION */
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize, 'gallery_instruction', array(
			'label'    => __( 'Gallery blurb', 'slow_wheels' ),
			'description' => __( 'A single paragraph immediately above the image gallery. ' ),
			'priority' => 2,
			'section' => 'gallery_page',
			'settings' => 'gallery_page_instruction_setting',
			'type'     => 'textarea'
	) ) );

	////////////////////////////// END GALLERY PAGE //////////////////////////////


	////////////////////////////// CONTACT PAGE //////////////////////////////

	$wp_customize->add_section('contact_page' , array(
			'title'    => __('Contact Page','slow_wheels'),
			'panel'    => 'slow_wheels_panel',
			'priority' => 4
	) );

	/**************************** SETTINGS ****************************/
	$wp_customize->add_setting( 'contact_page_subtitle_setting', array(
		 'default'           => __( 'Default Text', 'slow_wheels' ),
		 'sanitize_callback' => 'sanitize_text'
	) );

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

	/* STRAPLINE */
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, 'contact_strapline', array(
		'label'    => __( 'Contact Page Subtitle.', 'slow_wheels' ),
		'description' => __( 'Subtitle below the page title.' ),
		'priority' => 1,
		'section' => 'contact_page',
		'settings' => 'contact_page_subtitle_setting',
		'type'     => 'text'
	) ) );

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
