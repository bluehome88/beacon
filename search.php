<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Beacon 1.0
 */

get_header(); ?>

	 <div class="contain_main_left">
      <div class="about_head_box" style="float:left;">
        <div class="about"><?php printf( __( 'Search Results for: %s', 'beacon' ), '<span>' . get_search_query() . '</span>' ); ?></div>
       </div>
       <div style="float:left;">
        <form method="get" id="searchform1" action="<?php echo home_url(); ?>/">
       <table width="728" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="170" valign="middle" class="searchHead">Enter your keywords</td>
            <td width="250" valign="middle"><input class="searchText" type="text" name="s" id="s" value="<?php echo $_REQUEST['s'];?>" /></td>
            <td width="258" valign="middle" style="padding-top:2px;"><input type="image" src="<?php echo get_template_directory_uri() ?>/images/search_btn.png" onclick="me.submit();" /></td>
          </tr>
          <tr>
            <td colspan="3" height="10"></td> 
          </tr>
  	   </table>  
       </form>    
       </div>
      <div class="contain_rignt_inner">
        <?php while ( have_posts() ) : the_post(); ?>
        <?php 
				get_template_part( 'content', get_post_format() );
			                                     
           ?>
           
        <?php //comments_template( '', true ); ?>
        <?php endwhile; // end of the loop. ?>
      </div>
    </div>
        
     <div id="faq_right_box"> 
  		<?php get_sidebar('video'); ?>
    </div>

<?php get_footer(); ?> 