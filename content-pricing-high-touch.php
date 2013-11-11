<?php
/**
 * Pricing High Touch Content Template Part
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */
?>
<div id="pricing-high-touch" class="container clearfix">
    <div class="pricing-high-touch-wrap row">
        <h3 class="center"><?php echo get_post_meta( get_the_ID(), 'pressable_pricing_high_title', true ); ?></h3>
        <p class="supports center"><?php echo get_post_meta( get_the_ID(), 'pressable_pricing_high_supports', true ); ?></p>
        <ul class="pricing-high-touch clearfix">
            <?php $high_touch = get_post_meta( get_the_ID(), 'pressable_pricing_high', true ); $n = 0; ?>
            <?php foreach ( (array) $high_touch as $i => $data ) : ?>
                <?php $class = ($n+1) == count( $high_touch ) ? 'last-item' : ''; ?>
                <li class="<?php echo $class; ?>">
                <div class="pricing-header">
                    <p class="pricing-title center"><?php echo $data['title']; ?></p>
                    <p class="pricing-price center no-margin"><?php echo $data['price']; ?> <span class="pricing-price-sub">p/mo</span></p>
                </div>
                <div class="pricing-box">
                    <ul class="pricing-features">
                        <?php foreach ( (array) $data['rows'] as $i => $row ) : ?>
                            <li>&bull; <?php echo $row; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <p class="no-margin center"><a href="<?php echo $data['button_link']; ?>" class="button" title="<?php echo $data['button']; ?>"><?php echo $data['button']; ?></a></p>
                </div>
            </li>
            <?php $n++; endforeach; ?>
        </ul>
    </div>
</div><!-- end #pricing-high-touch -->