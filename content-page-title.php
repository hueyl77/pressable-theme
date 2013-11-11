<?php
/**
 * Page Title Content Template Part
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */
$custom_page_title = false;
$page_title = get_post_meta( get_the_ID(), 'pressable_page_title', true );
if ( $page_title && '' !== trim( $page_title ) )
    $custom_page_title = true;

if ( ! $custom_page_title ) return;
?>
<div id="page-title" class="container">
    <div class="page-title-wrap row">
        <div id="page-title-content">
            <h1 class="center"><?php echo $page_title; ?></h1>
            <?php $supports = get_post_meta( get_the_ID(), 'pressable_page_supports', true ); if ( $supports && '' !== trim( $supports ) ) : ?>
                <p class="supports center no-margin"><?php echo $supports; ?></p>
            <?php endif; ?>
        </div>
    </div>
</div><!-- end #page-title -->