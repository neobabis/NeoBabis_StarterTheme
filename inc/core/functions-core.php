<?php
/**
 * Functions Core
 * @package BASICTheme
 */


/**
* Register Admin Page of Creator
*/
require_once( 'neokazis_details.php' );

/**
* Register Bootstrap Nav Walker
*/
require_once( 'class-wp-bootstrap-navwalker.php' );

/**
* Theme Support
*/
function BASICTheme_Core_setup(){
    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'search-form', 'gallery', 'caption' ) );
    // Registers theme support for Responsive embedded content
    add_theme_support( 'responsive-embeds' );
    // Registers theme support for Wide Alignment
    add_theme_support( 'align-wide' );
    // Registers theme support for default block styles
    add_theme_support( 'wp-block-styles' );
    // Register, enqueue and load CSS on the editor screen
    add_theme_support( 'editor-styles' );
    add_editor_style( 'inc/core/style-editor.css' );

    // =======================
    //  REMOVE JUNK FROM HEAD
    // =======================
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wp_generator' );
    //remove_action( 'wp_head', 'feed_links', 2);
    //remove_action( 'wp_head', 'feed_links_extra', 3);

    remove_action( 'wp_head', 'index_rel_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );

    remove_action( 'wp_head', 'start_post_rel_link', 10, 0);
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0);
    remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0);
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

    add_filter( 'the_generator', '__return_false' );
    add_filter( 'show_admin_bar','__return_false' );
}

/**
 * Change the "Default template" name
 */
function change_default_page_template_title()
{
    return __('Contained-width layout', 'textdomain');
}
add_filter('default_page_template_title', 'change_default_page_template_title', 10, 2);

/**
* Disable the emojis
*/
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
* Filter function used to remove the tinymce emoji plugin.
* 
* @param array $plugins 
* @return array Difference betwen the two arrays
*/
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/**
* Remove emoji CDN hostname from DNS prefetching hints.
*
* @param array $urls URLs to print for resource hints.
* @param string $relation_type The relation type the URLs are printed for.
* @return array Difference betwen the two arrays.
*/
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
        $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }

    return $urls;
}

/**
 * Create Message when username or password is incorrect!
 */
function unauthorized_user_message(){
  return '<br>GET OFF MY LAWN !! RIGHT NOW !!<br><br>IF YOU CONTINUE I HAVE THE ABILITY TO DETECT YOUR IP...!!<br><br>';
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
