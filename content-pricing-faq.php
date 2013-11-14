<?php
/**
 * Pricing FAQ Content Template Part
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */
?>
<div id="pricing-faq" class="clearfix">
    <?php $faq = get_post_meta( get_the_ID(), 'pressable_pricing_faq', true ); $n = 0; ?>
    <?php foreach ( (array) $faq as $i => $data ) : ?>
        <?php $class = 0 == $i%2 ? 'pricing-faq float-left' : 'pricing-faq float-right'; ?>
        <?php echo (!$i%2) ? '<div class="clearfix">' : ''; ?>
	        <div class="<?php echo $class; ?>">
	            <strong class="faq-title"><?php echo $data['title']; ?></strong>
	            <p><?php echo $data['desc']; ?></p>
	        </div>
	    <?php echo ($i%2) ? '</div>' : ''; ?>
    <?php $n++; endforeach; ?>
</div>
