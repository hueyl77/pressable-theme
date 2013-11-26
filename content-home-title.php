<?php
/**
 * Home Title Content Template Part
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */
?>
<div id="mvp" class="container" style="background-image: url(<?php echo get_post_meta( get_the_ID(), 'pressable_home_image', true ); ?>);">
    <div class="mvp-content-wrap row">
        <div id="mvp-content">
            <h1 class="center"><?php echo get_post_meta( get_the_ID(), 'pressable_home_title', true ); ?></h1>
            <p class="supports center"><?php echo get_post_meta( get_the_ID(), 'pressable_home_supports', true ); ?></p>
            <p class="center no-margin"><a class="button button-large" href="<?php echo get_post_meta( get_the_ID(), 'pressable_home_button_link', true ); ?>" title="<?php echo get_post_meta( get_the_ID(), 'pressable_home_button', true ); ?>"><?php echo get_post_meta( get_the_ID(), 'pressable_home_button', true ); ?></a></p>
            <p class="commitment center"><?php echo get_post_meta( get_the_ID(), 'pressable_home_sub', true ); ?></p>
        </div>
    </div>
</div><!-- end #mvp -->