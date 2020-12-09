<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="Owner" content="<?php bloginfo( 'name' ); ?>">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<!--  ==========================================================  -->
	<!--  Bre - Bre... kalws ton!                                     -->
	<!--  Brikes tpt endiaferon kai mphkes na psakseis?               -->
	<!--                                                              -->
	<!--  E.. kalo psaksimo.                                          -->
	<!--  ...kai ama mporw na boh8hsw kapws steile kana mail ; - )    -->
	<!--                    Neokazis Charalampos,                     -->
	<!--                       CreateMySite.gr                        -->
	<!--  ==========================================================  -->
	<!-- FAVICON -->
	<link rel="icon" type="image/png" href="<?php bloginfo( 'template_directory' ); ?>/img/favicon.png" sizes="16x16">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
	<h1>================= HEADER.php =================</h1>
	<!-- To get something from the template files:
	<img src="<?php bloginfo('template_directory'); ?>/img/seoicon.png"/> -->
</header>

<?php 
	// Include Primary Navigation Menu
	require_once( 'inc/navMenu.php' );
?>

<main>
