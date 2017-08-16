<?php
/**
 * Template Name: Right Sidebar Template 
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

$page_id = $post->ID;

if ($page_id == 468 && isset($_COOKIE['user_country']) && $_COOKIE['user_country'] !="")
{
		$user_country = strtolower($_COOKIE['user_country']); //country of that IP address 
$community 	= $wpdb->get_results( "SELECT * FROM `$table_communities` WHERE  find_in_set((SELECT `countryID` FROM `$table_countries` WHERE LOWER(`countryName`) = '".$user_country."' ), cast(`territories` as char))> 0 ORDER BY communityID DESC " );
								 
			if((count($community) <= 0 ) )
			{ 
				$community	= $wpdb->get_results( "SELECT * FROM `$table_communities` WHERE find_in_set('6', cast(`territories` as char)) > 0 ORDER BY `communityID` DESC" );
			
			}

}

?>
 

<div class="contain_main_left">
          <div class="about_head_box">
            <div class="about"><?php echo get_the_title($post->ID); ?></div>
          
          </div>          
          <div class="contain_rignt_inner">          
          
            
            <div class="faq_midle">
              <?php 
			  		while ( have_posts() ) : the_post(); 
              		get_template_part( 'content', 'page' );               
              		endwhile; // end of the loop. 
				?>
            </div>
            
 
          </div>
        </div>
		<div id="faq_right_box">
          <?php get_sidebar('video'); ?>          
        </div>

<?php get_footer(); ?>
