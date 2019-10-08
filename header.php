<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<title>
		<?php bloginfo('name'); ?>
	</title>
	<!--  ==========================================================  -->
	<!--  Bre - Bre... kalws ton!                                     -->
	<!--  Brikes tpt endiaferon kai mphkes na psakseis?               -->
	<!--                                                              -->
	<!--  E.. kalo psaksimo.                                          -->
	<!--  ...kai ama mporw na boh8hsw kapws steile kana mail ; - )    -->
	<!--                        CreateMySite.gr                       -->
	<!--  ==========================================================  -->
	<meta name="author" content="CreateMySite.gr, Neokazis Charalampos">
	<!-- Custom styles for this template -->
	<!-- Styes at functions.php -->
	<!--  FONTS -->
	<!-- Fonts at functions.php -->
	<!-- FAVICON -->
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/img/favicon.png" sizes="16x16">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body>

<header>
	<h1>================= HEADER.php =================</h1>
	<!-- To get something from the template files:
			 <img src="<?php bloginfo('template_directory'); ?>/img/seoicon.png"/> -->
</header>

<?php 	// Include Primary Navigation Menu
	require_once('inc/navMenu.php');
?>

<main>
