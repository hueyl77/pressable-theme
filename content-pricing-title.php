<?php
/**
 * Pricing Title Content Template Part
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */
?>
<div id="page-title" class="container">
    <div class="page-title-wrap row">
        <div id="page-title-content">
            <h1 class="center"><?php echo get_post_meta( get_the_ID(), 'pressable_pricing_title', true ); ?></h1>
            <p class="supports center no-margin"><?php echo get_post_meta( get_the_ID(), 'pressable_pricing_supports', true ); ?></p>
        </div>
    </div>
</div><!-- end #page-title -->