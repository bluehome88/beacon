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
 
 if($parent_title == 'Glossary of Terms')
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


ddaccordion.init({ //top level headers initialization
	headerclass: "expandable", //Shared CSS class name of headers group that are expandable
	contentclass: "subcategoryitems1", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
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
        <div class="about">Page not found</div>
        
      <div class="contain_rignt_inner">

 		<?php 
	 	
		$parent_id = $post->post_parent;

		
		if ( $parent_id == 24 ) { $location = "motor_product"; } 
		else if ( $parent_id == 25 ) { $location = "property_product"; }
		else if ( $parent_id == 26) { $location = "engineering_product"; }
		else if ( $parent_id == 23) { $location = "bonding_product"; }
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
    </div>
  </div>
  </div>
  </div>
  <div id="faq_right_box">
    <?php get_sidebar('video'); ?>
  </div>
<?php get_footer(); ?>