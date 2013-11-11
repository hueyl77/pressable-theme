<?php
/**
 * Page Content Template Part
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<h1 class="entry-title" itemprop="headline">
			<?php the_title(); ?>
		</h1>
	</div>
	<div class="entry-content" itemprop="text">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'tgm' ), 'after' => '</div>', 'link_before' => '<span class="page-link">', 'link_after' => '</span>' ) ); ?>
	</div>
</article><!-- #post -->