<?php
/**
 * Functions Core
 * @package NeoBabis_StarterTheme
 */
?>

<?php

/**
* Register Admin Page of Creator
*/
require_once('neokazis_details.php');


/**
* Register Bootstrap Nav Walker
*/
require_once('class-wp-bootstrap-navwalker.php');


/**
* Theme Support
*/
function NeoBabis_StarterTheme_Core_setup(){
  add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

  // =======================
  //  REMOVE JUNK FROM HEAD
  // =======================
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wp_generator');
  //remove_action('wp_head', 'feed_links', 2);
  //remove_action('wp_head', 'feed_links_extra', 3);

  remove_action('wp_head', 'index_rel_link');
  remove_action('wp_head', 'wlwmanifest_link');

  remove_action('wp_head', 'start_post_rel_link', 10, 0);
  remove_action('wp_head', 'parent_post_rel_link', 10, 0);
  remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

  remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );

  add_filter('the_generator', '__return_false');
  add_filter('show_admin_bar','__return_false');

  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
}


/**
 * Create Message when username or password is incorrect!
 */
function unauthorized_user_message(){
  return '<br>GET OFF MY LAWN !! RIGHT NOW !!<br><br>';
}
add_filter( 'login_errors', 'unauthorized_user_message' );


/**
 * Remove creations styles.css?ver=... from the wp_enqueue_style
 * remove wp version param from any enqueued scripts
 */
function vc_remove_wp_ver_css_js( $src ) {
  if ( strpos( $src, 'ver=' ) )
    $src = remove_query_arg( 'ver', $src );
  return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );


?>
