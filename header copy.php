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
<meta name="description" content="With A Beacon U Choose Motor Insurance Policy, You Choose Insurance Coverage That Best Suits Your Needs And Budget. Get A Quote."/>
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
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri();?>/beacon-css.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri();?>/saad-css.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    
    

<?php 
$page_id = $post->ID;


if($page_id != 39)
{
	?>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery-1.7.2.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/jquery.qtip.min.css">
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery.qtip.min.js"></script>
<?php
}
?>
<link href="<?php echo get_template_directory_uri() ?>/css/form/style1.css" rel="stylesheet" type="text/css"/>
<script>
function sendMail() 
{
	
	var d = document.contactForm;
	var fname = d.fname.value;
	var lname = d.lname.value;
	var question = d.question.value;
		for (var i=0; i < d.title.length; i++)
		 {
		   if (d.title[i].checked)
			  {
			  var title = d.title[i].value;
			  }
		   }
	var email = d.email.value;
	var phone = d.phone.value;
	var country = d.country.value;
	var comment = d.comment.value;
	var occupation = d.occupation.value;
		for (var i=0; i < d.customer.length; i++)
		 {
		   if (d.customer[i].checked)
			  {
			  var customer = d.customer[i].value;
			  }
		   }
	var securityCode = d.security_code.value;	   
	
	var isAgreeOffer = d.isAgreeOffer.value;
	var emailValid = d.email.value.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/);
	
	
	var phoneValid = d.phone.value.search(/^[\-\+]?(([0-9]+)([\.,]([0-9]+))?|([\.,]([0-9]+))?)$/); 
	
	if( fname == "" )
	var flag = 1;
	else if( lname == "" )
	var flag = 1;
	else if( email == "" )
	var flag = 1;
	else if( emailValid == -1 )
	var flag = 1;
	else if( phone == "" )
	var flag = 1;
	else if( phoneValid == -1 )
	var flag = 1;
	else if( securityCode == "" )
	var flag = 1;
	else if( country == "" )
	var flag = 1;
	else if( occupation == "" )
	var flag = 1;
	else
	flag = 0;
	
	if( flag == 0 )
	{
		$('#ajax_loader').css('display','block');
		var parameters = "fname="+fname+"&lname="+lname+"&question="+question+"&title="+title+"&email="+email+"&country="+country+"&comment="+comment+"&occupation="+occupation+"&customer="+customer+"&security_code="+securityCode+"&phone="+phone+"&isAgreeOffer="+isAgreeOffer;
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		  {		
		  		$('#ajax_loader').css('display','none');
				$('#message').css('display','block');
				$('label.valid').css('display','none');
				d.reset();
				
		  }
		}

		xmlhttp.open("POST","sendMail.php",true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.setRequestHeader("Content-length", parameters .length);
		xmlhttp.setRequestHeader("Connection", "close");
		xmlhttp.send(parameters);	
	}



}



if (navigator.userAgent.indexOf('Mac OS X') != -1) {
   
   document.writeln('<style> #navi_sub2 ul li { padding: 9px 4px 0 !important;}   </style>');
  
  
} 


</script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>-->
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->


<input type="hidden" name="userCountry" id="user_Country" value="" />
<?php



//if($page_id == 1)
if(is_home()){
	$ip = $_SERVER['REMOTE_ADDR'];
	$json = @file_get_contents("http://api.easyjquery.com/ips/?ip=".$ip."&full=true");
	$json = json_decode($json,true);
	
	$user_country = strtolower($json['countryName']);
	
	$table_banners 	 = $wpdb->prefix.'bm_banners';
	$table_countries = $wpdb->prefix.'countries';
	if (isset($user_country) && $user_country !="")
	{
		$user_country = strtolower($_COOKIE['user_country']); //country of that IP address  
		
		$photo 	= $wpdb->get_results( "SELECT * FROM `$table_banners` WHERE find_in_set((SELECT `countryID` FROM `$table_countries` WHERE LOWER(`countryName`) = '".$user_country."'), cast(`territories` as char)) > 0  ORDER BY `id` ASC") ;
		
		
		if((count($photo) <= 0 ) )
		{
			$photo 	= $wpdb->get_results( "SELECT * FROM `$table_banners` WHERE find_in_set('6', cast(`territories` as char)) > 0 " );	
		}
	}
	else
	{
		$photo 	= $wpdb->get_results( "SELECT * FROM `$table_banners` WHERE  find_in_set('6', cast(`territories` as char)) > 0 " );
	}
//$photo= array_reverse($photo);
 
?>
<script type="text/javascript" >
// Speed of the automatic slideshow
var slideshowSpeed = 8000;
// Variable to store the images we need to set as background
// which also includes some text and url's.
var photos = [ 
		<?php 
		
		for( $i=0;$i<count($photo);$i++)
		{
			$temp = explode('/',$photo[$i]->src);
			$imageName = $temp[(count($temp)-1)];
			$temp[(count($temp)-1)] = 'banner';
			
			$src = implode("/",$temp);			
			$title = $photo[$i]->title;
			$secondaryMessage = $photo[$i]->secondaryMessage; ;
			
			
			?>
			{
				"title" : "<?php echo $photo[$i]->title; ?>",
				"image" : "<?php echo $src."/".$imageName ; ?>",
				"url" : "<?php echo $photo[$i]->link; ?>",
				"firstline" : "<?php echo get_template_directory_uri();?>/images/textimages/text_"+<?php echo ($i+1); ?>+".png" ,
				"secondline" : "<?php echo $secondaryMessage; ?>"<?php if (strpos($imageName,'banner61.jpg') !== false){ ?>,
				"register" : "https://portal.beacon.co.tt/apps/CustomerPortal/index.html#/registerUser",
				"bberry" : "http://appworld.blackberry.com/webstore/content/36954887/ ",
				"android" : "https://play.google.com/store/apps/details?id=tt.co.beacon.mobile",
				"itune" : "https://itunes.apple.com/tt/app/beacon-buddy/id913420752?mt=8&uo=4"
				<?php } ?>
			}
			<?php if ($i < (count($photo) - 1 ))
			{
				?>
				,
			<?php
			}
		}
		?>
		
		
];
$(document).ready(function() {
		
	// Backwards navigation
	$("#back").click(function() {
		stopAnimation();
		navigate("back");
	});
	
	// Forward navigation
	$("#next").click(function() {
		stopAnimation();
		navigate("next");
	});
	
	var interval;
	$("#control").toggle(function(){
		stopAnimation();
	}, function() {
		// Change the background image to "pause"
		$(this).css({ "background-image" : "url(../beacon/images/btn_pause.png)" });
		
		// Show the next image
		navigate("next");
		
		// Start playing the animation
		interval = setInterval(function() {
			navigate("next");
		}, slideshowSpeed);
	});
	
	
	var activeContainer = 1;	
	var currentImg = 0;
	var animating = false;
	var navigate = function(direction) {
		// Check if no animation is running. If it is, prevent the action
		if(animating) {
			return;
		}
		
		// Check which current image we need to show
		if(direction == "next") {
			currentImg++;
			if(currentImg == photos.length + 1) {
				currentImg = 1;
			}
		} else {
			currentImg--;
			if(currentImg == 0) {
				currentImg = photos.length;
			}
		}
		
		// Check which container we need to use
		var currentContainer = activeContainer;
		if(activeContainer == 1) {
			activeContainer = 2;
		} else {
			activeContainer = 1;
		}
		
		showImage(photos[currentImg - 1], currentContainer, activeContainer);
		
	};
	
	var currentZindex = -1;
	//var showImage = function(photoObject, currentContainer, activeContainer) {
		var showImage = function(photoObject, currentContainer, activeContainer) {
			
			
			
			
		
		animating = true;
		// Make sure the new container is always on the background
		currentZindex--;
		
		
		 $("#headerimg" + activeContainer).css({
			"background-image" : "url(" + photoObject.image + ")",
			"z-index" : currentZindex
		});
			
		
		
		// Hide the header text
		$("#headertxt").css({"display" : "none"});
		// Set the new header text
		var imgSrc = $("#headerimg" + activeContainer).css('background-image');
		if(imgSrc.toLowerCase().indexOf('61.jpg') >= 0){
			$(".register").css("display","block");
				$(".bberry").css("display","block");
				$(".android").css("display","block");
				$(".itune").css("display","block");
		}else {
				$(".register").css("display","none");
				$(".bberry").css("display","none");
				$(".android").css("display","none");
				$(".itune").css("display","none");
		}
		
		$("#headerimg" + activeContainer).fadeIn('slow', function() {
			
			$("#firstline").html("<img src='"+photoObject.firstline+"'/>");
			//$("#firstline").css("font-family","bensmd");
			/*$("#secondline")
				.attr("href", photoObject.url)
				.html(photoObject.secondline)
				.css("font-family","bensr");*/
			$("#pictureduri")
				.attr("href", photoObject.url)
				.html(photoObject.title);
//alert(currentImg);
			$(".pictured")
				.attr("href", photoObject.url);
			
									
			$(".register")
				.attr("href", photoObject.register);  
						  
			
			$(".bberry")
				.attr("href", photoObject.bberry);
			

			$(".android")
				.attr("href", photoObject.android);
			;

			$(".itune")
				.attr("href", photoObject.itune); 
		
			if(currentImg==1){
            
			
			$(".pictured")
				.css('background-image','url(wp-content/themes/beacon/images/images/learn_more_slide1.png)');
			}
			else
			{
			$(".pictured")
				.css('background-image','url(wp-content/themes/beacon/images/images/serch_btn_03.png)');
			}
			
			
			
			
		
        });			
		 
			$("#headerimg" + currentContainer).fadeOut(function() {
			setTimeout(function() {
				$("#headertxt").css({"display" : "block"});
				animating = false;
			}, 300);
		});
		
		
		
		
	};
	
	var stopAnimation = function() {
		// Change the background image to "play"
		$("#control").css({ "background-image" : "url(../beacon/images/btn_play.png)" });
		
		// Clear the interval
		clearInterval(interval);
	};
	
	// We should statically set the first image
	navigate("next");
	
	// Start playing the animation
	interval = setInterval(function() {
		navigate("next");
	}, slideshowSpeed);
	
});
</script> 
<?php

}
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
	
if($page_id == 210) // These functions are used to validate Premiem form - Starts from here
{	
	?>
    <script type="text/JavaScript">

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}

</script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/urchin.js" ></script>
    <?php	 
} 	 
	
?>
<!--[if IE]>
	<style>
	#navi_sub2 ul li{
	margin:0px -58px 0px -38px;
	float: left;
	height: 22px;
	max-width: 180px;
	/*padding: 5px 4px 0;*/
	padding: 6px 4px 0;
	text-align: center;	
	
}
	#navi_sub2 ul li a:hover {
	color: #fff;
}
#navi_sub2 ul li:hover {
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 3px 3px 0 0;
	behavior: url(PIE.htc);
	background-color: rgb(214, 214, 214);
}
#navi_sub2 .current_page_item {
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 3px 3px 0 0;
	behavior: url(PIE.htc);
	background-color: rgb(214, 214, 214);
	
}
#navi_sub2 .current_page_item a {
	color: #fff;
	background-color: rgb(214, 214, 214);
	padding:5px;
	
}
#navi_sub2 .current-page-ancestor a {
	color: #fff;
	background-color: rgb(214, 214, 214);
	padding:5px;
	
}
	</style>
<![endif]-->
<!--[if !IE]><!-->
<style>
#navi_sub2 ul li {
	float: left;
	height: 22px;
	margin: 0;
	/*max-width: 180px;*/
	/*padding: 5px 4px 0;*/
	padding: 6px 4px 0;
	text-align: center;	
	margin: 0 38px 0 -30px;
}
#popup_box {
  background: none repeat scroll 0 0 #ffffff;
  display: none;
  font-size: 12px;
  height: 540px;
  left: 26%;
  overflow-x: hidden;
  overflow-y: scroll;
  position: fixed;
  top:5%;
  width: 740px;
  z-index: 100;
}
#popupBoxClose {
  position: absolute;
  right: 23px;
  top: 16px;
}


#overlay_gallary {
    background-color: rgba(0, 0, 0, 0.7);
    height: 100%;
    left: 0;
    opacity: 1;
    position: fixed;
    text-align: center;
    top: 0;
    visibility: hidden;
    width: 100%;
    z-index: 999999999;
}
#overlay_gallary:target {
    visibility: visible;
}
#overlay_gallary:target > #popup {
}
#overlay {
    background-color: rgba(0, 0, 0, 0.7);
    height: 100%;
    left: 0;
    opacity: 1;
    position: fixed;    
    top: 0;
    visibility: hidden;
    width: 100%;
    z-index: 99999999;
}
.pop-title {
  float: left;
  text-align: left;
  width: 100%;
  font-size:46px;
  font-weight: bold;
}
.popup-Content {
  float: left;
  padding: 15px;
  width: 96%;
}
.popup-Content p {
  color: #3d3d3d;
  line-height:20px;
}
.popup-top-color { border-bottom:5px solid #ffc425; width:685px; margin:0 auto;}
.popup-footer {  background: none repeat scroll 0 0 #00afda;
  float: left;  padding: 20px 32px 20px 20px;  width: 95%;}
.popup-img-left {
  float: left;
}
.popup-right-content {
  color: #ffffff;
  float: right;
  font-style: unset;
  text-align: left;
}
.address {
  font-size: 14px;
  line-height: 16px;
}
.address a { color:#fff; text-decoration:none;}
.address a:hover {color:#FBCC35}
.popup-list {  float: left;  font-size: 14px;  line-height: 22px;  text-align: left;  width: 100%;
}
.popup-list > ul {  margin: 0 0 10px;}
.popup-Content a {color:#0bafdc; text-decoration:none;}
.popup-Content a:hover {color:#FBCC35}
.popup-Content .bold {  font-weight: bold;}
.site-name { margin:0px;}
.site-name a{ font-weight:bold; padding:0px; color:#fff;}
.popup-list li {  margin-bottom: 5px;}




</style>
<script>
window.onbeforeunload = function() { 
          //delete.Cookie('overlay');
		  setcookie("homescreen", "", time()-3600);
         return true;
        }
</script>
 <!--<![endif]-->
</head>
<?php 
//$ifpopup = get_post_custom_values('home_screen_popup','2762');
$ifpopup = get_post_custom_values('home_screen_popup','2791');

if(!isset($_COOKIE['homescreen']))
{


setcookie ("homescreen", "1", 0,"/");
 

if(trim(strtoupper($ifpopup[0])) ==  trim('YES') )
{
if(is_home())
{

 ?>
 
 
 <!--------- Popup------------------------->
  
   <!--------- Popup------------------------->
 
  
  <div id="overlay_gallary" style='visibility:visible' >
            
        <div id="popup_box" style='display:none;'>
									    <!-- OUR PopupBox DIV-->
   <?php 
$id=2791; 
$post = get_post($id); 
$content = apply_filters('the_content', $post->post_content); 
?>

<?php echo $content;  
?>
<div class="popup-footer">
<div class="popup-img-left">
<img src="<?php echo get_template_directory_uri() ?>/images/popup-footer.png">
</div>
<div class="popup-right-content">
<div class="address">
13 Stanmore Avenue, PO Box 837<br>
Port of Spain, Trinidad & Tobago<br>
(t) +1868 623 2266<br>
(t) +1868 623 9900<br>
<a href="mailto:info@beacon.co.tt">info@beacon.co.tt</a>
<p class="site-name"><a href="http://www.beacon.co.tt/">beacon.co.tt</a></p>
</div>
</div>
</div>
    <a id="popupBoxClose" onclick='javascript:unloadPopupBox();'><img src="<?php echo get_template_directory_uri() ?>/images/cross-icon.png" alt=""></a>   
	<div style="clear:both;"></div>
</div><!-- End popup--> 
            
      </div>      
  
  
    <script>
    $(document).ready(function(){
    	loadPopupBox();
    	 
         
    });
    function loadPopupBox() 
     {    // To Load the Popupbox             
    $('#popup_box').fadeIn("slow");             
    $("#popupBoxClose").css({ // this is just for style                 
    	"opacity": "1"  
        	             });                  
    	}             
     
    function unloadPopupBox() {    
    	// TO Unload the Popupbox             
    	$('#popup_box').fadeOut("slow");             
      	 $("#overlay_gallary").css("visibility", "hidden");    
    		}            
 </script>
<?php }		
}	
} 
?>


<body <?php body_class(); ?>>
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
<div class="head_top_right_nev about_you_logo"> <a href="https://portal.beacon.co.tt/Customer"><img src="<?php echo get_template_directory_uri() ?>/images/Beacon_about_you_c.png" alt="About you" /></a></div>  
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
				 padding: 0 25px ;				 
			 }
			 #nevigation ul li:first-child  
			 {
				 padding-left: 25px ;				 
			 }

			 #nevigation ul li:last-child  
			 {
				 padding-right: 25px ;				 
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

<?php
//if ($page_id == 1)
 if(is_home()){?>
<div id="header"> 

  <!-- jQuery handles to place the header background images -->
  <div id="headerimgs">
    <div id="headerimg1" class="headerimg"></div>
    <div id="headerimg2" class="headerimg"></div>
  </div>
<div class="head1">
    <!--<div class="form_main" style="background:none;"></div>-->
      <div class="form_main" style="background-position-y: 50px;">
     <!--div class="form_head"> Get a Quote </div-->
      <!--div class="form_second_line"> Where do you live? </div>
      <div class="select_menu">
        </select>
        <select>
          <option value='' > Select Country </option>
          <option value='10' > Barbados </option>
          <option value='17' > Dominica </option>
          <option value='15' > Grenada </option>
          <option value='19' > St. Kitts & Nevis </option>
          <option value='11' > St. Lucia </option>
          <option value='13' > St. Vincent </option>
          <option value='6' > Trinidad & Tobago </option>
        </select-->
        <a href="<?php echo get_home_url() ?>/quotes/" class="go" style="margin: 210px 0 0 85px"></a> </div></div>
  
  <!-- jQuery handles for the text displayed on top of the images -->
  <div id="headertxt">
    <div class="caption">  <div id="firstline"></div><br/> <div id="secondline"> </div></div>
    <a class="pictured"> </a>
	<a class="register"> </a>  
	<a class="bberry"> </a>
	<a class="android"> </a> 
	<a class="itune"> </a>  
  </div>
  </div>
</div>
<div class="shadow"></div>
<?php
	  }
?>
<div id="faq_contant_box"> 
<div id="container">