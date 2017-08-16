<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>> 
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=9">
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="viewport" content="width=device-width" />
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-32x32.png" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;
	wp_title( '|', true, 'right' );
	// Add the blog name.
	bloginfo( 'name' );
	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | Insurance, Health, Property, Motor Vehicle, Marine, Bonding, Finance, Trinidad and Tobago, Caribbean";
	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'beacon' ), max( $paged, $page ) );
	?></title>
	<link href="<?php echo get_template_directory_uri() ?>/css/landing-page2.css" rel="stylesheet" type="text/css"/>
</head>
<body class="landing-page2">