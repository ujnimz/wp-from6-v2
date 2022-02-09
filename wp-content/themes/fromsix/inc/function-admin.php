<?php
/**
 * The main template file function-admin.php
 *
 * This is a custom WordPress theme developed by Ujith Nimantha
 * Developed for From6 Communications W.L.L. - Kingdom of Bahrain.
 * HTML Design and development by Ujith Nimantha
 * 2018
 * @link https://from6.com/
 *
 * @package WordPress (Version 4.9.8)
 * @subpackage fromsix
 * @since 1.0
 * @version 1.0
 */


/**
	===========================
	Adding Theme Support
	===========================
**/

// Activate Custom Menus
function fromsix_theme_support() {
	add_theme_support('menus');
	
	register_nav_menu('primary', 'Primary Header Navigation');
	register_nav_menu('footer', 'Footer Navigation');
}

add_action('init', 'fromsix_theme_support');


// Add Basic Theme Support
add_theme_support('custom-background');
add_theme_support('post-thumbnails');

// Add active class to nav
function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);


/**
	===========================
	Add Custom Post Type
	===========================
**/

// Add Testimonials
function fromsix_testimonials() {
	register_post_type( 'testimonial', array(
	  'labels' => array(
		'name' => 'Testimonials',
		'singular_name' => 'Testimonial',
	   ),
	  'description' => 'Testimonials from clients.',
	  'public' => true,
	  'menu_position' => 20,
	  'menu_icon' => 'dashicons-format-quote',
	  'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' )
	));
}

add_action( 'init', 'fromsix_testimonials' );

// Add Services
function fromsix_services() {
	register_post_type( 'service', array(
	  'labels' => array(
		'name' => 'Services',
		'singular_name' => 'Service',
	   ),
	  'description' => 'Add services.',
	  'public' => true,
	  'menu_position' => 21,
	  'menu_icon' => 'dashicons-share-alt',
	  'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' )
	));
}

add_action( 'init', 'fromsix_services' );

// Add Works
function fromsix_works() {
	register_post_type( 'work', array(
	  'labels' => array(
		'name' => 'Works',
		'singular_name' => 'Work',
	   ),
	  'description' => 'Add works.',
	  'public' => true,
	  'menu_position' => 21,
	  'menu_icon' => 'dashicons-portfolio',
	  'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' )
	));
}

add_action( 'init', 'fromsix_works' );

// Ad Works Category Support
function fromsix_works_taxonomy() {

    register_taxonomy(
        'work-category',
        'work',
        array(
            'label' => __( 'Category' ),
            'rewrite' => array( 'slug' => 'work-category' ),
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'fromsix_works_taxonomy' );


/**
	===========================
	Head fucntions
	===========================
**/
// Remove WP version from meta tags in header
function fromsix_remove_wp_version() {
	return '';
}

add_filter('the_generator', 'fromsix_remove_wp_version');



/**
	===========================
	Other fucntions
	===========================
**/

// Add class to a tag in navigation links
function fromsix_primary_menu_a_class( $atts, $item, $args ) {
    $class = 'non-smoothscroll'; // or something based on $item
    $atts['class'] = $class;
    return $atts;
}

add_filter( 'nav_menu_link_attributes', 'fromsix_primary_menu_a_class', 10, 3 );


/**
	===========================
	ACF fucntions
	===========================
**/
// Add Options page
if( function_exists('acf_add_options_page') ) {
 	
 	// add Settings parent
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'From6 General Settings',
		'menu_title' 	=> 'From6 Settings',
		'icon_url' => get_template_directory_uri() . '/assets/images/settings-work-tool.png',
		'redirect' 		=> false
	));

	// add Appearance sub page
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Appearance',
		'menu_title' 	=> 'Appearance',
		'parent_slug' 	=> $parent['menu_slug'],
	));

	// add Miscellaneous sub page
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Miscellaneous',
		'menu_title' 	=> 'Miscellaneous',
		'parent_slug' 	=> $parent['menu_slug'],
	));

}

add_filter('acf/format_value/type=text', 'do_shortcode');


// Google Maps API Key
function my_acf_init() {
	acf_update_setting('google_api_key', get_field('google_maps_api_key', 'option') );
}

add_action('acf/init', 'my_acf_init');