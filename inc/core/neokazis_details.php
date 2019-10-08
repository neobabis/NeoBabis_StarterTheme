<?php
/*********************************
 * Creator's Admin Page : CreateMySite.gr, Neokazis Charalampos
 * @package NeoBabis_StarterTheme
 */
function any_theme_add_admin_page( $src ) {
    add_menu_page( 'Developer Neokazis Details', 'Neokazis Details', 'read', 'neokazis-details', 'any_theme_create_admin_page', 'dashicons-id-alt', 110 );
}
add_action( 'admin_menu', 'any_theme_add_admin_page' );

function any_theme_create_admin_page(){
  echo '<div style="text-align: center;"><br>
          <h3>Theme: <i><u>' . get_current_theme() . '</u></i></h3><br>
          <h3>created by: </h3>
          <h1 style="color: #939393">Create<span style="color: #3277B3">My</span>Site<span style="color: #3277B3">.gr</span></h1>
          <h3>Author:</h3>
          <h1><i style="color: #3277B3">Neokazis Charalampos</i></h1>
        </div><br>';

  echo '<div style="width:100%; text-align:center;"><div style="display: inline-block; float: none; background-color: #1E1F23; padding: 30px; border-radius: 20px;">
        <img style="border-radius: 50%; width: 50%; height: auto;" src="' . get_template_directory_uri() . '/inc/core/neokazis-details.png' .'"></img>
        <h2 style="font-weight: normal; color: #F6F6F6;">
        Site: <strong><a href="https://createmysite.gr" target="_blank"><span style="color: #939393">Create<span style="color: #3277B3">My</span>Site<span style="color: #3277B3">.gr</span></span></a></strong><br><br>
        Email: <strong>info@createmysite.gr</strong>
        </h2></div></div>';

  echo '<br><br><div style="text-align: center;"><h2>Thank you!</h2></div>';
}

?>
