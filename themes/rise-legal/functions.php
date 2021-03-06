<?php
/**
 * Rise Legal Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
*
 * @package Rise_Legal_theme
 */

if ( ! function_exists( 'rise_legal_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function rise_legal_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html( 'Primary Menu' ),
	) );

	// Switch search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif; // rise_legal_setup
add_action( 'after_setup_theme', 'rise_legal_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function rise_legal_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rise_legal_content_width', 640 );
}
add_action( 'after_setup_theme', 'rise_legal_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rise_legal_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html( 'Sidebar' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rise_legal_widgets_init' );

/**
 * Filter the stylesheet_uri to output the minified CSS file.
 */
function rise_legal_minified_css( $stylesheet_uri, $stylesheet_dir_uri ) {
	if ( file_exists( get_template_directory() . '/build/css/style.min.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	}

	return $stylesheet_uri;
}
add_filter( 'stylesheet_uri', 'rise_legal_minified_css', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function rise_legal_scripts() {
	wp_enqueue_style( 'rise-legal-style', get_stylesheet_uri() );

	wp_enqueue_script('jquery', get_template_directory_uri() . '/node_modules/jquery/jquery.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('main.js', get_template_directory_uri() . '/build/js/main.min.js', array('jquery'), false, true);
	
	wp_enqueue_script( 'rise-legal-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20130115', true );
	
	wp_enqueue_script('rise-legal-font-awesome', 'https://use.fontawesome.com/d51ac7c865.js', array(), '4.6.3', false);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}	
add_action( 'wp_enqueue_scripts', 'rise_legal_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

//for gravity forms when clicking previous/next/submit button, page view goes back to the top
add_filter( 'gform_confirmation_anchor', '__return_true' );

// adds active class to main menu for current page: http://stackoverflow.com/questions/26789438/how-to-add-active-class-to-wp-nav-menu-current-menu-item-simple-way

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'nav-active';
    }
    return $classes;
}


