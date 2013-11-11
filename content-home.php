<?php
/**
 * Home Content Template Part
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */
?>
<div id="home-select" class="clearfix">
    <h2 class="center"><?php echo get_post_meta( get_the_ID(), 'pressable_plan_title', true ); ?></h2>
    <p class="supports center"><?php echo get_post_meta( get_the_ID(), 'pressable_plan_supports', true ); ?></p>
    <div class="home-select-boxes clearfix">
        <div class="home-box">
            <a class="home-box-click" href="#" title="Agencies/Developers">
                <div class="box-icon box-agency"></div>
                <h5 class="center"><?php echo get_post_meta( get_the_ID(), 'pressable_plan_agency_title', true ); ?></h5>
                <p class="center"><?php echo get_post_meta( get_the_ID(), 'pressable_plan_agency_supports', true ); ?></p>
            </a>
        </div>
        <div class="home-box">
            <a class="home-box-click" href="#" title="Marketers">
                <div class="box-icon box-marketer"></div>
                <h5 class="center"><?php echo get_post_meta( get_the_ID(), 'pressable_plan_marketer_title', true ); ?></h5>
                <p class="center"><?php echo get_post_meta( get_the_ID(), 'pressable_plan_marketer_supports', true ); ?></p>
            </a>
        </div>
        <div class="home-box last-item">
            <a class="home-box-click" href="#" title="Enterprise">
                <div class="box-icon box-enterprise"></div>
                <h5 class="center"><?php echo get_post_meta( get_the_ID(), 'pressable_plan_enterprise_title', true ); ?></h5>
                <p class="center"><?php echo get_post_meta( get_the_ID(), 'pressable_plan_enterprise_supports', true ); ?></p>
            </a>
        </div>
    </div>
    <p class="center no-margin"><a class="button button-large" href="<?php echo get_post_meta( get_the_ID(), 'pressable_plan_button_link', true ); ?>" title="<?php echo get_post_meta( get_the_ID(), 'pressable_plan_button', true ); ?>"><?php echo get_post_meta( get_the_ID(), 'pressable_plan_button', true ); ?></a></p>
    <p class="commitment center"><?php echo get_post_meta( get_the_ID(), 'pressable_plan_sub', true ); ?></p>
</div>