<?php
/**
 * Template Name: Private Motor Quotation Result Template 
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
session_start();
get_header();
$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "large");

$page_title = get_the_title($post);

?>

<link rel="stylesheet" id="gforms_css-css" href="http://beta-beacon.simplyintense.com/wp-content/plugins/gravityforms/css/forms.css?ver=1.6.5.1" type="text/css" media="all">
     <style>
#pmotor_quotation_detail ul
{
  list-style-type:none;
  margin-left:0px !important;
}
#pmotor_quotation_detail ul li
{
  clear:both;
  display:list-item;
  line-height:30px;
}
#pmotor_quotation_detail ul li .gfield_label
{
  width:300px;
  float:left;
}

.gform_wrapper div{
  margin-bottom:15px;
}
		   .faq_midle 
		   {
			   width:auto !important;
			   margin-left:15px !important; 
		   }
		   .cont_right_text_box
		   {
			   width:auto !important; ;
		   }
		   #navi_sub2 ul
		   {
//				height: 40px !important;
		   }

		   #navi_sub2 ul li 
		   {
				/*margin:0 34px 0 -29px !important;   */
				height :45px !important;
				max-width : 128px !important;
		   }

		   #navi_sub2
		   {
				 height: 26px !important;
				 position: relative;
				 width: 100%; 
		   }
		   
		   
		   .contain_main_left > a {
				float: right;
				margin: 0;
				position: relative;
				top: -15px;
				color: #0BAFDC;
				text-decorater:none;
			}
		   
		   </style>


<div class="contain_main_left" style="height:900px !important;">
    <div class="about_head_box">
      <div class="about"><?php echo $page_title; ?></div>
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
    
  
    <?php $quote_menu = array(
				'theme_location'  => 'quotes',
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
    <?php wp_nav_menu( $quote_menu ); ?>
	<a href="mailto:uchoosehelp@beacon.co.tt" target="_blank">Need help?</a>
    <div class="contain_rignt_inner">
      <!--<div id="about_img" style="background: url(<?php echo $imgsrc[0] ;?>);">
        <?php while ( have_posts() ) : the_post(); 
				get_template_part( 'content', 'page' );
			 endwhile; 
		?>
      </div>-->
    <div class="gform_quotation_result">
      <div class="gform_wrapper">
	 <div class="quotation-step-3"></div>

<?php

$options = array('privateUse','sportCar','leftHandDrive','newVehicleOrRegistration','insuredHasDealerInvoice','vehicleOverOneYearOld','valuationPerformed','insuredHasFullTimeOccupation','insuredIsFirstTimeVehicleOwner');
$quotable = 1;
foreach($options as $option){
	if(!isset($_SESSION['pm_quot_param'][$option]) || $_SESSION['pm_quot_param'][$option] == 'false'){
		$quotable = 0;
		break;
	}		
}

if($quotable==1){
	/*$client = new SoapClient(home_url()."/MarketingService_1.wsdl",array('trace'=>1,'exceptions'=>0));
	$result = $client->__soapCall('getAutoQuote',array('getAutoQuote'=>$_SESSION['pm_quot_param']));
	$total=$result->getAutoQuoteReturn->netAnnualPremiumIncludingTax;*/

	$total = $_SESSION['pm_quot_param']['result'];

?>
    
        <div class="quotation_result_header">
	   <div class="quotation_result_small_header">Quote</div>
	   <div class="quotation_result_description">Start private motor insurance policy with Beacon today for:</div>
	 </div>
	 <div class="quotation_result_detail">
	   <div class="quotation_total">
	     <strong>$<?php echo number_format($total, 2, '.', ',');?> TTD</strong>
	   </div>
	   <div id="quotation_result_description:">Annually</div>
          <div class="quotation_reference_number">Your Beacon Quotation Reference Number is : <?php echo $_SESSION['pm_quot_param']['referralReferenceNumber']; ?></div>
	   <div id="pmotor_quotation_buttons" class="gform_footer">
	     <!--<input type="submit" id="gform_print_save_button" class="button gform_button" value="Print or Save as PDF">-->
	     <input type="button" id="gform_contact_beacon_button" class="button gform_button" value="Contact Beacon to Purchase" onclick="window.location.href='/about-us/contact-us/branches-agencies/';">
	   </div>
	 </div>
    

<?php
}
else{
?>


		<div class="gform_heading">
			<span class="gform_description">We are very sorry but due to specific information entered, we are unable to give you an instant U Choose quote. You will be contacted by a member of our team within 1 business day to complete your request. Thank you for your understanding.</span>
		</div>

<?php
}
?>
        </div>
       </div>
     </div>
  </div>

  <div id="faq_right_box"> 
  	<?php get_sidebar('video'); ?>
  </div>
<?php get_footer(); ?>
