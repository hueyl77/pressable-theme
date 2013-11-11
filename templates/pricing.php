<?php
/**
 * Template Name: Pricing
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */

get_header(); ?>
<?php get_template_part( 'content', 'pricing-title' ); ?>
<div id="primary-content" class="container">
	<div class="primary-content-wrap row">
		<div id="content" class="full-width">
            <?php get_template_part( 'content', 'pricing-table' ); ?>
            <?php get_template_part( 'content', 'pricing-features' ); ?>
            <?php get_template_part( 'content', 'pricing-faq' ); ?>
		</div><!-- end #content -->
	</div>
</div><!-- end #primary-content -->
<?php get_template_part( 'content', 'pricing-high-touch' ); ?>
<?php get_footer(); ?>