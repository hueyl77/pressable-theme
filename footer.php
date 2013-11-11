<?php
/**
 * Footer
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */

?></div><!-- end #main-container -->
<footer id="footer" class="container">
	<div class="footer-content-wrap row">
		<div class="inner-wrap clearfix">
			<div id="footer-widget-one" class="footer-widget">
			<?php if ( ! dynamic_sidebar( 'footer-widget-one' ) ) : ?>
				<div class="widget">
					<h4 class="widget-title"><?php _e( 'Footer Widget One', 'tgm' ); ?></h4>
					<p><?php printf( __( 'To configure this area with a widget, visit your <a href="%s">Widgets page</a> and drag a widget into the "Footer Widget One" sidebar.', 'tgm' ), admin_url( 'widgets.php' ) ); ?></p>
				</div>
			<?php endif; ?>
			</div><!-- end #footer-widget-one -->
			<div id="footer-widget-two" class="footer-widget">
			<?php if ( ! dynamic_sidebar( 'footer-widget-two' ) ) : ?>
				<div class="widget">
					<h4 class="widget-title"><?php _e( 'Footer Widget Two', 'tgm' ); ?></h4>
					<p><?php printf( __( 'To configure this area with a widget, visit your <a href="%s">Widgets page</a> and drag a widget into the "Footer Widget Two" sidebar.', 'tgm' ), admin_url( 'widgets.php' ) ); ?></p>
				</div>
			<?php endif; ?>
			</div><!-- end #footer-widget-two -->
			<div id="footer-widget-three" class="footer-widget">
			<?php if ( ! dynamic_sidebar( 'footer-widget-three' ) ) : ?>
				<div class="widget">
					<h4 class="widget-title"><?php _e( 'Footer Widget Three', 'tgm' ); ?></h4>
					<p><?php printf( __( 'To configure this area with a widget, visit your <a href="%s">Widgets page</a> and drag a widget into the "Footer Widget Three" sidebar.', 'tgm' ), admin_url( 'widgets.php' ) ); ?></p>
				</div>
			<?php endif; ?>
			</div><!-- end #footer-widget-three -->
			<div id="footer-widget-four" class="footer-widget">
			<?php if ( ! dynamic_sidebar( 'footer-widget-four' ) ) : ?>
				<div class="widget">
					<h4 class="widget-title"><?php _e( 'Footer Widget Four', 'tgm' ); ?></h4>
					<p><?php printf( __( 'To configure this area with a widget, visit your <a href="%s">Widgets page</a> and drag a widget into the "Footer Widget Four" sidebar.', 'tgm' ), admin_url( 'widgets.php' ) ); ?></p>
				</div>
			<?php endif; ?>
			</div><!-- end #footer-widget-four -->
			<div id="footer-widget-five" class="footer-widget">
			<?php if ( ! dynamic_sidebar( 'footer-widget-five' ) ) : ?>
				<div class="widget">
					<h4 class="widget-title"><?php _e( 'Footer Widget Five', 'tgm' ); ?></h4>
					<p><?php printf( __( 'To configure this area with a widget, visit your <a href="%s">Widgets page</a> and drag a widget into the "Footer Widget Five" sidebar.', 'tgm' ), admin_url( 'widgets.php' ) ); ?></p>
				</div>
			<?php endif; ?>
			</div><!-- end #footer-widget-four -->
		</div>
	</div>
</footer><!-- end #footer -->
<div id="footer-meta" class="container">
	<div class="footer-meta-wrap row">
	    <div id="footer-copyright">
			<p>Copyright © 2011 - 2013 Pressable ®. All rights reserved.</p>
		</div><!-- end #footer-copyright -->
		<div id="footer-info">
			<p>Pressable, 112 East Pecan Street Suite 1100, San Antonio TX 78205</p>
		</div><!-- end #footer-info -->
	</div>
</div><!-- end #footer-meta -->
<?php wp_footer(); ?>
</body>
</html>