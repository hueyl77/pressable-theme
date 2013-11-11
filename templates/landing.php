<?php
/**
 * Template Name: Landing Page
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */

get_header(); ?>
<?php get_template_part( 'content', 'landing-title' ); ?>
<div id="primary-content" class="container">
	<div class="primary-content-wrap row">
		<div id="content" class="full-width">
            <div id="landing-content" class="clearfix">
                <?php get_template_part( 'content', 'landing' ); ?>
                <?php get_template_part( 'content', 'landing-contact' ); ?>
            </div>
		</div><!-- end #content -->
	</div>
</div><!-- end #primary-content -->
<?php get_template_part( 'content', 'brands' ); ?>
<?php get_footer(); ?>