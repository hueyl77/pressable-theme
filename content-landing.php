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
    <div class="landing-item landing-stack">
        <div class="landing-icon"></div>
        <p class="center no-margin">Create a new WordPress account and launch it on the Pressable platform in two simple steps or clone an existing site with a single click.</p>
    </div>
    <div class="landing-item landing-arrows">
        <div class="landing-icon"></div>
        <p class="center no-margin">Invite collaborators & start building amazing websites without sharing passwords.</p>
    </div>
    <div class="landing-item landing-cloud">
        <div class="landing-icon"></div>
        <p class="center no-margin">Building what you want on a dedicated test site and deploy when you're ready.</p>
    </div>
    <div class="landing-item landing-cash last-item">
        <div class="landing-icon"></div>
        <p class="center no-margin">Pass on the savings to your clients with discounted pricing plans starting at $14 per site when you host 5 or more websites.</p>
    </div>
</div>
<div id="landing-supports" class="clearfix">
    <div class="landing-supports-column float-left">
        <h3>The Best Way to Spend Less Time on Hosting & More Time</h3>
        <p class="supports">Get Back to Things That Matter (Like Creating Great Content!) While We Handle:</p>
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
        <h3>Better Support For You Means the Best Support for Your Clients</h3>
        <p class="supports">Have the Accurate Answers You Need, When You Need Them:</p>
    </div>
</div>