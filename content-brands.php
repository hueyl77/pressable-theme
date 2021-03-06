<?php
/**
 * Brands Content Template Part
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */
$brands = get_option( 'pressable_options' );
?>
<div id="brands" class="container">
    <div class="brands-content-wrap row">
        <div class="inner-wrap clearfix">
            <h3><?php echo ( isset( $brands['brand_title'] ) ? $brands['brand_title'] : '' ); ?></h3>
            <p><?php echo ( isset( $brands['brand_supports'] ) ? $brands['brand_supports'] : '' ); ?></p>
            <div class="brands-images">
                <?php foreach( (array) $brands['brands'] as $i => $url ) : ?>
                    <?php $class = ($i+1) == count( $brands['brands'] ) ? 'brand-image last-item' : 'brand-image'; ?>
                    <img class="<?php echo $class; ?>" src="<?php echo esc_url( $url ); ?>" alt="" />
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div><!-- end #brands -->