<?php
/**
 * Template Name: Left Sidebar
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */

get_header(); ?>
<?php get_template_part( 'content', 'page-title' ); ?>
<div id="primary-content" class="container left-sidebar">
	<div class="primary-content-wrap row">
	    <?php get_sidebar(); ?>
		<div id="content">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			    <?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; ?>
			<?php tgm_numbered_pagination(); ?>
		<?php else : ?>
            <?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		</div><!-- end #content -->
	</div>
</div><!-- end #primary-content -->
<?php get_footer(); ?>