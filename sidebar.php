<?php
/**
 * Sidebar
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */

?>
<div id="sidebar">
	<div class="sidebar-wrap sidebar">
	<?php if ( ! dynamic_sidebar( 'main-sidebar' ) ) : ?>
		<div class="widget">
			<h4 class="widget-title"><?php _e( 'Primary Sidebar Area', 'tgm' ); ?></h4>
			<p><?php printf( __( 'This is the primary sidebar area. You can drag and drop widgets into this area by visiting your <a href="%s">Widgets page</a>.', 'tgm' ), admin_url( 'widgets.php' ) ); ?></p>
		</div>
	<?php endif; ?>
	</div>
</div><!-- end #sidebar -->