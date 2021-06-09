<?php
/**
 * slow wheels functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package slow_wheels
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	// Get version from style.css file
	$theme_version = wp_get_theme() -> get( 'Version' ) ;
	define( '_S_VERSION', $theme_version );
}


// Define Theme Directory URI
define( 'slow_wheels_uri', get_template_directory_uri() . '/' );


// slow_wheels_uri is defined in /functions.php

// Define Theme JS Directory URI
define( 'slow_wheels_js', slow_wheels_uri . 'assets/js/' );

// Define Theme CSS Directory URI
define( 'slow_wheels_css', slow_wheels_uri . 'assets/css/' );

// require( 'framework/functions/slow-wheels-enqueue.php') ;

/* loading from framework/functions/slow-wheels-enqueue.php stops webba form loading on page ... ? */

/**
 * Enqueue styles.
 */
function slow_wheels_register_styles() {

	wp_enqueue_style( 'animate-on-scroll', 'https://unpkg.com/aos@next/dist/aos.css' );

	wp_enqueue_style( 'fontawesome-free-5.11.2-web', 'https://pro.fontawesome.com/releases/v5.10.0/css/all.css' ) ;

	wp_enqueue_style( 'Quicksand-font', 'https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap' );

	wp_enqueue_style( 'slow-wheels', get_stylesheet_uri(), array(), _S_VERSION , 'all' );

	wp_style_add_data( 'slow-wheels', 'rtl', 'replace' );

}

add_action( 'wp_enqueue_scripts', 'slow_wheels_register_styles' );

/**
 * Enqueue scripts
 * wp_enqueue_script( 'id', slow_wheels_js . 'filename.js', 'version', $in_footer = false/true);
 */
function slow_wheels_register_scripts() {

	wp_enqueue_script( 'slow-wheels-navigation', slow_wheels_js . 'navigation.js', array(), '', true );

	wp_enqueue_script( 'nav-scrolled', slow_wheels_js . 'navBarScroll.js', array(), '', true );

	if ( is_front_page() ) {
	wp_enqueue_script( 'img-swapper', slow_wheels_js . 'img_swapper.js', array(), '', true );
	}

	/* If we have a gallery run the script to ani each image in */
	if ( has_block( 'gallery') ) {
		wp_enqueue_script( 'add-gallery-class', slow_wheels_js . 'gallery_add_class.js', array(), '', true );
	}

	wp_enqueue_script( 'aos-script', 'https://unpkg.com/aos@next/dist/aos.js', array(), '', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'slow_wheels_register_scripts' );

if ( ! function_exists( 'slow_wheels_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function slow_wheels_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on slow wheels, use a find and replace
		 * to change 'slow-wheels' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'slow-wheels', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'slow-wheels' ),
				'Sitemap' => __( 'Sitemap' ),
				'downloadable-content' => __( 'Downloadable Content' )
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'slow_wheels_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;

add_action( 'after_setup_theme', 'slow_wheels_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function slow_wheels_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'slow_wheels_content_width', 640 );
}
add_action( 'after_setup_theme', 'slow_wheels_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function slow_wheels_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'slow-wheels' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'slow-wheels' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'slow_wheels_widgets_init' );

/**
 * Get scripts and styles
 */
#get_template_part( 'framework/functions/slow-wheels-enqueue' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * <?php slow_wheels_sponsor_logos(); ?>
 * see https://make.xwp.co/2016/08/12/image-gallery-control-for-the-customizer/
 */
function slow_wheels_sponsor_logos( $atts = array() ) {
    $setting_id = 'featured_image_gallery';
    $ids_array = get_theme_mod( $setting_id );
    if ( is_array( $ids_array ) && ! empty( $ids_array ) ) {
        $atts['ids'] = implode( ' ', $ids_array );
        echo gallery_shortcode( $atts );
    }
}

// Change admin login image to site logo
function slow_wheels_login_logo() {
	$logo = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $logo , 'full' );
	$image_url = $image[0];
	?>
  <style type="text/css">
		#login h1 a,
		.login h1 a {
			display: inline-block;
    	background-image: url( <?php	echo $image_url ?> );
			background-repeat: no-repeat;
    }
  </style>
	<?php
}
add_action( 'login_enqueue_scripts', 'slow_wheels_login_logo' );


// Change admin dashboard Posts to News
// function slow_wheels_change_post_object() {
//     $get_post_type = get_post_type_object('post');
//     $labels = $get_post_type->labels;
//         $labels->name = 'News';
//         $labels->singular_name = 'News';
//         $labels->add_new = 'Add News';
//         $labels->add_new_item = 'Add News';
//         $labels->edit_item = 'Edit News';
//         $labels->new_item = 'News';
//         $labels->view_item = 'View News';
//         $labels->search_items = 'Search News';
//         $labels->not_found = 'No News found';
//         $labels->not_found_in_trash = 'No News found in Trash';
//         $labels->all_items = 'All News';
//         $labels->menu_name = 'News';
//         $labels->name_admin_bar = 'News';
// }
#add_action( 'init', 'slow_wheels_change_post_object' );

// Truncate post thumb text, use `echo $slow_wheels_post_excerpt(30)` in place of the_excerpt()
function slow_wheels_post_excerpt( $limit ) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (
		count( $excerpt )>= $limit ) {
    array_pop( $excerpt );
    $excerpt = implode(" ",$excerpt).'...';

	} else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

// Truncate post thumb text, use `echo $slow_wheels_page_content(30)` in place of the_content()
function slow_wheels_page_content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]>', $content);
  return $content;
}

#if( ! function_exists( 'slow_wheels_comments' ) ) {
/**
 * Template for comments and pingbacks. Coppied from Fury theme
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own slow_wheels_comments(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since 1.0
 */
function slow_wheels_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) {
    case 'pingback':
    case 'trackback':

    break;
    default: // Normal Comments
      global $post; ?>
      <div id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
			  <div class="comment_author-ava">
           <?php echo get_avatar( $comment, 50 ); ?>
       	</div>

        <div class="comment-body">

					<h4 class="comment_author-name">
						<?php echo get_comment_author(); ?>
						<?php
						// If current post author is also comment author, make it known visually.
						if( $comment->user_id === $post->post_author ) {
							echo '<i class="fa fa-star"></i> ';
						} ?>
					</h4>
          <?php comment_text(); ?>

          <?php if( '0' == $comment->comment_approved ): ?>
          <div class="iziToast iziToast-info">
            <div class="iziToast-body" style="padding-left: 33px;">
              <i class="iziToast-icon icon-flag"></i>
              <strong><?php esc_html_e( 'Info', 'slow_wheels' ); ?></strong>
              <p><?php esc_html_e( 'Your comment is awaiting moderation.', 'slow_wheels' ); ?></p>
            </div>

						<button class="iziToast-close"></button>
          </div>
          <?php endif; ?>


					<div class="comment-footer">
          	<div class="column">
            	<span class="comment-meta">
                <?php
              	printf( '<time datetime="%s">%s</time>', get_comment_time( 'c' ),
                	/* translators: 1: date, 2: time */
                	sprintf( esc_html__( '%1$s at %2$s', 'slow_wheels' ), get_comment_date(), get_comment_time() )
								); ?>
              </span>
            </div>

						<div class="column">
            <?php
            // Comment Reply
            comment_reply_link( array_merge(
            	$args,
							array(
              	'reply_text'    => '<i class="icon-reply"></i>' . esc_html__( 'Reply', 'slow_wheels' ),
                'depth'         => $depth,
                'max_depth'     => $args['max_depth']
              )
            ) );
            // Comment Edit (Administrators)
            edit_comment_link( ' | <i class="fa fa-edit"></i>' . esc_html__( 'Edit', 'slow_wheels' ) ); ?>
          </div>
        </div>
      </div>
    </div>
  <?php
    break;
  }
}
#}

/**
 * Comment Form Defaults, coppied from Fury theme
 *
 * @since 1.0
 */
function slow_wheels_comment_form_defaults( $defaults ) {
    global $current_user;

    $comments['tags_suggestion'] 				= esc_attr( get_theme_mod( 'slow_wheels_comments_tags_suggestion', true ) );

    $defaults['class_form']             = 'sw_comments_form';

    $defaults['title_reply_before']     = '<h4 class="sw_comments_form-title">';
    $defaults['title_reply_after']      = '</h4>';

    $defaults['title_reply']						= sprintf( '%s <span>%s</span>', esc_html__( 'Leave a', 'slow_wheels' ), esc_html__( 'Comment', 'slow_wheels' ) );
    $defaults['logged_in_as']           = '';

    // Comment Textarea
    $defaults['comment_field']          = '<div class="sw_comment_form-text"><div class="form-group"><label for="comment">'. esc_html__( 'Comment', 'slow_wheels' );
    $defaults['comment_field']         .= '</label><textarea class="form-control form-control-rounded" rows="7" id="comment" ';
    $defaults['comment_field']         .= 'name="comment"';
    $defaults['comment_field']         .= 'placeholder="'. esc_attr__( 'Write your comment here...', 'slow_wheels' ) .'" aria-required="true">';
    $defaults['comment_field']         .= '</textarea></div></div>';

    // Comment Submit Button
    $defaults['submit_button']          = '<div class="sw_comment_submit"><input name="submit" type="submit" ';
    $defaults['submit_button']         .= 'class="sw_comment_submit-btn" value="'. esc_attr__( 'Post Comment', 'slow_wheels' ) .'">';
    $defaults['submit_button']         .= '</div>';

    $defaults['comment_notes_before']   = '';

    return $defaults;
}
add_filter( 'comment_form_defaults', 'slow_wheels_comment_form_defaults' );

/**
 * Comment Form Fields, coppied from Fury theme
 *
 * @since 1.0
 */
function slow_wheels_comment_form_fields( $fields ) {

    // Get the current commenter if available
    $commenter = wp_get_current_commenter();

    // Core functionality
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html_req = ( $req ? " required='required'" : '' );

    // Comment Author Input
    $fields['author']  = '<div class="sw_comment_form-author"><div class="form-group"><label for="author">'. esc_html__( 'Name', 'slow_wheels' );
    $fields['author'] .= ( $req ? '<span class="required">*</span>' : '' );
    $fields['author'] .= '</label><input id="author" name="author" type="text" class="form-control form-control-rounded" ';
    $fields['author'] .= 'value="'. esc_attr( $commenter['comment_author'] ) .'" placeholder="'. esc_attr__( 'Name', 'slow_wheels' ) .'">';
    $fields['author'] .= '</div></div>';

    // Comment Email Input
    $fields['email']  = '<div class="sw_comment_form-author"><div class="form-group"><label for="email">'. esc_html__( 'Email', 'slow_wheels' );
    $fields['email'] .= ( $req ? '<span class="required">*</span>' : '' );
    $fields['email'] .= '</label><input id="email" name="email" type="text" class="form-control form-control-rounded" ';
    $fields['email'] .= 'value="'. esc_attr(  $commenter['comment_author_email'] ) .'" placeholder="'. esc_attr__( 'Email', 'slow_wheels' ) .'">';
    $fields['email'] .= '</div></div>';

    // Comment URL Input
    $fields['url'] = '';

    return $fields;
}
add_filter( 'comment_form_default_fields', 'slow_wheels_comment_form_fields' );

/**
 * Move Comment Textarea to Bottom, coppied from Fury theme
 *
 * @since 1.0
 */
function slow_wheels_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];

    unset( $fields['comment'] );

    $fields['comment'] = $comment_field;

    return $fields;
}
add_filter( 'comment_form_fields', 'slow_wheels_move_comment_field_to_bottom' );
