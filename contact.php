<?php
/**
 * Template Name: Contact Us Template 
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
 //   include('ajaxRegistrationModule.class.php');
  // $ajaxRegistrationModule = new ajaxRegistrationModule; 
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
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
	contentclass: "categoryitems", //Shared CSS class name of contents group
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

ddaccordion.init({ //2nd level headers initialization
	headerclass: "subexpandable", //Shared CSS class name of sub headers group that are expandable
	contentclass: "subcategoryitems", //Shared CSS class name of sub contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click" or "mouseover
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["opensubheader", "closedsubheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["none", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})

ddaccordion.init({ //2nd level headers initialization
	headerclass: "subexpandable1", //Shared CSS class name of sub headers group that are expandable
	contentclass: "subcategoryitems1", //Shared CSS class name of sub contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click" or "mouseover
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["opensubheader", "closedsubheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["none", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})


</script>
<link href="<?php echo get_template_directory_uri() ?>/css/form/style1.css" rel="stylesheet" type="text/css"/>
<script>
function sendMail()
{
	
	var d = document.contactForm;
	var fname = d.fname.value;
	var lname = d.lname.value;
	var question = d.question.value;
	var title = d.title.value;
	var email = d.email.value;
	var phone = d.phone.value;
	var country = d.country.value;
	var comment = d.comment.value;
	var occupation = d.occupation.value;
	var customer = d.customer.value;
	//var isReceiveEmail = d.isReceiveEmail.value;
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
	else if( country == "" )
	var flag = 1;
	else if( occupation == "" )
	var flag = 1;
	else if( securityCode == "" )
	var flag = 1;
	else
	flag = 0;
	
	if( flag == 0 )
	{
		var parameters = "fname="+fname+"&lname="+lname+"&question="+question+"&title="+title+"&email="+email+"&country="+country+"&comment="+comment+"&occupation="+occupation+"&customer="+customer+"&phone="+phone+"&security_code="+securityCode+"&isAgreeOffer="+isAgreeOffer;
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
</script>

<script type="text/javascript" charset="utf-8" >
$(document).ready(function(){
$(".navi_sub").attr("id","navi_sub");
$("#navi_sub").attr("class","");
/*$("#nevigation>ul>li:first").css("background","none");*/
$(".box").css("color","#999999");

});
</script> 
<?php
get_header();
$page_id = $post->ID;
?> 
 

<div class="contain_main_left">
          <div class="about_head_box">
            <div class="about">About us</div>
        <?php if($page_id != "493") { ?>
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
           
          <span class="select_main_product">  
		  <?php 
			
			
			$parent_title =  get_the_title($post->post_parent);
			$page_title =  get_the_title($post);
	  
				
			if ( $parent_title == 'About Us' ) {
			   if($page_title == 'Contact Us')
			   {
			   		$location = "location_menu";
			   }
			}
			else if ($parent_title == 'Contact Us') {
				if($page_title == 'Branches' || $page_title == 'Agencies' || $page_title == 'Contact Us')
				{
					$location = "location_menu";
				}
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
          <?php  wp_nav_menu( $sub_left_product_menu ); ?>      
         </span>
           
           <div class="faq_midle">
           <div class="right_head_text"> Contact Us </div> 
           <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif;color:#999999;font-size:12px;line-height:20px;">
              <tr>
                <td>Head Office: </td>
                <td rowspan="8">
                     <img src="<?php echo get_template_directory_uri() ?>/images/newmaps.jpg" />
                 </td>
              </tr>
              <tr>   
                <td>13 Stanmore Avenue, PO Box 837 </td>
              
              </tr>
              <tr>
                <td>Port Of Spain, Trinidad</td>
                
              </tr>
              <tr>
                <td>Tel: 868.6.BEACON, 868. 625.1113/2640/4746, 868.623.2266</td>
                
              </tr>
              <tr>
                <td>Fax: 868.623.9900</td>
                
              </tr>
              <tr>
                <td>Website: <a href="www.beacon.co.tt" target="_blank" >www.beacon.co.tt </a> </td>
                
              </tr>
              <tr>
                <td>Email: <a href="mailto:info@beacon.co.tt" > info@beacon.co.tt </a></td>
                
              </tr>
            </table>

          <br/>
          
          
           <div class="right_head_text"> Feedback & Requests   </div> 
           <br/>
           <p style="font-family:'Arial', Helvetica, sans-serif; line-height:2; font-size:12px; color:#999;"> We take time to listen to our customers &ndash; offline, online, anytime. Submit your feedback, requests or comments and we will get back to you within two working days. <br> *Required</p>
           <div class="contact_table_div">
            <div class="ajax_notify" style="width:500px;display:none;"> <img src="<?php echo get_template_directory_uri();?>/files/error.jpg" /> Error : Please complete this registration form. 
    <!--don't delete this div class="ajax_notify"--> 
  </div>
  <div class="ajax_notify" id="messageError" style="width:500px;display:none;border: 1px solid #E7E7E7;color: #0BAFDC;padding: 10px 0;text-align: center;"> <img src="<?php echo get_template_directory_uri();?>/images/error.png" style="float:left;"/> Error : Error in sending mail. 
    <!--don't delete this div class="ajax_notify"--> 
</div>
  <div class="ajax_notify" id="message" style="width:500px;display:none;border: 1px solid #E7E7E7;color: #0BAFDC;padding: 10px 0;text-align: center;"> <img src="<?php echo get_template_directory_uri();?>/images/success.png" style="float:left;"/> Success : Your enquiry has been sent successfully. 
    <!--don't delete this div class="ajax_notify"--> 
</div>
  <form name="contactForm" enctype="multipart/form-data" id="contact-form" class="form-horizontal" action="" method="post" onsubmit="sendMail();" >
      
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="line-height:30px;">
      <tr>
        <td height="45">How can we help?</td>
        <td>
        	
            <?php
			
			$countries = get_countries();
			
			
			?>
            
            <select name="question" style="width:150px">
                <option>Question about a quote </option>
                <option>Question about a quote </option>
                <option>Question about a quote </option>
                <option>Question about a quote </option>
              </select>
        </td>
        <td></td>
      </tr>
      <tr>
        <td width="29%" height="32">Title</td>
        <td width="40%"><input type="radio" name="title" value="Mr" checked="checked" /> 
          Mr.
          <input type="radio" name="title"  value="Mrs" />
          Mrs.
          <input type="radio" name="title"  value="Ms" />
          Ms </td>
        <td width="27%">&nbsp;</td>
        <td width="4%">&nbsp;</td>
      </tr>
      <tr>
        <td height="43" style="padding-bottom:15px;">First Name</td>
        <td>
        	<div class="control-group">
                <div class="controls">
                	<input name="fname" id="fname" type="text" class="validate_blank text"/> 
                </div>
			</div>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="44" style="padding-bottom:15px;">Last Name</td>
        <td>
        	<div class="control-group">
                <div class="controls">
                	<input name="lname" id="lname" type="text" class="validate_blank text" />
                </div>
			</div>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="44" style="padding-bottom:15px;">Email</td>
        <td> 
        	<div class="control-group">
                <div class="controls">
                	<input name="email" id="email" type="text" class="validate_blank text" />
                	   
                </div>
			</div>
            </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="44" style="padding-bottom:15px;">Phone</td>
        <td> 
        	<div class="control-group">
                <div class="controls">
                	<input name="phone" id="phone" type="text" class="validate_blank text" />
                	   
                </div>
			</div>
            </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="45" style="padding-bottom:15px;">Where are you located?</td>
        <td>
        	<div class="control-group">
                <div class="controls">
                	<select name="country" style="width:150px" >
                     <?php
					 foreach($countries as $country)
					 {
						 ?>
						<option value="<?php echo $country->countryID;?>"> <?php echo $country->countryName;?>  </option>
                        
                        <?php
					 }
					 ?>
					 </select>
                </div>
			</div>
        </td>
        <td></td>
      </tr>
      <tr>
        <td height="40" style="padding-bottom:15px;">Occupation</td>
        <td>
        	<div class="control-group">
                <div class="controls">
                	<input name="occupation" id="occupation" type="text" style="width:165px; "  class="validate_blank text"/>
                </div>
			</div>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="26" >Are you a Beacon customer?</td>
        <td><input type="radio" name="customer" id="customer" value="yes" />
          Yes
          <input type="radio" name="customer" id="customer" value="no" />
          No </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="40" colspan="2">Enter your question, request, or comment in detail below: </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">
        	<div class="control-group">
                <div class="controls">
                	<textarea name="comment" cols="50" rows="5"></textarea>
                </div>
			</div>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
       <tr>
       <td></td>
        <td>
        	<div class="control-group">
                <div class="controls">
                	<img src="<?php echo get_template_directory_uri() ?>/PHP-CAPTCHA/CaptchaSecurityImages.php?width=150&height=40&characters=7" />
                </div>
			</div>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="40" style="padding-bottom:15px;">Security Code:</td>
        <td>
        	<div class="control-group">
                <div class="controls">
                	<input id="security_code" name="security_code" type="text" class="validate_blank text" />
                </div>
			</div>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
          <tr>
        <td height="48" colspan="2"><input name="isAgreeOffer" type="checkbox" value="" />
          Check here if agree to receive carefully selected special offers and promotional communications from The Beacon</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><a href="#">
          <!--<div class="submit_btn">  <img src="<?php echo get_template_directory_uri();?>/images/isubmit.jpg" class="submit" onclick="$('.<?php echo AJAX_FORM_ELEMENT?>').submit();"/>-->
       			<input type="submit" value="Submit" name="submit" id="" style="float:left;"> <span id="ajax_loader" style="display:none;float:left;"><img src="<?php echo get_template_directory_uri();?>/images/ajax_loader.png"></span>
       	  </div>
          </a></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    
   
  </form>
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
  <!-- jQuery via Google + local fallback, see h5bp.com -->
	  	<script src="<?php echo get_template_directory_uri() ?>/js/form/jquery-1.7.1.min.js"></script>

<!-- Validate plugin -->
		<script src="<?php echo get_template_directory_uri() ?>/js/form/jquery.validate.min.js"></script>
    
<!-- Scripts specific to this page -->
		<script src="<?php echo get_template_directory_uri() ?>/js/form/script.js"></script>
            </div>
 
          </div>
          </div>
        </div>
		<div id="faq_right_box">
          <?php get_sidebar('video'); ?>
        </div>

<?php get_footer(); ?>
