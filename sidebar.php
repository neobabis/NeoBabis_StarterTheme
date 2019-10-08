<?php
/**
 * Sidebar template
 * Include all the sidebars you want to display with the get_sidebar(); function
 * @package NeoBabis_StarterTheme
 */
?>

<?php if ( is_active_sidebar( 'SidebarName' ) ) : ?>
  <div id="SidebarName">
    <?php dynamic_sidebar( 'SidebarName' ); ?>
  </div>
<?php endif; ?>
