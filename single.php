<?php

/**

 * The Template for displaying all single posts.

 *

 * @package WordPress

 * @subpackage Twenty_Eleven

 * @since Beacon 1.0

 */
get_header();
?>
<div class="mid-wrap page-container page-blog-single">
  <div class="layout-aside-right clearfix">
    <aside class="layout-right aside-1">
      <div class="aside-icons">
        <ul class="social-icons-list">
          <li><a href="/"><i class="icon-iconset3-home"></i></a></li>
          <li><a href="//www.facebook.com/TheBeaconInsurance"><i class="icon-iconset3-fb"></i></a></li>
          <li><a href="//twitter.com/TheBeaconTT"><i class="icon-iconset3-twitter"></i></a></li>
          <li><a href="//www.linkedin.com/company/the-beacon-insurance-company-ltd-"><i class="icon-iconset3-linkedin"></i></a></li>
        </ul>
      </div>

      <div class="aside-widget">
      	<? dynamic_sidebar('sidebar-1222') ?>
      </div>
			<? if (count($tags = wp_get_post_tags($post->ID))) { ?>
      <div class="aside-tags">
        <h3 class="h3-1 text-bordered-full">TAGS:</h3>

        <ul class="post-tags-list">
        	
        	<? foreach ($tags as $tag) { ?>
        		<li><a href="#"><?= $tag->name; ?></a></li>
        	<? } ?>
        </ul>
      </div>
      <? } ?>
    </aside>

    <div class="layout-left">
      <? while ( have_posts() ) : the_post(); ?>
	      <article>
	        <time class="post-date"><?= human_time_diff( get_the_time('U', $post->ID), current_time('timestamp') ) ?> ago</time>
	        <header><h1 class="post-title h1-2"><?= get_the_title($post) ?></h1></header>
	        <div class="post-image image-effect-1">
	          <img src="<?= get_the_post_thumbnail_url($post, 'large') ?>" alt="" width="620" height="340">
	        </div>

	        <div class="post-content">
	          <p><? the_content() ?></p>
	        </div>
	      </article>
	     	<?
	     	// If comments are open or we have at least one comment, load up the comment template.
	     	if ( comments_open() || get_comments_number() ) :
	     		comments_template();
	     	endif;
	     	?>
    	<? endwhile; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>