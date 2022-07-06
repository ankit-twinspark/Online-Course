<?php
/**
 * online-course functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package online-course
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function online_course_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on online-course, use a find and replace
		* to change 'online-course' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'online-course', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'online-course' ),
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
			'online_course_custom_background_args',
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
add_action( 'after_setup_theme', 'online_course_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function online_course_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'online_course_content_width', 640 );
}
add_action( 'after_setup_theme', 'online_course_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function online_course_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'online-course' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'online-course' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'online_course_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function online_course_scripts() {
	wp_enqueue_style( 'online-course-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'online-course-style', 'rtl', 'replace' );

	wp_enqueue_script( 'online-course-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'online_course_scripts' );

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

// post type- Subjects 

add_action( 'init', 'create_custom_post_type' );
function create_custom_post_type() {
$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);

$labels = array(
'name' => _x('Subjects', 'plural'),
'singular_name' => _x('Subject', 'singular'),
'menu_name' => _x('Subjects', 'admin menu'),
'name_admin_bar' => _x('Subjects', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => _('Add New Subjects'),
'new_item' => ('New Subjects'),
'edit_item' => ('Edit Subjects'),
'view_item' => ('View Subjects'),
'view_item' => ('View Subjects'),
'all_items' => ('All Subjects'),
'search_items' => ('Search Subjects'),
'hierarchical' => true,

);

$args = array(
    'supports' => $supports,
  'labels' => $labels,
  'public' => true,
  'has_archive' => false,
  'rewrite' => array('slug' => 'subjects'),
  'taxonomies' => false,
  'show_ui' => true,
 );
 }
register_post_type( 'subjects',$args);






// post type- Courses 


	add_action( 'init', 'create_Courses_post_type' );
 
function create_Courses_post_type() {
$supports = array(

'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);

$labels = array(
'name' => _x('Courses', 'plural'),
'singular_name' => _x('Course', 'singular'),
'menu_name' => _x('Courses', 'admin menu'),
'name_admin_bar' => _x('Courses', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => _('Add New Courses'),
'new_item' => ('New Courses'),
'edit_item' => ('Edit Courses'),
'view_item' => ('View Courses'),
'view_item' => ('View Courses'),
'all_items' => ('All Courses'),
'search_items' => ('Search Courses'),
'hierarchical' => true,

);
 
$args = array(
    'supports' => $supports,
  'labels' => $labels,
  'public' => true,
  'has_archive' => false,
  'rewrite' => array('slug' => 'Courses'),
  'taxonomies' => false,
  'show_ui' => true,
 );
 
register_post_type( 'Courses',$args);
}

// post type- Teachers 


	add_action( 'init', 'create_Teachers_post_type' );
 
function create_Teachers_post_type() {
$supports = array(

'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);

$labels = array(
'name' => _x('Teachers', 'plural'),
'singular_name' => _x('Teacher', 'singular'),
'menu_name' => _x('Teachers', 'admin menu'),
'name_admin_bar' => _x('Teachers', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => _('Add New Teachers'),
'new_item' => ('New Teachers'),
'edit_item' => ('Edit Teachers'),
'view_item' => ('View Teachers'),
'view_item' => ('View Teachers'),
'all_items' => ('All Teachers'),
'search_items' => ('Search Teachers'),
'hierarchical' => true,

);
 
$args = array(
    'supports' => $supports,
  'labels' => $labels,
  'public' => true,
  'has_archive' => false,
  'rewrite' => array('slug' => 'Teachers'),
  'taxonomies' => false,
  'show_ui' => true,
 );
 
register_post_type( 'Teachers',$args);
}

// post type- Testimonial 


	add_action( 'init', 'create_Testimonial_post_type' );
 
function create_Testimonial_post_type() {
$supports = array(

'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);

$labels = array(
'name' => _x('Testimonial', 'plural'),
'singular_name' => _x('Testimonial', 'singular'),
'menu_name' => _x('Testimonial', 'admin menu'),
'name_admin_bar' => _x('Testimonial', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => _('Add New Testimonial'),
'new_item' => ('New Testimonial'),
'edit_item' => ('Edit Testimonial'),
'view_item' => ('View Testimonial'),
'view_item' => ('View Testimonial'),
'all_items' => ('All Testimonial'),
'search_items' => ('Search Testimonial'),
'hierarchical' => true,

);
 
$args = array(
    'supports' => $supports,
  'labels' => $labels,
  'public' => true,
  'has_archive' => false,
  'rewrite' => array('slug' => 'Testimonial'),
  'taxonomies' => false,
  'show_ui' => true,
 );

 }
register_post_type( 'Testimonial',$args);

// custom field




