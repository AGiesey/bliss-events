<?php
/**
* functions.php for Bliss Events Wordpress Theme
*
*
*/
// Turn on error reporting for dev
// TODO: Remove below lines once development is complete
ini_set('display_errors', 'on');
error_reporting(E_ALL);

add_theme_support( 'post-thumbnails' );

function bliss_enqueue_styles_and_scripts()
{
	wp_enqueue_style( 'normalise', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css', array(), '3.0.3', 'all');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/inc/bootstrap-3.3.6/css/bootstrap.css', array(), '3.3.6', 'all');
	wp_enqueue_style( 'blissStyle', get_template_directory_uri() . '/css/bliss_main.css', array(), '1.0.0', 'all' );
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js', array(), '3.3.6', true);

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/inc/bootstrap-3.3.6/js/bootstrap.js', array(), '3.3.6', true);
	wp_enqueue_script( 'blissScript', get_template_directory_uri() . '/js/bliss_main.js', array('jquery'), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'bliss_enqueue_styles_and_scripts' );

function bliss_register_menus()
{
	register_nav_menu('header-menu',__( 'Header Menu'));	
}
add_action( 'init', 'bliss_register_menus' );

/**
 * Add basic container shortcodes
 *
 */

//[row]
function bliss_row( $atts, $content = null )
{
	return '<div class="row reveal-div"'.$atts.'>' . do_shortcode($content) . '</div>';
}
add_shortcode( 'row', 'bliss_row');

//[col-12]
function bliss_12( $atts, $content = null )
{
	return '<div class="col-xs-12 reveal-div">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'one_whole', 'bliss_12');

//[col-6]
function bliss_6( $atts, $content = null )
{
	return '<div class="col-xs-12 col-sm-6 reveal-div">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'one_half', 'bliss_6');

//[col-4]
function bliss_3( $atts, $content = null )
{
	return '<div class="col-xs-12 col-sm-6 col-md-3 reveal-div text-center">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'one_quarter', 'bliss_3');

function bliss_row_align_center( $atts, $content = null )
{
	return '<div class="row reveal-div text-center">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'row_content_center', 'bliss_row_align_center');

//[col-12]
function bliss_12_align_center( $atts, $content = null )
{
	return '<div class="col-xs-12 reveal-div text-center">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'one_whole_content_center', 'bliss_12_align_center');

//[col-6]
function bliss_6_align_center( $atts, $content = null )
{
	return '<div class="col-xs-12 col-sm-6 reveal-div text-center">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'one_half_content_center', 'bliss_6_align_center');

//[col-4]
function bliss_3_align_center( $atts, $content = null )
{
	return '<div class="col-xs-12 col-sm-6 col-md-3 reveal-div text-center">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'one_quarter_content_center', 'bliss_3_align_center');

/**
 * Doesn't work. 
 * TODO: Figure out how this had worked in the seatadvisor theme, when I get a chance.
 * TODO: Remove align_center shortcodes after I figure out how to add more classes to shortcodes
 */

// function bliss_add_class_attrs( $atts )
// {
// 	$atts = shortcode_atts(
// 			array(
// 					'class' => 'class'
// 				), $atts );
// 	return 'class="'. $atts['class'] . '"';
// }
// add_shortcode( 'class', 'bliss_add_class_attrs');



/**
 * Custom post types
 * TODO: Implement custom post types
 */
// function bliss_team_member_post()
// {
// 	// labels - define the name of the post type in both plural and singular
// 	// public - show post types on admin screens and make it show up on the site content it's self
// 	register_post_type( 
// 		'team_member',

// 	);
// }

// //Custom post types must be initialized before admin_menu and after after_setup_theme
// add_action( 'init', 'bliss_team_member_post');

/**
 * Theme menu
 * TODO: Add widget configuration to this menu
 * TODO: Add custom post types to this menu
 * TODO: Add theme help context to home page of this menu
 *            - How to use the shortcodes
 *            - How to add or remove custom posts (employee, reviews)
 *            - How to add or remove photos from home slideshow
 */

function bliss_add_menu(){

	// add menu items. menu slug is the file that will be opened
	add_menu_page( 'Bliss Theme Settings', 'Bliss Theme', 'manage_options', 'bliss_admin_home', 'bliss_admin_content', '', 90);
}
add_action( 'admin_menu', 'bliss_add_menu' );

function bliss_admin_content( $capability )
{
	echo '<h1>Bliss Events Theme Settings</h1>';
}

/**
 * Custom Dashboard
 */

// This is not top priority, I think the above bliss menu will be a better place to add all of the custom functionality.
// Still use this as a bonus to add some cool data about the site - if there ends up being time.
function bliss_customize_dashboard(){
	global $menu;
	global $submenu;

	//print_r($menu);
	
	// Remove unwanted widgets and pannels
	remove_meta_box(
			'dashboard_quick_press', 'dashboard', 'side'
		);


	remove_action ( 'welcome_panel', 'wp_welcome_panel');
	
	// Add our own cooler widgets
	wp_add_dashboard_widget(
			'bliss_test_dashboard_widget', //ID
			'Google Analytics', //Title
			'google_analytics_widget_function' //Callback (function that is called)
		);
} 
add_action( 'wp_dashboard_setup', 'bliss_customize_dashboard');

function google_analytics_widget_function() 
{
	echo "I am going to put Google Analytics Data here";
}


/**
 * Widget Areas
 */
function bliss_widgets_init() {
	register_sidebar( array(
		'name'          => 'Home Reviews Widget',
		'id'            => 'home_reviews',
		'description'   => __( 'Add a review to your home page', 'blissevents' ),
		'before_widget' => '<div class="reveal-div">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">'
	) );

	register_sidebar( array(
		'name'          => 'Home Call to Action Widget',
		'id'            => 'home_widget_2',
		'description'   => __( 'Add a graphic, call to action, honors and press or all three.', 'blissevents' ),
		'before_widget' => '<div class="reveal-div">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bliss_widgets_init' );






