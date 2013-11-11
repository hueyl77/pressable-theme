<?php
/**
 * Pricing Features Content Template Part
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */
?>
<div id="pricing-features">
    <h3 class="center"><?php echo get_post_meta( get_the_ID(), 'pressable_pricing_feature_title', true ); ?></h3>
    <ul class="pricing-features-list clearfix">
        <?php $features = get_post_meta( get_the_ID(), 'pressable_pricing_features', true ); foreach ( (array) $features as $i => $feature ) : $class = 2 == $i%3 || ($i+1) == count( $features ) ? 'last-item' : ''; ?>
        <li class="<?php echo $class; ?>"><?php echo $feature; ?></li>
        <?php endforeach; ?>
    </ul>
</div>