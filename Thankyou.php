<?php
/**
 * Template Name: Thank You Template 
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

/* $parent_title =  get_the_title($post->post_parent);
$page_title = get_the_title($post); */
  
?>

<div class="contain_main_left full_width_styl">
  <!--<div class="about_head_box">
    <div class="about"> <?php // echo $page_title ;?></div>
    <?php // if($parent_title != "Contact Us" && $page_id != 39) {  ?> 
    <div class="share_icn">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="middle" width="26%"><div class="share" style="cursor:pointer;"> <span class='st_sharethis_custom' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'  displayText='Share This '> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Share This </span> </div></td>
          <td valign="middle" width="5%"><span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'  displayText='' ></span></td>
          <td valign="middle" width="5%"><a href="#" onclick="print();" style="text-decoration:none;" > <img class="icn" src="<?php echo get_template_directory_uri() ?>/images/images/print_icn.png" /> </a></td>
          <td valign="middle" width="5%"><?php // pdf24Plugin_link(); ?></td>
          <td valign="middle" width="18%"><?php // if(function_exists('fontResizer_place')) { fontResizer_place(); } ?></td>
        </tr>
      </table>
    </div> 
    <?php // } ?> 
  </div>-->
  <div class="page-wrapper">
<div class="thanku-heading">
<p style="color:#595959">Thank you for your enquiry.</br>
A member of our team will contact you soon.</p>
</div>
<div class="return-home">
	<!--<a href="<?php echo home_url(); ?>">Return To Home</a>-->
</div>
</div>

 </div>
<div>

<?php get_footer(); ?>