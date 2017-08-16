<?php
/**
 * Template Name: About Us Template 
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
?>

<?php  
get_header(); 
$page_id = $post->ID;

$parent_title =  get_the_title($post->post_parent);
$page_title = get_the_title($post);
  
?>

<div class="contain_main_left">
  <div class="about_head_box">
    <div class="about"> <?php echo $page_title ;?></div>
    <?php if($parent_title != "Contact Us" && $page_id != 39) {  ?> 
    <div class="share_icn">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="middle" width="26%"><div class="share" style="cursor:pointer;"> <span class='st_sharethis_custom' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'  displayText='Share This '> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Share This </span> </div></td>
          <td valign="middle" width="5%"><span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'  displayText='' ></span></td>
          <td valign="middle" width="5%"><a href="#" onclick="print();" style="text-decoration:none;" > <img class="icn" src="<?php echo get_template_directory_uri() ?>/images/images/print_icn.png" /> </a></td>
          <td valign="middle" width="5%"><?php pdf24Plugin_link(); ?></td>
          <td valign="middle" width="18%"><?php if(function_exists('fontResizer_place')) { fontResizer_place(); } ?></td>
        </tr>
      </table>
    </div>
    <?php } ?> 
  </div>
  <?php $aboutUs_menu = array(
				'theme_location'  => 'about_us',
				'id'              => '', 
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
  <?php wp_nav_menu( $aboutUs_menu ); ?>
  <div class="contain_rignt_inner"> 
    <?php 
			if ($parent_title == 'Meet Beacon' ) { $location = "meet_beacon_menu"; }
            else if ($parent_title == 'About Us' || $parent_title == 'Corporate Profile' ) { 
			  // if ($page_title == 'Corporate Profile' || $page_title ==  'Mission, Vision & Values' || $page_title == 'Company Profile' || $page_title == 'Financial Information' ) {
					  $location = "corporate_profile_menu";
			   //} 
			   if($page_title == 'Beacon Careers')
			   {
			   		$location = "careers_menu";
			   }
			   else if($page_title == 'Corp Social Responsibility')
			   {
				   $location = "corp_social_menu";
			   }
			   else if($page_title == 'Contact Us')
			   {
				   $location = "location_menu";
			   }
			   else if($page_title == 'Customer Corner')
			   {
				   $location = "faq_menu";
			   }
			}
			else if($parent_title == 'Beacon Careers')
			{
				if($page_title == 'Vacancies' || $page_title == 'Apply Now' )
				{
					$location = "careers_menu";
				}	
			}
			else if ($parent_title == 'Customer Corner') {$location = "faq_menu"; }
			
			else if ($parent_title == 'Contact Us') {
				/*if($page_title == 'Contact Support' || $page_title == 'Branches & Agencies' || $page_title == 'Feedback & Requests')
				{*/
					$location = "location_menu";
				//}
			}  
			
			   
			     $sub_left_product_menu = array(				
                    'theme_location'  => $location,	 
                    'id'            => '', 
                    'container'       => 'div', 
                    'container_class' => '', 
                    'container_id'    => 'cont_left2',
                    'menu_class'      => 'lefttext', 
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
                ); ?>
    <?php 
	
	    $theme_locations = get_nav_menu_locations();	
		$menu_obj = get_term( $theme_locations[$location], 'nav_menu' );

		// Echo count of items in menu
		$menu_items = $menu_obj->count;	
	  
		if($menu_items > 0 )
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
    
    <?php
		  if($page_id == '39')
		  { 
			  ?>
          <div class="contactbluebg">
              <div class="imgcontactus"></div>
              <div class="carText">Contact Support</div>
              <a href="<?php echo home_url();?>/about-us/contact-us/contact-support">
              <div class="BtnContactUsy"></div>
              </a></div>
            <div class="contactbluebg">
              <div class="imgfeedback"></div>
              <div class="carText">Feedback & Requests</div>
              <a href="<?php echo home_url();?>/about-us/contact-us/feedback-requests">
              <div class="BtnFeedbacky"></div>
              </a></div>
            <div class="contactbluebg">
              <div class="imgbranches"></div>
              <div class="carText">Branches & Agencies</div>
              <a href="<?php echo home_url();?>/about-us/contact-us/branches">
              <div class="BtnBranchesy"></div>
              </a>
            	</div>
              
              <?php
		  }
		  else if($page_id == '493')
		  { 
			  ?>
    <div class="faq_midle">
    	 	 <div id="page">
             <br/>
		<div class="right_head_text"> Contact Us </div>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif;color:#595959;font-size:12px;line-height:20px;">
        <tr>
          <td><BR><B>Head Office: </B></td>
          <td rowspan="9"><iframe width="243" height="243" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=204494550503034938140.0004d48096d62d718c49d&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=10.662021,-61.516174&amp;spn=0.002562,0.002596&amp;z=17&amp;output=embed"></iframe></td>
        </tr>
        <tr>
          <td>13 Stanmore Avenue,<br />
PO Box 837 </td>
        </tr>
        <tr>
          <td>Port Of Spain, <br />
          Trinidad<br />
          <br /></td> 
        </tr>
        <tr>
          <td><B>T:</B>	868.6.BEACON <br />
&nbsp;&nbsp;&nbsp;&nbsp;868.625.1113<br />
&nbsp;&nbsp;&nbsp;&nbsp;868.625.2640<br />
&nbsp;&nbsp;&nbsp;&nbsp;868.625.4746<br />
&nbsp;&nbsp;&nbsp;&nbsp;868.623.2266<br />
<br /></td>
        </tr>
        <tr>
          <td><B>F:</B> 868.623.9900<br />
          <br /></td>
        </tr>
        <tr>
          <td><B>W:</B> <a href="www.beacon.co.tt" target="_blank" >www.beacon.co.tt <br />
            <br />
          </a></td>
        </tr>
        <tr>
          <td><B>E:</B> <a href="mailto:info@beacon.co.tt" > info@beacon.co.tt </a></td>
        </tr>
        <tr> 
          <td><br/>
            <table width="40%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="3" align="center"><a href="<?php echo home_url()?>/about-us/contact-us/branches"> <img src="<?php echo get_template_directory_uri() ?>/images/AllBranches.png" /></a></td>
               <!-- <td><a href="<?php echo home_url()?>/claims/claims-motor"><img src="<?php echo get_template_directory_uri() ?>/images/MakeaClaim.png" /> </a></td>
                <td><a href="<?php echo home_url()?>/quotes"> <img src="<?php echo get_template_directory_uri() ?>/images/GetaQuote.png" /></a></td>-->
              </tr>
            </table></td>
        </tr>
      </table>
</div>
      <style>
#navi_sub ul li {
	float: left;
	height: 22px;
	margin: 0;
	max-width: 150px;
	padding: 5px 12px 0 11px;
	text-align: center;
	/*margin:0 34px 0 -30px;*/ 
	margin:0 39px 0 5px !important;
}
</style>
     
     
    
    </div>
    <?php
		  }
		  else if($page_id == '115')
		  {
			  ?>
               <script src="<?php echo get_template_directory_uri() ?>/js/form/jquery-1.7.1.min.js"></script> 
       		   <script src="<?php echo get_template_directory_uri() ?>/js/form/jquery.validate.min.js"></script> 
               <script src="<?php echo get_template_directory_uri() ?>/js/form/script.js"></script> 
                <?php 
                        while ( have_posts() ) : the_post(); 
                        get_template_part( 'content', 'page' );               
                        endwhile; // end of the loop.  
                ?>
                 
             
              <?php
		  }
		  else
		  {
		  	?>
            <div class="faq_midle"> 
           <div id="page">   
              <!--<div class="right_head_text"> <?php echo the_title(); ?> </div> <br/>-->
              <?php 
                                while ( have_posts() ) : the_post(); 
                                get_template_part( 'content', 'page' );               
                                endwhile; // end of the loop. 
                            ?>
            </div>
            </div>
            <?php
             }
			
			if($page_id == '111') 
			{
				?>
                 <style>
			     .input{ animation:none; text-decoration:none;}
			  
			    </style>
                
                <?php
					
			}
			 
			 
          ?>
          
           <style>
		#navi_sub2 ul li {
			/*margin:0 39px 0 5px !important; */ 
		}
</style>
  </div>
  </div> 
  <div id="faq_right_box">
    <?php get_sidebar('Right Sidebar Template'); ?>
  </div>
  
  <style>
 
#navi_sub ul li {
	float: left;
	height: 22px;
	margin: 0;
	max-width: 150px;
	padding: 5px 12px 0 11px;
	text-align: center;
	margin:0 34px 0 -30px; 
}


</style>
<!--[if IE]>
	<style>
	#navi_sub2 ul li{margin: 0 38px 0 0px;}
	#navi_sub2 ul li a:hover {
	color: #000;
}
	</style>
<![endif]-->

<?php get_footer(); ?>