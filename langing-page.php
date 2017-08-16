<?php
/**
 * Template Name: Landing Page Template 
 */
get_header("landingpage2"); ?>

<?php while ( have_posts() ) : the_post(); ?>
  <?php the_content(); ?>
<?php endwhile; ?>

