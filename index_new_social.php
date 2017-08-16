<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * 
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>
			
              
          <?php
		  	$table_posts 		= $wpdb->prefix.'posts';
			$table_communities 	= $wpdb->prefix.'communities';
			$table_products 	= $wpdb->prefix.'products';
			$table_promotions 	= $wpdb->prefix.'promotions';
			
			if (isset($_COOKIE['user_country']) && $_COOKIE['user_country'] !="")
			{
							
				$user_country = strtolower($_COOKIE['user_country']); //country of that IP address 
						
				
				$product = $wpdb->get_results( "SELECT * FROM `$table_products` WHERE find_in_set((SELECT `countryID` FROM `$table_countries` WHERE LOWER(`countryName`) = '".$user_country."' ), cast(`territories` as char))> 0 ORDER BY RAND() LIMIT 1" );
				
				if((count($product) <= 0 ) )
				{
					$product	= $wpdb->get_results( "SELECT * FROM `$table_products` WHERE find_in_set('6', cast(`territories` as char)) > 0 ORDER BY RAND() LIMIT 1" );
						
				}
								
				$promotion	= $wpdb->get_results( "SELECT * FROM `$table_promotions` WHERE  find_in_set((SELECT `countryID` FROM `$table_countries` WHERE LOWER(`countryName`) = '".$user_country."' ), cast(`territories` as char))> 0 ORDER BY RAND() LIMIT 1" );
				
				
				if((count($promotion) <= 0 ) ) 
				{
					$promotion	= $wpdb->get_results( "SELECT * FROM `$table_promotions` WHERE find_in_set('6', cast(`territories` as char)) > 0 ORDER BY RAND() LIMIT 1" );
				
				}
						
				$community 	= $wpdb->get_results( "SELECT * FROM `$table_communities` WHERE  find_in_set((SELECT `countryID` FROM `$table_countries` WHERE LOWER(`countryName`) = '".$user_country."' ), cast(`territories` as char))> 0 ORDER BY communityID DESC LIMIT 1" );
								 
				if((count($community) <= 0 ) )
				{ 
					$community	= $wpdb->get_results( "SELECT * FROM `$table_communities` WHERE find_in_set('6', cast(`territories` as char)) > 0 ORDER BY `communityID` DESC LIMIT 1" );
				
				}
			}
			else
			{  
				
				$product	= $wpdb->get_results( "SELECT * FROM `$table_products` WHERE find_in_set('6', cast(`territories` as char)) > 0 ORDER BY RAND() LIMIT 1" );
				
								
				$promotion	= $wpdb->get_results( "SELECT * FROM `$table_promotions` WHERE find_in_set('6', cast(`territories` as char)) > 0 ORDER BY RAND() LIMIT 1" );
				 
				$community	= $wpdb->get_results( "SELECT * FROM `$table_communities` WHERE find_in_set('6', cast(`territories` as char)) > 0 ORDER BY `communityID` DESC LIMIT 1" );
				
				
				
			}
		
			
			$product_id			= $product[0]->productID;
			$product_text 		= substr($product[0]->shortDescription,0,200);
			$product_image 		= $product[0]->productImage;
			
			$product_page_link 	 = $product[0]->pageLink;
					
			$product_content_title 	 = $product[0]->contentTitle;
			
			if( $product_page_link != "" &&  $product_page_link != "0")
			{
				//$product_page_link = "?page_id=".$product_page_link;
				$product_page_link = get_permalink( $product_page_link ) ;
			}
			else
			{
				$product_page_link = "#";
			}
			
			if( $product_content_title == "" )
			{
				$product_content_title = 'Featured Product';
			}
		 
			$promotion_id		= $promotion[0]->promotionID;
			$promotion_text  	= substr($promotion[0]->shortDescription,0,200);
			$promotion_image 	= $promotion[0]->promotionImage;
			$promotion_content_title = $promotion[0]->contentTitle;	
			  
			
			if( $promotion_content_title == "")
			{
				$promotion_content_title = 'Featured Promotion';
			}
			
			$community_id		= $community[0]->communityID;
			$community_text 	= substr($community[0]->shortDescription,0,200);
			$community_image 	= $community[0]->communityImage;
			 	  
							
		  ?>
          <div id="container">
              <div class="box-main">
              <h1><?php echo $product_content_title; ?></h1> 
                <div class="box_pic"><img src="<?php echo $product_image;?>" height='129' width="289" style="border-radius:5px;" /></div>
                <div class="box_desc">
                  
                  <div class="cont"><span class="grey"> <?php echo $product_text; ?> </span></div>
                  <!--<a href="<?php echo add_query_arg( 'fpr', base64_encode($product_id) , home_url().'/product-detail' );?>" class="read"></a>-->
                  <a href="<?php echo $product_page_link;?>" class="read"></a> 
                   </div>
              </div> 
              
              <div class="box-main" >
                <h1>Community Development</h1>
                <div class="box_pic"><img src="<?php echo $community_image;?>"  height="129" width="289" style="border-radius:5px;" /></div>
                <div class="box_desc">
                  
                  <div class="cont"><span class="grey"> <?php echo $community_text; ?> </span></div>
                
                    <a href="<?php echo add_query_arg( 'comm', base64_encode('All') , home_url().'/product-detail' ) ?>" class="btnViewAll"></a>  
                  
                  </div> 
                  
                  
              </div>
              
              <div class="box-main" style="padding:0; margin:0; border:0">
               <h1>We are Social </h1>
                  <div class="box_desc" style="margin-top:0; height:auto;">
                 
                  <div class="cont"><span class="grey"> <?php fb_feed('238610559575990'); ?></span></div>
                  
                  </div> 
               
               
			   
			   <?php // do_shortcode("[fbFeed]422570381160801[/fbFeed]"); ?>
			    
			   		 
			   
			    
               
              </div>
           </div>
         

<?php //get_sidebar(); ?>
<?php get_footer(); ?>