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

/*********************** LANDING PAGE *************************************/

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

			/**************************** CONTROLS ****************************/

			/* BLOCK 1 */
			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize, 'landing_page_header_1', array(
					'label'    => __( 'Title 1', 'slow_wheels' ),
					'priority' => 1,
					'description' => __( 'One of three landing page headers.' ),
					'section'  => 'landing_page',
					'settings' => 'landing_page_header_1_setting',
					'type'     => 'text'
			) ) );

			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize, 'landing_page_para_1', array(
		      'label'    => __( 'Paragraph 1', 'slow_wheels' ),
					'priority' => 2,
					'description' => __( 'One of three landing page paragraphs. Revealed on Title hover.' ),
		      'section'  => 'landing_page',
		      'settings' => 'landing_page_para_1_setting',
		      'type'     => 'textarea'
			) ) );

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'landing_page_image_1', array(
					'label' => 'Upload Image',
					'priority' => 3,
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
					'priority' => 4,
					'description' => __( 'One of three landing page headers.' ),
					'section'  => 'landing_page',
					'settings' => 'landing_page_header_2_setting',
					'type'     => 'text'
			) ) );

			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize, 'landing_page_para_2', array(
		      'label'    => __( 'Paragraph 2', 'slow_wheels' ),
					'priority' => 5,
					'description' => __( 'One of three landing page paragraphs. Revealed on Title hover.' ),
		      'section'  => 'landing_page',
		      'settings' => 'landing_page_para_2_setting',
		      'type'     => 'textarea'
			) ) );

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'landing_page_image_2', array(
					'label' => 'Upload Image',
					'priority' => 6,
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
					'priority' => 7,
					'description' => __( 'One of three landing page headers.' ),
					'section'  => 'landing_page',
					'settings' => 'landing_page_header_3_setting',
					'type'     => 'text'
			) ) );

			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize, 'landing_page_para_3', array(
		      'label'    => __( 'Paragraph 3', 'slow_wheels' ),
					'priority' => 8,
					'description' => __( 'One of three landing page paragraphs. Revealed on Title hover.' ),
		      'section'  => 'landing_page',
		      'settings' => 'landing_page_para_3_setting',
		      'type'     => 'textarea'
			) ) );

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'landing_page_image_3', array(
					'label' => 'Upload Image',
					'priority' => 9,
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
					'priority' => 10,
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
				'priority' => 2
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


	////////////////////////////// contact PAGE //////////////////////////////

	$wp_customize->add_section('contact_page' , array(
			'title'    => __('contact Page','slow_wheels'),
			'panel'    => 'slow_wheels_panel',
			'priority' => 2
	) );

	/**************************** SETTINGS ****************************/
	$wp_customize->add_setting( 'contact_page_subtitle_setting', array(
		 'default'           => __( 'Default Text', 'slow_wheels' ),
		 'sanitize_callback' => 'sanitize_text'
	) );

	$wp_customize->add_setting( 'contact_page_instruction_setting', array(
		 'default'           => __( 'Default Text', 'slow_wheels' ),
		 'sanitize_callback' => 'sanitize_text'
	) );

	$wp_customize->add_setting( 'contact_page_hero_setting', array(
			'default' => get_theme_file_uri('assets/defaults/images/landing_image_1.jpg'), // Add Default Image URL
			'sanitize_callback' => 'esc_url_raw'
	) );

	/**************************** CONTROLS ****************************/

	/* HERO IMAGE */
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'contact_page_hero', array(
			'label' => 'Hero Image',
			'description' => __( 'Large image at the top of the page.' ),
			'priority' => 3,
			'section' => 'contact_page',
			'settings' => 'contact_page_hero_setting',
			'button_labels' => array(// All These labels are optional
									'select' => 'Select Image',
									'remove' => 'Remove Image',
									'change' => 'Change Image',
	) ) ) );

	/* STRAPLINE */
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, 'contact_strapline', array(
		'label'    => __( 'contact Page Subtitle.', 'slow_wheels' ),
		'description' => __( 'Subtitle below the page title.' ),
		'priority' => 1,
		'section' => 'contact_page',
		'settings' => 'contact_page_subtitle_setting',
		'type'     => 'text'
	) ) );

	/* INSTRUCTION */
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, 'contact_instruction', array(
		'label'    => __( 'contact blurb', 'slow_wheels' ),
		'description' => __( 'A single paragraph immediately above the image contact. ' ),
		'priority' => 2,
		'section' => 'contact_page',
		'settings' => 'contact_page_instruction_setting',
		'type'     => 'textarea'
	) ) );

	////////////////////////////// END contact PAGE //////////////////////////////

	// Sanitize text
	function sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}

}

add_action( 'customize_register', 'slow_wheels_register_theme_customizer');


function featured_image_gallery_customize_register( $wp_customize ) {
	if ( ! class_exists( 'CustomizeImageGalleryControl\Control' ) ) {
		return;
	}

	$wp_customize->add_section('gallery_page' , array(
			'title'    => __('Bike Gallery Page','slow_wheels'),
			'panel'    => 'slow_wheels_panel',
			'priority' => 3
	) );


	$wp_customize->add_setting( 'gallery_page_setting', array(
			'default' => array(),
			'sanitize_callback' => 'wp_parse_id_list',
	) );

	$wp_customize->add_control( new CustomizeImageGalleryControl\Control(
			$wp_customize, 'gallery_page_setting', array(
				'label'    => __( 'Image Gallery Field Label' ),
				'section'  => 'gallery_page',
				'settings' => 'gallery_page_setting',
				'type'     => 'image_gallery'
		) ) );
	}
	add_action( 'customize_register', 'featured_image_gallery_customize_register' );
