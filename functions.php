<?php
/**
 * Functions
 * @package BASICTheme
 */
?>

<?php

/**
* Register core functions
*/
require_once('inc/core/functions-core.php');

/**
* Theme Support
*/
function BASICTheme_setup(){
	//---> Register Menus
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'BASICTheme')
	));

	//---> Other theme supports: Post Formats, Post Thumbnails, Automatic Feed Links, Title Tag etc
	//---> https://developer.wordpress.org/reference/functions/add_theme_support/

}
add_action( 'after_setup_theme', 'BASICTheme_setup', 10 );
add_action( 'after_setup_theme', 'BASICTheme_Core_setup', 20 );


/**
* Register Sidebars
*/
function widgets_initiate($id){
  register_sidebar(array(
    'name'  => 'SidebarName',
    'id'    => 'sidebarname',
    'before_widget' => '<aside class="widgetContainer">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widgetTitle">',
    'after_title'   => '</h3>'
  ));
}
add_action('widgets_init', 'widgets_initiate');


/**
 * Enqueue Styles
 */
function all_styles()
{
	//wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	//wp_enqueue_style('font-awesome', '//https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	//google font
	wp_enqueue_style( 'OpenSans', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'all_styles' );


/**
 * Enqueue Javascripts
 * Αν θέλω το Googleapis τρέχω τις συναρτήσεις replace_jquery ΚΑΙ reorder_javascripts
 * Αν θέλω το default jquery τρέχω τις συναρτήσεις remove_jquery_migrate ΚΑΙ reorder_javascripts  (Όπως είναι τώρα ο κώδικας)
 */
//Delete WordPress jQuery and load from Google Library
function replace_jquery() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', false, '3.4.1');
		wp_enqueue_script('jquery');
	}
}
//add_action('init', 'replace_jquery');

//Remove JQuery migrate
function remove_jquery_migrate( $scripts ) {
 if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
	 $script = $scripts->registered['jquery'];
	 if ( $script->deps ) { // Check whether the script has any dependencies
	 	$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
	 }
 }
}
add_action( 'wp_default_scripts', 'remove_jquery_migrate' );

//Reordering Javascripts. Loading: First -> jquery , Second-> bootstrap
function reorder_javascripts() {
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), true );
}
add_action('wp_enqueue_scripts', 'reorder_javascripts');


?>
