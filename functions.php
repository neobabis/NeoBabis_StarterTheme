<?php
/**
 * Functions
 * @package NeoBabis_StarterTheme
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
function NeoBabis_StarterTheme_setup(){
	//---> Register Menus
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'NeoBabis_StarterTheme')
	));
}
add_action( 'after_setup_theme', 'NeoBabis_StarterTheme_setup', 10 );
add_action( 'after_setup_theme', 'NeoBabis_StarterTheme_Core_setup', 20 );


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
		wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    //Google font
    wp_enqueue_style( 'OpenSans', 'https://fonts.googleapis.com/css?family=Open+Sans', false );
}
add_action( 'wp_enqueue_scripts', 'all_styles' );


/**
 * Enqueue Javascripts
 */
//---> Remove JQuery migrate (WordPress)
function remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];
		if ( $script->deps ) { // Check whether the script has any dependencies
	 		$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
	 	}
 	}
}
add_action( 'wp_default_scripts', 'remove_jquery_migrate' );

//---> Reordering Javascripts. Loading: First -> jquery , Second-> bootstrap
function reorder_javascripts() {
  wp_enqueue_script( 'bootstrap-script','https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array( 'jquery' ),'',true );
}
add_action('wp_enqueue_scripts', 'reorder_javascripts');

?>
