<?php
/**
 * Single Content Template Part
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<div class="entry-header">
		<div class="entry-info">
			<span class="entry-date" itemprop="dateModified" datetime="<?php echo get_the_time( 'c' ); ?>"><?php printf( __( 'Last Modified on %s', 'tgm' ), get_the_modified_date() ); ?></span>
			<span class="entry-author" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"><?php _e( ' by ', 'tgm' ) . the_author_posts_link(); ?></span>
			<?php $categories = get_the_category_list( ', ' ); if ( $categories ) : ?>
			<span class="entry-categories"><?php printf( __( ' in %s', 'tgm' ), $categories ); ?></span>
			<?php endif; ?>
			<?php if ( comments_open() ) : ?>
			<span class="comments-link"><?php _e( ' with ', 'tgm' ) . comments_popup_link( '<span class="leave-reply">' . __( '0 Comments', 'tgm' ) . '</span>', __( '1 Comment', 'tgm' ), __( '% Comments', 'tgm' ) ); ?></span>
			<?php endif; ?>
		</div><!-- .entry-info -->
		<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
	</div><!-- .entry-header -->

	<div class="entry-content" itemprop="text">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'tgm' ), 'after' => '</div>', 'link_before' => '<span class="page-link">', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
</article><!-- #post -->