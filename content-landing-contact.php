<?php
/**
 * Landing Contact Content Template Part
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */
?>
<div id="landing-contact" class="clearfix">
    <?php echo do_shortcode( '[gravityform id="' . get_post_meta( get_the_ID(), 'pressable_landing_form', true ) . '"]' ); ?>
</div>