<?php
/**
 * Template Name: Claims Template 
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
$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "large");

$parent_title =  get_the_title($post->post_parent);
$page_title = get_the_title($post);
 ?>

<div class="contain_main_left">
  <div class="about_head_box">
    <div class="about">Our Product Range</div>
    <div class="share_icn">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="middle" width="26%"><div class="share" style="cursor:pointer;"> <span class='st_sharethis_custom' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='Share This '> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Share This </span> </div></td>
          <td valign="middle" width="5%"><span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'  displayText='' ></span></td>
          <td valign="middle" width="5%"><a href="#" onclick="print();" style="text-decoration:none;" > <img class="icn" src="<?php echo get_template_directory_uri() ?>/images/images/print_icn.png" /> </a></td>
          <td valign="middle" width="5%"><?php pdf24Plugin_link(); ?></td>
          <td valign="middle" width="18%"><?php if(function_exists('fontResizer_place')) { fontResizer_place(); } ?></td>
        </tr>
      </table>
    </div>
  </div>
  <?php $product_menu = array(
				'theme_location'  => 'claims_menu',
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
  <?php 
  if($page_title != 'Claims')
  {
    	wp_nav_menu( $product_menu ); 
  }
 
  ?>
  <div class="contain_rignt_inner">
    <div class="faq_midle"  >
      <div class="cont_right_text_box" id="page">
        <?php 
		if ($post->ID == "11")
		{
			?>
<!--[if !IE]><!-->
        <div class="claimsbluebg">
          <div class="imgcar"></div>
          <div class="carText">Motor</div>
          <a href="<?php echo home_url();?>/motor-claim-forms">
          <div class="BtnMotor"></div>
          </a></div>
        
        <div class="claimsbluebg">
          <div class="imgproperty"></div>
          <div class="carText">Property</div>
          <a href="<?php echo home_url();?>/property-claim-forms">
          <div class="BtnProperty"></div>
          </a></div>
          
          
           <div class="claimsbluebg">
          <div class="imghealth"></div>
          <div class="carText">Health</div>
          <a href="<?php echo home_url();?>/health-forms">
          <div class="BtnHealthnew"></div>
          </a></div>
		  
		    <div class="claimsbluebg">
          <div class="imgmarine"></div>
          <div class="carText">Marine</div>
          <a href="<?php echo home_url();?>/marine-forms">
          <div class="BtnMarinenew"></div>
          </a></div>
		  
		    <div class="claimsbluebg">
          <div class="imgotherbusiness"></div>
          <div class="carText">Other Business</div>
          <a href="<?php echo home_url();?>/other-business-forms">
          <div class="Btnothrbuss"></div>
          </a></div>

          
<!--<![endif]-->
<!--[if gte IE 5]>
<div style="padding-left:10px;">	
<div class="claimsbluebg">
          
          <a href="<?php echo home_url();?>/motor-claims-customer-information">
          <img src="<?php echo get_template_directory_uri(); ?>/images/motorsd.png" alt="motor"/>
          </a></div>
        
        <div class="claimsbluebg">
          
          <a href="<?php echo home_url();?>/property-claims-customer-information">
          <img src="<?php echo get_template_directory_uri(); ?>/images/propertysd.png" alt="property"/>
          </a></div>
</div>
<![endif]-->
        
        <?php
		}
		else
		{
			?>
        <div class="right_head_text"><?php echo get_the_title($ID); ?> </div>
        <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'page' ); ?>
        <?php endwhile; // end of the loop. ?>
        <?php
		}
		?>
      </div>
    </div>
  </div>
</div>
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
<div id="faq_right_box">
  <?php get_sidebar('video'); ?>
</div>
<?php get_footer(); ?>
