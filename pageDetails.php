<?php
/**
 * Template Name: pageDetails Template 
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


$table_communities 	= $wpdb->prefix.'communities';
$table_products 	= $wpdb->prefix.'products';
$table_promotions 	= $wpdb->prefix.'promotions';
$user_country 		= strtolower( $_COOKIE['user_country']);

if(isset($_REQUEST['fpr']) && $_REQUEST['fpr']!= "" )
{
	$case = 'product';
	$page_title = "Featured Product";
}
if(isset($_REQUEST['fprm']) && $_REQUEST['fprm']!= "" )
{
	$case = 'promotion';
	$page_title = "Featured Highlight";
}
if(isset($_REQUEST['comm']) && $_REQUEST['comm']!= "" )
{
	$case = 'community';
	$page_title = "Community Development";
}
?>
<script>

$(document).ready(function(e) {
    
	$(".breadcrumbs").append("<?php echo $page_title; ?>");
	
});

</script>
<?php


switch($case)
{
	case 'product':
	{
		
		$product_id = base64_decode($_REQUEST['fpr']);
		$product	= $wpdb->get_results( "SELECT * FROM `$table_products` WHERE `productID` = ".$product_id."" );
		
		$title 		= $product[0]->productName;
		$content 	= $product[0]->longDescription;
		$imgsrc 	= home_url()."/".$product[0]->productImage;
		break;	
		
	} 
	case 'promotion':
	{
		$promotion_id  = base64_decode($_REQUEST['fprm']);
		$promotion		= $wpdb->get_results( "SELECT * FROM `$table_promotions` WHERE  `promotionID` = ".$promotion_id."" );
		$title 			= $promotion[0]->promotionName;
		$content 		= $promotion[0]->longDescription;
		$imgsrc 		= home_url()."/".$promotion[0]->promotionImage;
		
		break;
	}
	
	case 'community':
	{
		$community_id = base64_decode($_REQUEST['comm']);

		if($community_id == 'All')
		{
			//$community 	= $wpdb->get_results( "SELECT * FROM `$table_communities` WHERE  find_in_set((SELECT `countryID` FROM `$table_countries` WHERE LOWER(`countryName`) = '".$user_country."' ), cast(`territories` as char))> 0 ORDER BY communityID DESC " );
			$community 	= $wpdb->get_results( "SELECT * FROM `$table_communities`  ORDER BY communityID DESC " );
			
												 
			if((count($community) <= 0 ) )
			{ 
				$community	= $wpdb->get_results( "SELECT * FROM `$table_communities` WHERE find_in_set('6', cast(`territories` as char)) > 0 ORDER BY `communityID` DESC" );
				
				$flag = get_template_directory_uri()."/images/flags/trinidad_and_tobago.png";
			
			}
			else
			{
				$country = $wpdb->get_results( "SELECT * FROM `$table_countries` WHERE LOWER(`countryName`) = '".$user_country."' " );
				
				$flag =  get_template_directory_uri()."/images/flags/".$country[0]->countryFlag;	
			} 
			
			$title = 'Community Development';
		}
		else
		{
			
			$community	= $wpdb->get_results( "SELECT * FROM `$table_communities` WHERE `communityID` = ".$community_id."" );
			$title 		= $community[0]->communityName;
			$content 	= $community[0]->longDescription;
			$imgsrc 	= home_url()."/".$community[0]->communityImage;
			
		}
		
	
		break;	
	}
	default:
	{
		$community	= $wpdb->get_results( "SELECT * FROM `$table_communities` WHERE  find_in_set((SELECT `countryID` FROM `$table_countries` WHERE LOWER(`countryName`) = '".$user_country."' ), cast(`territories` as char))> 0 ORDER BY communityID DESC " );
		
		if((count($community) <= 0 ) )
		{ 
			$community	= $wpdb->get_results( "SELECT * FROM `$table_communities` WHERE find_in_set('6', cast(`territories` as char)) > 0 ORDER BY `communityID` DESC" );
			
			$flag = get_template_directory_uri() ."/images/flags/trinidad_and_tobago.png";
			
		}
		else
		{
			$community	= $wpdb->get_results( "SELECT * FROM `$table_communities` WHERE `communityID` = ".$community_id."" );
			$title 		= $community[0]->communityName;
			$content 	= $community[0]->shortDescription;
			$longcontent= $community[0]->longDescription;
			$imgsrc 	= home_url()."/".$community[0]->communityImage;
				
		}
		
		$title 		= 'Community Development';
		//$content 	= $community[0]->longDescription;
	
		break;	
	}
}
 

?>

<div class="contain_main_left" style="width:735px;" >
  <div class="about_head_box" <?php if ($title != 'Community Development' ){ ?> style="height:45px;" <?php } ?> >
    <div  id='top_1' >
      <div class="about"><?php echo $title ; ?> </div>
     <?php 
	  if($community_id == 'All')
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
	  ?>
    </div>
  </div>
  <?php if ($title != 'Community Development')
		 {
			if($case == 'product' || $case == 'community' )
			{
			 	?>
  <table width="100%" border="0" cellspacing="10px" cellpadding="0">
    <tr>
      <td colspan="2" rowspan="2" style="vertical-align:text-top;" width="80%"><div id="page" style="font-size:12px;">
          <p> <?php echo $content; ?> </p>
        </div></td>
      <td rowspan="2"><img src="<?php echo $imgsrc; ?>" height="230" width="178" style="border-radius:5px;" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
  <?php
			 
			}
			else if($case ==  'promotion')
			{
			 ?>
  <div id="content1">
    <div id="content_1"> 
      <div id="content_img" style="vertical-align:text-top;float:left; " > <img src="<?php echo $imgsrc;?>" style="border-radius:10px;" /> </div>
      <div style="vertical-align:text-top; float:left; margin-left:10px;" >
        <p> <?php echo $content;?> </p>
      </div>
    </div>
  </div>
  <?php
			}
         }
		 else
		 {
		 ?>
  <div id="content1">
    
      <div id="page">
        <?php if(isset($community)):?>
        <?php foreach($community as $key => $i_community): ?>
        <div id="text_1">
          <div id="image">
            <?php 
			
			$temp_country = explode(",",$i_community->territories);
			$t_country = $temp_country[0];
			$country = $wpdb->get_results( "SELECT * FROM `tbl_countries` WHERE `countryID` = ".$t_country);
									
			$flag =  get_template_directory_uri()."/images/flags/".$country[0]->countryFlag;					
							 
						$upload_dir = wp_upload_dir() ;
						
							 
							    if(isset($i_community->communityImage) && $i_community->communityImage != "")
							 	{
									$src  = home_url()."/".$i_community->communityImage;
								}
								else
								{
									$src  = get_template_directory_uri()."/images/no_image.png";
								}
								 
															
								
								?>  
            <img src="<?php echo $src; ?>" width="289" height="129" style="border-radius:5px;"> </div>
          <!-- end of images -->
         
            <h4><img src="<?php echo $flag;?>">&nbsp;&nbsp;<?php echo empty($i_community->communityName)? '['.__('Empty', 'community-manager').']' : $i_community->communityName;?></h4>
            <?php
			
			if($community_id == 'All')
			{
					 echo $i_community->longDescription; 
			}
			else
			{
				echo $i_community->longDescription;
			}
					 
					 ?>
           
            
         
        </div> 
        <!-- end of text_1 -->
        <?php endforeach;?> 
        <?php endif; ?>
      </div>
   
    <!-- end of content_1 --> 
  </div>
  <?php
		 }
		 ?>
</div>
<div id="faq_right_box" >
  <?php get_sidebar('video'); ?>
</div>
<?php get_footer(); ?>
