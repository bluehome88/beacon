<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Beacon 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php if ( is_sticky() ) : ?>
				<hgroup>
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'beacon' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<h3 class="entry-format"><?php _e( 'Featured', 'beacon' ); ?></h3>
				</hgroup>
			<?php else : ?>
			<div class="searchName"> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" > <?php the_title(); ?>  </a></div>
			<?php endif; ?>
	
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="searchDesc">
			<?php the_excerpt(); ?>
		</div><!-- .searchDesc -->
         
        <div style="height:11px;"></div>
		<?php else : ?>
			<?php the_excerpt(); ?> 
		<?php endif; ?>
       
		<footer class="entry-meta">
			<?php $show_sep = false; ?>
			<?php edit_post_link( __( 'Edit', 'beacon' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->
