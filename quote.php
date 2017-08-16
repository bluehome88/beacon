<?php
/**
 * Template Name: Quote Template 
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

$page_title = get_the_title($post);

?>

<div class="contain_main_left">
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
    <div class="contain_rignt_inner">
<!--      <div id="about_img" style="background: url(<?php echo $imgsrc[0] ;?>);">-->
	 <div id="page">
        <?php while ( have_posts() ) : the_post(); 
				get_template_part( 'content', 'page' );
			 endwhile; 
		?>
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
		   #navi_sub2 ul
		   {
				height: 45px !important;
		   }

		   #navi_sub2 ul li 
		   {
				/*margin:0 34px 0 -29px !important;   */
				height :45px !important;
				max-width : 128px !important;
		   }

		   #navi_sub2
		   {
				height : 45px !important;
		   }
		   
		   </style>
  </div>
  <div id="faq_right_box"> 
  	<?php get_sidebar('video'); ?>
  </div>
<?php get_footer(); ?>
