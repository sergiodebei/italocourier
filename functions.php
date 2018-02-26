<?php
/**
 * Fresh Theme functions and definitions.
 * @package Fresh Theme
 */
if ( ! function_exists( 'italocourier_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function italocourier_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on L\'Oréal Brands, use a find and replace
	 * to change 'italocourier' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'italocourier', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'italocourier' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif;
add_action( 'after_setup_theme', 'italocourier_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function italocourier_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'italocourier' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'italocourier' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'italocourier_widgets_init' );

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'primary' => esc_html__( 'Primary', 'italocourier' )
) );

function change_submenu_class($menu) {
  $menu = preg_replace('/ class="sub-menu"/','/ class="hidden" /',$menu);
  return $menu;
}
add_filter('wp_nav_menu','change_submenu_class');

// function add_menuclass($ulclass) {
//   return preg_replace('/<a /', '<a class="dropdown"', $ulclass, 2);
// }
// add_filter('wp_nav_menu','add_menuclass');

/**
 * Enqueue scripts and styles.
 */
function italocourier_scripts() {

	wp_enqueue_style( 'google-fonts-roboto', 'https://fonts.googleapis.com/css?family=Roboto','', '', '' );
	wp_enqueue_style( 'google-fonts-poppins', 'https://fonts.googleapis.com/css?family=Poppins','', '', '' );
/*	wp_enqueue_style( 'italocourier-font-awesome-style', get_template_directory_uri(). '/css/css_vendor/font-awesome.css');*/
	wp_enqueue_style( 'italocourier-caldera', get_template_directory_uri(). '/css/css_vendor/caldera-forms-front.min.css');
	wp_enqueue_style( 'italocourier-font-awesome-style', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');
	wp_enqueue_style( 'italocourier-style', get_stylesheet_uri() );

	// name-of-the-script, url-of-the-script, array-of-script-the-script-depends-on, script-version-number, if-the-script-needs-to-be-placed-before-the-end-of-the-body


	wp_enqueue_script( 'italocourier-jquery', get_template_directory_uri() . '/js/js_vendor/jquery-3.2.1.min.js', array(), '', '' );
	wp_enqueue_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyA-jL63KfIeAoF5sd7QsX2kwtnuVVMXHYM', '', '', '' );
	wp_enqueue_script( 'weatherjs', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.simpleWeather/3.1.0/jquery.simpleWeather.min.js', '', '', '' );
	wp_enqueue_script( 'italocourier-main', get_template_directory_uri() . '/js/main.js', array(), '', true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'italocourier_scripts' );

/**
 * Remove the slug from published post permalinks. Only affect our custom post type, though.
 */
function gp_remove_cpt_slug( $post_link, $post, $leavename ) {

    if ( 'custom_link' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}
add_filter( 'post_type_link', 'gp_remove_cpt_slug', 10, 3 );

/**
 * Have WordPress match postname to any of our public post types (post, page, race)
 * All of our public post types can have /post-name/ as the slug, so they better be unique across all posts
 * By default, core only accounts for posts and pages where the slug is /post-name/
 */
function gp_parse_request_trick( $query ) {

    // Only noop the main query
    if ( ! $query->is_main_query() )
        return;

    // Only noop our very specific rewrite rule match
    if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }

    // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'page', 'custom_link' ) );
    }
}
add_action( 'pre_get_posts', 'gp_parse_request_trick' );
