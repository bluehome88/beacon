<?php
/**
 * Template Name: Blog Template 
 */
get_header(); 

$posts = get_posts([
  'numberposts' => 3,
  'order' => 'DESC'
]);
?>
<div class="mid-wrap-wide page-container page-blog-landing">
  <h1 class="h1-1"><?= get_the_title() ?></h1>
  <h2 class="h2-1 color-blue text-bordered">RECENT POSTS</h2>

  <div class="post-cards row">
    <? foreach ($posts as $post) { ?>
      <div class="column column-4">
        <article class="card-1 post-card">
          <a href="<?= get_the_permalink($post) ?>" class="card-1-image image-effect-1">
            <header class="card-1-header">
              <h3><?= get_the_title($post) ?></h3>
            </header>
            <img src="<?= get_the_post_thumbnail_url($post, 'blog-post-thumbnails') ?>" alt="" width="324" height="324">
          </a>
          <div class="card-1-bottom">
            <a href="<?= get_the_permalink($post) ?>">
              <time class="post-card-date"><?= get_the_time('F j, Y', $post) ?></time>
            </a>
            <div class="post-card-read-more">
              <a href="<?= get_the_permalink($post) ?>">read more</a>
            </div>
          </div>
        </article>
      </div>
    <? } ?>
  </div>

  <!-- <h2 class="h2-1 color-grey text-bordered">RECENT POSTS</h2> -->

</div>

<?php get_footer(); ?>