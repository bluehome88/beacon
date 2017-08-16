<?php
/**
 * Template Name: Event Template 
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

?> 
 

<div class="contain_main_left">
          <div class="about_head_box">
            <div class="about">Events</div>

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
          <div class="contain_event_inner"> 
           
          <div class="content_event_left">  
		  	<?php get_sidebar(); ?>
            <br/>
            <?php 
			global $wpdb;
			$sql_query = "SELECT * FROM `tbl_eo_events` WHERE `StartDate` > '".date('Y-m-d')."'  LIMIT 1";
			$res_query = $wpdb->get_results($sql_query);
									
 			$event_details = get_post($res_query[0]->post_id);
			
			/*echo "<pre>";
			print_r($event_details);
			exit;*/
			
			$rest = explode(" ",$event_details->post_content);
			
			$str = array_chunk($rest,18);
			
			$event_text = implode(" ",$str[0]);
			
			
			
			$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $event_details->ID ), "medium");
			?>
            <div class="div_seprator" ></div>
            <p>Next Event: <a href="<?php echo get_permalink($event_details->ID);?>" title="<?php echo  $event_details->post_title; ?>" class="event_title"> <?php echo $event_details->post_title; ?> </a> </p>
            <a href="<?php echo get_permalink($event_details->ID);?>" title="<?php echo  $event_details->post_title; ?>" ><img src="<?php echo $imgsrc[0] ;?>" title="<?php echo $event_details->post_title; ?>" height="130" width="250"  /> </a>
           <!-- <div class="searchDesc"> <p> <?php echo  $event_details->post_content; ?> </p> </div>-->
            <div class="searchDesc"> <p> <?php echo  $event_text."...."; ?> <br/><a href="<?php echo get_permalink($event_details->ID);?>" title="<?php echo  $event_details->post_title; ?>" class="event_title"> read more >> </a>  </p>  </div>
           
          </div> 
           
           <div class="faq_event_midle">
             <div id="page">
              <br/>
              <div class="monthhead" style="margin-left:0;"> Upcoming Events </div> <br/>
              <?php 
			  		while ( have_posts() ) : the_post(); 
              		get_template_part( 'content', 'page' );                
              		endwhile; // end of the loop. 
				?>
            </div>
 			 </div>
          </div>
        </div>
		<div id="faq_right_box">
          <?php get_sidebar('video'); 
		  
			//get_sidebar('Social Connect');
			//get_sidebar('social_connect');
		   ?>
        </div>

<?php get_footer(); ?>
