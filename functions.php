<?php
/**
 * Adaptable functions and definitions
 *
 * @package Adaptable
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'adaptable_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function adaptable_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Adaptable, use a find and replace
	 * to change 'adaptable' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'adaptable', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'adaptable' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'adaptable_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // adaptable_setup
add_action( 'after_setup_theme', 'adaptable_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function adaptable_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'adaptable' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'adaptable_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function adaptable_scripts() {
	$color_scheme = get_template_directory_uri() . '/' . get_theme_mod('adaptable_color_scheme');

	wp_enqueue_style( 'adaptable-style', get_stylesheet_uri() );

	wp_enqueue_style( 'adaptable-color-scheme', $color_scheme);

	wp_enqueue_script( 'adaptable-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'adaptable-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script('adaptable-rl-scripts', get_template_directory_uri() . '/js/rl_scripts.js', array(), '1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'adaptable_scripts' );

/**
 * Implement the Custom Header feature.
 */
add_theme_support('custom-header');
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/* Override default excerpt behavior */
function adaptable_excerpt_more($more) {
	return '<a class="more-link" href="'. get_permalink( get_the_ID() ) . '">' . __('Continue reading <span class="meta-nav">&rarr;</span>', 'your-text-domain') . '</a>';
}
add_filter('excerpt_more', 'adaptable_excerpt_more');

function adaptable_excerpt_length($length) {
	return 100;
}
add_filter ('excerpt_length', 'adaptable_excerpt_length', 999);

add_theme_support( 'post-thumbnails' ); 
