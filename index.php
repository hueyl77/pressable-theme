<?php
/**
 * Index
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */

get_header(); ?>
<?php if ( 'post' == get_post_type() ) : ?>
<div id="page-title" class="container">
    <div class="page-title-wrap row">
        <div id="page-title-content">
            <h2 class="center">The Pressable Blog</h1>
            <p class="supports center no-margin">All things Pressable, all the time.</p>
        </div>
    </div>
</div><!-- end #page-title -->
<?php endif; ?>
<div id="primary-content" class="container">
	<div class="primary-content-wrap row">
		<div id="content">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', 'archive' ); ?>
			<?php endwhile; ?>
			<?php tgm_numbered_pagination(); ?>
		<?php else : ?>
            <?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		</div><!-- end #content -->
		<?php get_sidebar(); ?>
	</div>
</div><!-- end #primary-content -->
<?php get_footer(); ?>