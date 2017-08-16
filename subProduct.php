<?php
/**
 * Template Name: subProduct Template 
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Beacon 1.0
 */

get_header();

  $parent_title =  get_the_title($post->post_parent);
  $page_title = get_the_title($post);		
 
 if($page_title == 'Beacon 4-1-1')
 { 
 ?>
 
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/ddaccordion.js">

/***********************************************
* Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/

</script>
<script type="text/javascript">

// Figure out which div to expand. This is used when opening via email.
// Defaults to everything closed.
function scg_getExpandedParameter() {
    var url = window.location.href;
    var name = "content-id";
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
    results = regex.exec(url);
    if (!results || ! results[2]) return [];

    var index = parseInt(decodeURIComponent(results[2].replace(/\+/g, " ")));
    if (index >= 0 && index < 4) return [index];
    return [];
  }

ddaccordion.init({ //top level headers initialization
	headerclass: "expandable", //Shared CSS class name of headers group that are expandable
	contentclass: "subcategoryitems1", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
  defaultexpanded: scg_getExpandedParameter(), //index of content(s) open by default [index1, index2, etc]. [] denotes no content
  onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
  animatedefault: true, //Should contents open by default be animated into view?
  persiststate: false, //persist state of opened contents within browser session?
	toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
  oninit: function (headers, expandedindices) {
    // Animates the default header into view, if there is one.
    // Used when linking to this page from email.
    if (expandedindices.length == 0) return;
    var $ = jQuery;
      $(window).load(function(){
        setTimeout(function(){$('html, body').animate({scrollTop: $(headers[expandedindices[0]]).offset().top}, "slow");}, 100);
      });
  },
  onopenclose: function (header, index, state, isuseractivated) { //custom code to run whenever a header is opened or closed
          //do nothing
  }
})



</script>
<?php
 }
 ?>

  <div id="container">
    <div class="contain_main_left">
      <div class="about_head_box">
        <div class="about"><?php echo $parent_title; ?></div>
        
        <div class="share_icn">                
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="middle" width="26%"><div class="share" style="cursor:pointer;"> <span class='st_sharethis_custom' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='Share This '> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Share This </span>   </div> </td>
            <td valign="middle" width="5%"><span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'  displayText='' ></span></td>
            <td valign="middle" width="5%"><a href="#" onclick="print();" style="text-decoration:none;" > <img class="icn" src="<?php echo get_template_directory_uri() ?>/images/images/print_icn.png" /> </a></td>
            <td valign="middle" width="5%"> <?php pdf24Plugin_link(); ?> </td>
            <td valign="middle" width="18%"> <?php if(function_exists('fontResizer_place')) { fontResizer_place(); } ?></td>
          </tr>
        </table>
      		</div>
         
      </div>
		  <?php $product_menu = array(
                    'theme_location'  => 'product',
                    'id'            => '', 
                    'container'       => 'div', 
                    'container_class' => 'navi_sub', 
                    'container_id'    => 'navi_sub2', 
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
                ); ?>
    
          <?php wp_nav_menu( $product_menu ); ?>
      
      <div class="contain_rignt_inner">

 		<?php 
	 	
		//echo $parent_title;
		//echo "<br/>". $post->post_parent;
		$parent_id = $post->post_parent;

				
		/*if ( $parent_title == 'Motor' ) { $location = "motor_product"; } 
		else if ( $parent_title == 'Property') { $location = "property_product"; }
		else if ( $parent_title == 'Engineering') { $location = "engineering_product"; }
		else if ( $parent_title == 'Bonds') { $location = "bonding_product"; }
		else if ( $parent_title == 'Marine') { $location = "marine_product"; } 
		else if ( $parent_title == 'Casualty') { $location = "casualty_product"; }
		else if ( $parent_title == 'Miscellaneous Accident') { $location = "miscellaneous_product"; }
		else if ( $parent_title == 'Group Health') { $location = "groupHealth_product"; }
		else if ( $parent_title == 'Glossary of Terms' || $page_title == 'Glossary of Terms' ) { $location = "faq_menu"; }*/
		if ( $parent_id == 24 ) { $location = "motor_product"; } 
		else if ( $parent_id == 25 ) { $location = "property_product"; }
		else if ( $parent_id == 26) { $location = "engineering_product"; }
		else if ( $parent_id == 23) { $location = "bonding_product"; }
		else if ( $parent_id == 3472) { $location = "benefits_product"; }
		else if ( $parent_id == 122) { $location = "marine_product"; } 
		else if ( $parent_id == 124) { $location = "casualty_product"; }
		else if ( $parent_id == 126) { $location = "miscellaneous_product"; }
		else if ( $post->ID == 2970 || $parent_id == 2970 ) { $location = "groupHealth_be_better_plan_product"; }
		else if ( $parent_id == 131) { $location = "groupHealth_product"; }
		else if ( $parent_id == 788 || $parent_id == 41 ) { $location = "faq_menu"; }
				
		 	 	
			$sub_left_product_menu = array(				
				'theme_location'  => $location,	 
				'id'            => '', 
				'container'       => 'div', 
				'container_class' => '', 
				'container_id'    => 'cont_left2',
				'menu_class'      => 'left_text', 
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => '',
				'before'          => '',
				'after'           => '<div class="left_line"></div>',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
			); 
		$theme_locations = get_nav_menu_locations();	
		$menu_obj = get_term( $theme_locations[$location], 'nav_menu' );

		// Echo count of items in menu
		$menu_items = $menu_obj->count;	
		
	   if($menu_items > 1 )
	   {	
	   ?>
         <span class="select_main_product">  
          <?php  wp_nav_menu( $sub_left_product_menu ); ?>      
         </span> 
         
       <?php
       }
       else
       {
		   ?>
           <style>
		   .faq_midle
		   {
			   width:auto !important;
			   margin-left:15px !important;
		   }
		   .cont_right_text_box
		   {
			   width:auto !important; ;
		   }
		  
		   </style>
           
           
           <?php
		   
       }
       ?>
        <style>
		   #navi_sub2 ul li 
		   {
				/*margin:0 34px 0 -29px !important;   */
		   }
		   </style>
        <div class="faq_midle"  >
          <div class="cont_right_text_box" id="page"> 
            <div style="padding-bottom:30px;">
            <div class="right_head_text"><?php echo get_the_title($ID); ?> </div>
            <?php 
			if ($page_title != 'Glossary of Terms' && $parent_title != 'Glossary of Terms')
			{
				?>
              <div class="seco_level_box">
              <a href="#">
              <div class="seco_level_btn"></div>
              </a></div>
           	 
              <?php
			}
			 
			?>
            </div>
           		<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?> 

				<?php endwhile; // end of the loop. ?>
          </div>
        </div>
      </div>
    </div>
    <div id="faq_right_box">
      <?php get_sidebar('video'); ?>
    </div>
  </div>
<!--[if IE]>
	<style>
#navi_sub2{margin-bottom:20px;}
	#navi_sub2 ul li{
	margin:0px 3px 0px 5px;
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
#cont_left2 ul{margin-left:20px;}
	</style>
<![endif]-->

<?php get_footer(); ?>
