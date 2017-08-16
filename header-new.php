<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Beacon 1.0
 */
?><!DOCTYPE html> 
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
		echo " | $site_description";
	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'beacon' ), max( $paged, $page ) );
	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri();?>/beacon-css.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php 
$page_id = $post->ID;


if($page_id != 39 && $page_id != "")
{
	?>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery-1.7.2.min.js"></script>
<?php
}
?>
<link href="<?php echo get_template_directory_uri() ?>/css/form/style1.css" rel="stylesheet" type="text/css"/>
<script>

if (navigator.userAgent.indexOf('Mac OS X') != -1) {
  document.writeln('<style> #navi_sub2 ul li { padding: 9px 4px 0 !important;}   </style>');
} 
</script> 
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>-->
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php



	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
	

	 
	
?>
</head>
<body <?php //body_class(); ?>>
<div id="header_inner">
<div class="head_left">
  <div class="logo"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="logo"   /></a> </div>
 
 </div>   
  <div class="header_right">
    <div class="header_right_top">
      <div class="head_search">
        <form method="get" id="searchform" action="<?php echo home_url(); ?>/">
		<input type="text" class="field" name="s" id="s"  value="<?php echo $_REQUEST['s'];?>">
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="">
	    </form>
      </div> 
    <!--  <div class="head_top_right_nev"> <a href="#">Login</a></div>--> 
      <div class="head_top_right_nev"> <a href="<?php echo home_url()?>/pay-premium">Pay Premium</a></div> 
      <div class="head_top_right_nev"> <a href="<?php echo home_url()?>/about-us/beacon-careers">Careers</a> </div>
      <div class="head_top_right_nev"> <a href="<?php echo home_url()?>/about-us/contact-us">Contact</a> </div>
    </div>
    
    <?php 
	global $wpdb;
	$sql_query = "SELECT * FROM `tbl_eo_events` WHERE `StartDate` > '".date('Y-m-d')."'  LIMIT 1";
	$res_query = $wpdb->get_results($sql_query);
	
	/*echo "<pre>";
	print_r($res_query); 
	exit;
	*/
	if(count($res_query)> 0)
	{
		$top_menu = array(
				'theme_location'  => 'top_nav',
				'id'              => '', 
				'container'       => 'div', 
				'container_class' => '', 
				'container_id'    => 'nevigation',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
			);
		
	}
	else
	{
		$top_menu = array(
				'theme_location'  => 'top_nav_1',
				'id'              => '', 
				'container'       => 'div', 
				'container_class' => '', 
				'container_id'    => 'nevigation',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => '',
			);
			
			?>
            <style type="text/css">
			
			 #nevigation ul li
			 {
				 padding: 0 65px !important;
				 *padding:0 64px !important;
				 padding:0 65px \0/ !important;
				 padding:0 65px \9 !important;  
			 }
			 #nevigation ul li:last-child  
			 {
				 padding-left: 68px !important;
				 *padding-left:69px !important;
				 padding-left:68px \0/ !important; 
				 padding-left:68px \9 !important;  
			 }
			
			</style>
            
            <?php
		
	}

	
	 ?>
		  <?php wp_nav_menu( $top_menu ); ?>   
      
        <div class="call"><img src="<?php echo get_template_directory_uri() ?>/images/call_beacon.png" /></div>
  </div>
  
</div>

    <!-- BREADCUM START -->
    <div id="breadcrumbs">
    	<div class="breadcrumbs">
		<?php 
		if(!is_home())
		{
			if(function_exists('bcn_display'))
			{
				bcn_display();
			}
		}
		?>
   	 	</div>
    </div>
    
   
    <!-- BREADCUM END -->


<div id="faq_contant_box"> 
<div id="container">