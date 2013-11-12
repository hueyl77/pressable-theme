<?php
/**
 * Landing Content Template Part
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */
?>
<h2 class="center"><?php echo get_post_meta( get_the_ID(), 'pressable_landing_value_title', true ); ?></h2>
<p class="supports center"><?php echo get_post_meta( get_the_ID(), 'pressable_landing_value_supports', true ); ?></p>
<div id="landing-veins" class="clearfix"></div>
<div id="landing-items" class="clearfix">
    <div class="landing-item">
        <div class="landing-icon"><img src="<?php echo get_post_meta( get_the_ID(), 'pressable_landing_image_one', true ); ?>" alt="" /></div>
        <p class="center no-margin"><?php echo get_post_meta( get_the_ID(), 'pressable_landing_image_one_text', true ); ?></p>
    </div>
    <div class="landing-item">
        <div class="landing-icon"><img src="<?php echo get_post_meta( get_the_ID(), 'pressable_landing_image_two', true ); ?>" alt="" /></div>
        <p class="center no-margin"><?php echo get_post_meta( get_the_ID(), 'pressable_landing_image_two_text', true ); ?></p>
    </div>
    <div class="landing-item">
        <div class="landing-icon"><img src="<?php echo get_post_meta( get_the_ID(), 'pressable_landing_image_three', true ); ?>" alt="" /></div>
        <p class="center no-margin"><?php echo get_post_meta( get_the_ID(), 'pressable_landing_image_three_text', true ); ?></p>
    </div>
    <div class="landing-item last-item">
        <div class="landing-icon"></div>
        <div class="landing-icon"><img src="<?php echo get_post_meta( get_the_ID(), 'pressable_landing_image_four', true ); ?>" alt="" /></div>
        <p class="center no-margin"><?php echo get_post_meta( get_the_ID(), 'pressable_landing_image_four_text', true ); ?></p>
    </div>
</div>
<div id="landing-supports" class="clearfix">
    <div class="landing-supports-column float-left">
        <h3><?php echo get_post_meta( get_the_ID(), 'pressable_landing_feature_left_title', true ); ?></h3>
        <p class="supports"><?php echo get_post_meta( get_the_ID(), 'pressable_landing_feature_left_text', true ); ?></p>
        <p>
            <strong>Site Performance:</strong><br>
            HTML & object caching, premium DNS (a $200 value!), and server side optimizations help your client’s websites run 3x faster.
        </p>
        <div class="landing-supports-sep"></div>
        <p>
            <strong>Updates:</strong><br>
            Security updates & core WordPress updates are done automatically with each new release.
        </p>
        <div class="landing-supports-sep"></div>
        <p>
            <strong>Scaling:</strong><br>
            Your WordPress websites are ready to handle up to 20x daily traffic.
        </p>
        <div class="landing-supports-sep"></div>
        <p>
            <strong>All the extras:</strong><br>
            Daily backups, CDN, and pricing plans designed with the agency in mind. Designed to benefit agencies are based on consistent traffic, so a few spikes don’t warrant any additional costs for you or your clients.
        </p>
        <div class="landing-supports-sep"></div>
    </div>
    <div class="landing-supports-column float-right">
        <h3><?php echo get_post_meta( get_the_ID(), 'pressable_landing_feature_right_title', true ); ?></h3>
        <p class="supports"><?php echo get_post_meta( get_the_ID(), 'pressable_landing_feature_right_text', true ); ?></p>
    </div>
</div>