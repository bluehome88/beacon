<?php
/*
Template Name: Landing Page
*/
?>

<?php get_header("landingpage"); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>

<?php get_footer("landingpage"); ?>