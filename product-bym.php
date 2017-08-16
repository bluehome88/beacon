<?php
/**
 * Template Name: Beacause you matter
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
header('Location: '. '/beacause-you-matter/beacon-rescue/');
die;
get_header();
$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "large");
 ?>

  <div class="contain_main_left">
    <div class="about_head_box">
      <div class="about">Beacause you matter</div>
     <!-- <div class="share_icn">                
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="middle" width="26%"><div class="share" style="cursor:pointer;"> <span class='st_sharethis_custom' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='Share This '> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Share This </span>   </div> </td>
            <td valign="middle" width="5%"><span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'  displayText='' ></span></td>
            <td valign="middle" width="5%"><a href="#" onclick="print();" style="text-decoration:none;" > <img class="icn" src="<?php echo get_template_directory_uri() ?>/images/images/print_icn.png" /> </a></td>
            <td valign="middle" width="5%"> <?php pdf24Plugin_link(); ?> </td>
            <td valign="middle" width="18%"> <?php if(function_exists('fontResizer_place')) { fontResizer_place(); } ?></td>
          </tr>
        </table>
      		</div>-->
    </div> 
    
  
    <?php $product_menu = array(
				'theme_location'  => 'benefit',
				'id'            => '', 
				'container'       => 'div', 
				'container_class' => 'navi_sub', 
				'container_id'    => 'navi_sub2',
				'menu_class'      => '', 
				'menu'         => '57',
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
		   #navi_sub2 ul li 
		   {
				/*margin:0 34px 0 -29px !important;   */
		   }
		   
		   </style>
		   <!--[if IE]>
	<style>
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
	</style>
<![endif]-->
  </div>
  <div id="faq_right_box"> 
  	<?php get_sidebar('video'); ?>
  </div>
<?php get_footer(); ?>
