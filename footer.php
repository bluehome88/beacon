<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Beacon 1.0
 */
?>
 
</div>
</div>


<div id="footer">
   <center>  
   <div class="my-footer">  
	<div class="footer_sub_box">
      <div class="footer_head" style="margin-left:-17px;">Insurance</div>
      <div class="footer_sub_text">
        <ul>
          <li><a href="<?php echo home_url() ?>/products-page/motor">Motor Vehicle</a></li>
          <li><a href="<?php echo home_url() ?>/products-page/property">Property</a></li>
          <li><a href="<?php echo home_url() ?>/products-page/engineering">Engineering</a></li>
          <li><a href="<?php echo home_url() ?>/products-page/group-health">Health</a></li>
          <li><a href="<?php echo home_url()?>/pay-premium">Pay Premium</a></li>
          <li><a href="<?php echo home_url()?>/privacy-policy">Privacy Policy</a></li>
          
          
        </ul>
      </div> 
    </div>
    <div class="footer_line"></div> <div class="footer_sub_box2">
      <div class="footer_head" style="margin-left:-3px;">About Beacon</div>
      <div class="footer_sub_text">  
        <ul>
          <li><a href="<?php echo home_url()?>/about-us/corporate-profile">Corporate Profile</a></li>
          <li><a href="<?php echo home_url()?>/about-us/meet-the-beacon/bod">Meet The Beacon</a></li>
          <li><a href="<?php echo add_query_arg( 'comm', base64_encode('All') , home_url().'/product-detail' ) ?>"> Community Development</a></li>
          <li><a href="<?php echo home_url()?>/about-us/beacon-careers">Beacon Careers</a></li>
          <li><a href="<?php echo home_url()?>/about-us/contact-us/branches">Beacon Locations</a></li>
          <li><a href="<?php echo home_url()?>/about-us/contact-us">Contact us</a></li>
          <li>&nbsp;</li>
          <li><a href="<?php echo home_url()?>/site-map">Sitemap</a></li>
        </ul>
      </div>
    </div>
    <div class="footer_line"></div>
    <div class="footer_sub_box3">
      <div class="footer_head2">Connect</div>
      <?php
	
	  $socialConnect = get_option('widget_social_connect');
	  $nUrl = $socialConnect[2]['nurl'];
	  $fbUrl = $socialConnect[2]['fburl'];
	  $twitterUrl = $socialConnect[2]['turl'];
	  $linkedUrl = $socialConnect[2]['lurl'];
	  $youtubeUrl = $socialConnect[2]['yurl'];
	  ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="social_img"><img class="soc_img" src="<?php echo get_template_directory_uri() ?>/images/images/mail_btn.png" /></td>
        <td valign="middle" class="footer_sub_text2"><a href="#news_letter" class='fancybox' onclick="show_news_letter();" >Stay in Touch</a></td>
      </tr>
      <tr>
        <td class="social_img"><img class="soc_img" src="<?php echo get_template_directory_uri() ?>/images/images/fb_btn.png" /></td>
        <td valign="middle" class="footer_sub_text2"><a href="<?php echo $fbUrl; ?>" target="_blank">Facebook</a></td>
      </tr>
      <tr>
        <td class="social_img"><img class="soc_img" src="<?php echo get_template_directory_uri() ?>/images/images/twiter_btn.png" /></td>
        <td valign="middle" class="footer_sub_text2"><a href="<?php echo $twitterUrl; ?>" target="_blank">Twitter</a></td>
      </tr>
      <tr>
        <td class="social_img"><img class="soc_img" src="<?php echo get_template_directory_uri() ?>/images/images/link_btn.png" /></td>
        <td valign="middle" class="footer_sub_text2"><a href="https://www.linkedin.com/company/the-beacon-insurance-company-ltd-" target="_blank">LinkedIn</a></td>
      </tr>
      <tr>
        <td class="social_img"><img class="soc_img" src="<?php echo get_template_directory_uri() ?>/images/images/blog_btn.png" /></td>
        <td valign="middle" class="footer_sub_text2"><a href="<?php echo $youtubeUrl; ?>" target="_blank">YouTube</a></td>
      </tr>
      </table>
      <div  id="news_letter" style="width:600px; display: none;"> 
      <?php mailchimpSF_signup_form(); ?> 
      </div>
     
    </div>
    </div>
  </center>
  <div id="copyright">Copyright © 2017 Beacon</div>

</div>
<?php wp_footer(); ?>
 


<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">
stLight.options({publisher:'wp.8451e4d2-4b63-49ea-9cac-6581ed433b58',onhover: false});var st_type='wordpress3.4.2'; 

</script>

<script> 

$(document).ready(function(e) { 
    
	/*$(".breadcrumbs>a:contains('Insurance')").attr("href","?page_id=24");
	$(".breadcrumbs>a:contains('About Us')").attr("href","?page_id=30");
    $(".breadcrumbs>a:contains('Career')").attr("href","?page_id=37");*/
	
	$(".breadcrumbs>a:contains('Insurance')").attr("href","<?php echo home_url();?>/products-page/motor");
	$(".breadcrumbs>a:contains('About Us')").attr("href","<?php echo home_url();?>/about-us/corporate-profile");
    $(".breadcrumbs>a:contains('Career')").attr("href","<?php echo home_url();?>/about-us/beacon-careers");
	$(".breadcrumbs>a:contains('Meet Beacon')").attr("href","<?php echo home_url();?>/about-us/meet-the-beacon/bod");
	$(".breadcrumbs>a:contains('FAQs')").attr("href","<?php echo home_url();?>/products-page/faqs/glossary");
	
	$("img.error").attr("src","<?php echo get_template_directory_uri()?>/images/red_cancel.png");
	  
   
});

function show_news_letter()
{
	$("#news_letter").css('display','block');
}

</script> 

</body>
</html>