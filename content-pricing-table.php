<?php
/**
 * Pricing Table Content Template Part
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */
$pricing_columns = get_post_meta( get_the_ID(), 'pressable_pricing_columns', true );
$column_number   = count( $pricing_columns );
$n = 0;
?>
<div id="pricing-table" class="clearfix">
    <div class="pricing-table-wrap pricing-columns-<?php echo $column_number; ?> clearfix">
        <?php foreach ( (array) $pricing_columns as $i => $column ) : ?>
            <?php
                if ( 0 == $n )
                    $class = 'pricing-column pricing-column-first';
                elseif ( ($n+1) == $column_number )
                    $class = 'pricing-column pricing-column-last';
                else
                    $class = 'pricing-column';
            ?>
            <div class="<?php echo $class; ?> pricing-<?php echo strtolower( sanitize_title_with_dashes( $column['title'] ) ); ?>">
                <div class="pricing-header">
                    <p class="pricing-title center"><?php echo $column['title']; ?></p>
                    <p class="pricing-price center no-margin"><?php echo $column['price']; ?> <span class="pricing-price-sub">p/mo</span></p>
                </div>
                <?php foreach ( (array) $column['rows'] as $i => $row ) : ?>
                    <?php $row_class = 0 == $i%2 ? 'pricing-row' : 'pricing-row pricing-row-alt'; ?>
                    <div class="<?php echo $row_class; ?>">
                        <p class="center no-margin"><?php echo $row; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php $n++; endforeach; ?>
        <div class="pricing-footer clearfix">
            <p class="pricing-asterisk float-left no-margin"><?php echo get_post_meta( get_the_ID(), 'pressable_pricing_footer', true ); ?></p>
            <p class="float-right no-margin"><a class="button" href="<?php echo get_post_meta( get_the_ID(), 'pressable_pricing_footer_button_link', true ); ?>" title="<?php echo get_post_meta( get_the_ID(), 'pressable_pricing_footer_button', true ); ?>"><?php echo get_post_meta( get_the_ID(), 'pressable_pricing_footer_button', true ); ?></a></p>
        </div>
    </div>
</div>