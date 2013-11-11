<?php
/**
 * Landing Title Content Template Part
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */
?>
<div id="landing-title" class="container">
    <div class="landing-title-wrap row">
        <div id="landing-title-content">
            <h1><?php echo get_post_meta( get_the_ID(), 'pressable_landing_title', true ); ?></h1>
            <p class="supports"><?php echo get_post_meta( get_the_ID(), 'pressable_landing_supports', true ); ?></p>
            <p class="no-margin"><a class="button button-large" href="<?php echo get_post_meta( get_the_ID(), 'pressable_landing_button_link', true ); ?>" title="<?php echo get_post_meta( get_the_ID(), 'pressable_landing_button', true ); ?>"><?php echo get_post_meta( get_the_ID(), 'pressable_landing_button', true ); ?></a></p>
            <p class="commitment"><?php echo get_post_meta( get_the_ID(), 'pressable_landing_sub', true ); ?></p>
        </div>
    </div>
</div><!-- end #landing-title -->