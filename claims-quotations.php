<?php

/**

 * Template Name: Claims Quotations Template 

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

$page_id = $post->ID;

if($page_id == 210) 
{
	include("wp-content/themes/beacon/paycaptcha/securimage.php");
	include("postmark.php");
	
	//$objpostmark = new Postmark("2d469872-76b2-489e-b516-21ab69833158","website@beacon.co.tt","info@beacon.co.tt");
	$objpostmark = new Postmark("2d469872-76b2-489e-b516-21ab69833158","website@beacon.co.tt","miles@simplyintense.com");
	//include(get_template_directory_uri()."/paycaptcha/securimage.php");
	if(isset($_POST['Submit']) && $_POST['Submit']!="")
	{
		$img = new Securimage();
		
		$valid = $img->check($_POST['captcha']);	
	 	if($valid == false) 
		{
			echo '<script>location.href="'.home_url().'/pay-premium?err='.base64_encode("Invalid verification code").'";</script>';
		}
		else
		{
			//$mail_to = "info@beacon.co.tt";
			//$mail_to = "miles@simplyintense.com";
			$mail_to="payments@beacon.co.tt";
			$bcc="bivek_j@yahoo.com";
			
			$PolicyNumber 		= $_POST['PolicyNumber'];
			$RenewalDate 		= $_POST['RenewalDate'];
			$PremiumAmount 		= $_POST['PremiumAmount'];
			$Adjustments 		= $_POST['Adjustments'];
			$SpecialInstructions= $_POST['SpecialInstructions'];
			$Name 				= $_POST['Name'];
			$Email 				= $_POST['Email'];
			$PhoneType 			= $_POST['PhoneType'];
			$PhoneNumber 		= $_POST['PhoneNumber'];
			$CreditCardType 	= $_POST['CreditCardType'];
			$CreditCardNumber 	= $_POST['CreditCardNumber'];
			$ExpiryDateMonth 	= $_POST['ExpiryDateMonth'];
			$ExpiryDateYear 	= $_POST['ExpiryDateYear'];
			
			$html = '<table width="80%" border="0" cellspacing="0" cellpadding="10">
			  <tr>
				<th scope="row"> Policy Number:</th>
				<td>'.$PolicyNumber.'</td>
			  </tr>
			  <tr>
				<th scope="row">Renewal Date:</th>
				<td>'.$RenewalDate.'</td>
			  </tr>
			  <tr>
				<th scope="row">Premium Amount:</th>
				<td>'.$PremiumAmount.'</td>
			  </tr>
			  <tr>
				<th scope="row">Adjustments:</th>
				<td>'.$Adjustments.'</td>
			  </tr>
			  <tr>
				<th scope="row"> Special Instructions:</th>
				<td>'.$SpecialInstructions.'</td>
			  </tr>
			  <tr>
				<th scope="row">Name:</th>
				<td>'.$Name.'</td>
			  </tr>
			  <tr>
				<th scope="row">Email:</th>
				<td>'.$Email.'</td>
			  </tr>
			  <tr>
				<th scope="row">Phone Type:</th>
				<td>'.$PhoneType.'</td>
			  </tr>
			  <tr>
				<th scope="row">Phone Number:</th>
				<td>'.$PhoneNumber.'</td>
			  </tr>
			  <tr>
				<th scope="row">Credit Card Type:</th>
				<td>'.$CreditCardType.'</td>
			  </tr>
			  <tr>
				<th scope="row">Credit Card Number:</th>
				<td>'.$CreditCardNumber.'</td>
			  </tr>
			  <tr>
				<th scope="row">Expiry Date Month:</th>
				<td>'.$ExpiryDateMonth.'</td>
			  </tr>
			  <tr>
				<th scope="row">Expiry Date Year</th>
				<td>'.$ExpiryDateYear.'</td>
			  </tr>
			  <tr>
				<th scope="row">&nbsp;</th>
				<td></td>
			  </tr>
			</table>';

			$mail_from_name = $arrContactData['name'];
			$mail_from = $arrContactData['email'];	
			
			
			$subject = "Pay Insurance of ".$Name ." for policy no:".$PolicyNumber;
			$result = $objpostmark->to($mail_to)
								->bcc($bcc)
								->subject($subject)
								->html_message($html)
								->send();
			if( $result === true ) { //uploding online
				$msg = "<span style='color:#0000ff;'>Your Details have been sent successfully</span>";		
				}
			else { 
				$msg = "<span style='color:#ff0000;'>Error in sending mail</span>";	
			}
			
			echo '<script>location.href="'.home_url().'/submission-successful?msg='.base64_encode("xyz").'";</script>';
			
		}
	}
	
	if(isset($_REQUEST['msg']) && $_REQUEST['msg'] != "")
	{
		$msgtype = "Message";
		$msg = base64_decode($_REQUEST['msg']);
	}
	if(isset($_REQUEST['err']) && $_REQUEST['err'] != "" )
	{
		$msgtype= 'Error';
		$msg = base64_decode($_REQUEST['err']);
	}
}
 ?>
    <div class="contain_main_left">
      <div class="about_head_box">
        <div class="about"><?php echo $post->post_title; ?> </div>
        <?php
		if($page_id != 390)
		{
			?>
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
         	<?php
		}
		else
		{
		?> 
        <style type="text/css" >
		
		.page-list ul li{ font-size:14px; }
		.children ul li{ font-size:12px; }
		.pag-list ul li a{ font-family:"benslt" !important;  }		
		</style>
        	
        <?php
		}
		?>
      </div> 
      <div class="contain_rignt_inner">
       <?php 
      if($page_id == "2" )
	  {  
		   ?>
		   <div class="contain_left_inner">
		   
		   <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="center"> <img src="<?php echo get_template_directory_uri();?>/images/northwesttop.jpg" alt="NorthWest" /></td>
			  </tr>
			  <tr>
				<td><div class="northwestbluebg"> <br/><br/><br/> 11 Stanmore Avenue <br /> Port of Spain <br/><br/> Telephone:<br/> 868.627.0706<br/><br/>Fax:<br/>868.627.0387<br/><br/> Email:<br />nwpf@beacon.co.tt  </div></td>
			  </tr>
			</table>
		   </div>
           <style>
           .faq_midle{ width:500px !important;}
           </style>
           
		   <?php
	   }?>
        
         <?php
		  if($page_id == "2" || $page_id == "210")
		  {  
		   	if($page_id == '210')
			{
				?>
                <style> 
				   .faq_midle{ width:650px !important;
				     margin-left:0px !important;
				   }
				</style>
                <?php
			}
		     
		   ?>
           <div class="faq_midle">
           <?php
		   	if($msg !="")
			{
				echo '<div style="color:#F00;font-size:12px;">'.$msg.'</div>';
			}
		  }
		  if($page_id != '390')
		  {
		  ?>
              <div id='page'>
         <?php
		  }
		  
		 while ( have_posts() ) : the_post(); ?>
        
         <div class="rightformarea" style="width:100%; float:left">
        <?php 
		      {	  
			   	get_template_part( 'content', 'page' );
			  }
		?>
        </div>
        <?php //comments_template( '', true ); ?>
        <?php endwhile; // end of the loop. 
		
		if($page_id != '390')
		{
			?>
      		</div> 
       	  <?php
		} 
		  if($page_id == "2" || $page_id == "210")
		  {  
		   ?>
           </div>
           <?php
		  }
		  ?>
      
      </div>
    </div>
    <div id="faq_right_box">
      <?php 
		
		get_sidebar('video');
		
	 ?>
    </div>
   
<?php get_footer(); ?>
