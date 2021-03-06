<?php
/**
 * Admin Init
 *
 * This file loads the admin end of the theme into WordPress.
 *
 * @package      Pressable_Admin
 * @author       Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright    Copyright © 2013, Thomas Griffin
 * @license      http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */

class Pressable_Admin {

    public $slug;
    public $options;

	public function __construct() {

        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'add_meta_boxes', array( $this, 'page_box' ) );
        add_action( 'add_meta_boxes', array( $this, 'home_box' ) );
        add_action( 'add_meta_boxes', array( $this, 'pricing_box' ) );
        add_action( 'add_meta_boxes', array( $this, 'landing_box' ) );
        add_action( 'save_post', array( $this, 'save_settings' ), 10, 2 );
        add_action( 'save_post', array( $this, 'save_pricing_settings' ), 10, 2 );
        add_action( 'save_post', array( $this, 'save_landing_settings' ), 10, 2 );
        add_action( 'admin_menu', array( $this, 'menu' ) );

	}

	public function enqueue_scripts( $hook ) {

	    if ( 'post.php' == trim( $hook ) ) {
    	    wp_enqueue_script( 'pressable-admin', get_template_directory_uri() . '/js/admin.js', array( 'jquery', 'jquery-ui-sortable' ), '1.0.0', true );
        }

	}

	public function page_box( $post_type ) {

	    if ( 'page' !== $post_type || empty( $_GET['post'] ) ) return;

        add_meta_box( 'pressable-page', 'Pressable Page Settings', array( $this, 'pressable_page' ), $post_type, 'normal', 'high' );

	}

	public function home_box( $post_type ) {

	    if ( 'page' !== $post_type || empty( $_GET['post'] ) ) return;

	    $template = get_post_meta( $_GET['post'], '_wp_page_template', true );

	    if ( $template && 'templates/home.php' !== $template ) return;

        add_meta_box( 'pressable-home', 'Pressable Home Settings', array( $this, 'pressable_home' ), $post_type, 'normal', 'high' );

	}

	public function pricing_box( $post_type ) {

	    if ( 'page' !== $post_type || empty( $_GET['post'] ) ) return;

	    $template = get_post_meta( $_GET['post'], '_wp_page_template', true );

	    if ( $template && 'templates/pricing.php' !== $template ) return;

        add_meta_box( 'pressable-pricing', 'Pressable Pricing Settings', array( $this, 'pressable_pricing' ), $post_type, 'normal', 'high' );

	}

	public function landing_box( $post_type ) {

	    if ( 'page' !== $post_type || empty( $_GET['post'] ) ) return;

	    $template = get_post_meta( $_GET['post'], '_wp_page_template', true );

	    if ( $template && 'templates/landing.php' !== $template ) return;

        add_meta_box( 'pressable-landing', 'Pressable Landing Settings', array( $this, 'pressable_landing' ), $post_type, 'normal', 'high' );

	}

	public function pressable_page( $post ) {

    	?>
    	<p><strong>These settings are only used in the default, full width and left sidebar page templates. Other custom page templates do not utilize the fields below.</strong></p>
    	<table class="form-table">
    	    <tbody>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-page-title">Page Title</label></th>
    	            <td><input id="pressable-page-title" type="text" name="pressable[page_title]" value="<?php echo get_post_meta( $post->ID, 'pressable_page_title', true ); ?>" size="70" placeholder="Enter the page main value prop title here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-page-supports">Page Supporting Text</label></th>
    	            <td><textarea id="pressable-page-supports" name="pressable[page_supports]" placeholder="Enter the page main value prop supporting text here." rows="5" cols="71"><?php echo get_post_meta( $post->ID, 'pressable_page_supports', true ); ?></textarea></td>
    	        </tr>
    	    </tbody>
    	</table>
    	<?php

	}

	public function pressable_home( $post ) {

    	?>
    	<h4>MVP Settings</h4>
    	<table class="form-table">
    	    <tbody>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-home-title">Home Value Prop Title</label></th>
    	            <td><input id="pressable-home-title" type="text" name="pressable[home_title]" value="<?php echo get_post_meta( $post->ID, 'pressable_home_title', true ); ?>" size="70" placeholder="Enter the home main value prop title here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-home-supports">Home Value Prop Supporting Text</label></th>
    	            <td><textarea id="pressable-home-supports" name="pressable[home_supports]" placeholder="Enter the home main value prop supporting text here." rows="5" cols="71"><?php echo get_post_meta( $post->ID, 'pressable_home_supports', true ); ?></textarea></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-home-button">Home Value Button Text</label></th>
    	            <td><input id="pressable-home-button" type="text" name="pressable[home_button]" value="<?php echo get_post_meta( $post->ID, 'pressable_home_button', true ); ?>" size="70" placeholder="Enter the home main value button text here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-home-button-link">Home Value Button Link</label></th>
    	            <td><input id="pressable-home-button-link" type="text" name="pressable[home_button_link]" value="<?php echo get_post_meta( $post->ID, 'pressable_home_button_link', true ); ?>" size="70" placeholder="Enter the home main value button link here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-home-sub">Home Value Sub Button Text</label></th>
    	            <td><input id="pressable-home-sub" type="text" name="pressable[home_sub]" value="<?php echo get_post_meta( $post->ID, 'pressable_home_sub', true ); ?>" size="70" placeholder="Enter the home main value sub button text here." /></td>
    	        </tr>
    	        <tr valign="middle">
					<th scope="row"><label for="pressable-home-image">Home Value Image</label></th>
					<td>
						<input type="text" name="pressable[home_image]" id="pressable-home-image" size="34" value="<?php echo get_post_meta( $post->ID, 'pressable_home_image', true ); ?>" placeholder="Upload the home value image (must be 410px height)." />&nbsp;<a href="#" class="tgm-open-media button button-primary">Click Here to Upload Image</a>&nbsp;<a href="#" class="tgm-remove-media button button-secondary">Remove</a>
					</td>
				</tr>
    	    </tbody>
    	</table>

    	<hr />

        <h4>Plan Selection Settings</h4>
    	<table class="form-table">
    	    <tbody>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-plan-title">Plan Selection Title</label></th>
    	            <td><input id="pressable-plan-title" type="text" name="pressable[plan_title]" value="<?php echo get_post_meta( $post->ID, 'pressable_plan_title', true ); ?>" size="70" placeholder="Enter the home plan selection title here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-plan-supports">Plan Supporting Text</label></th>
    	            <td><textarea id="pressable-plan-supports" name="pressable[plan_supports]" placeholder="Enter the plan supporting text here." rows="5" cols="71"><?php echo get_post_meta( $post->ID, 'pressable_plan_supports', true ); ?></textarea></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-plan-agency-title">Agency Box Title</label></th>
    	            <td><input id="pressable-plan-agency-title" type="text" name="pressable[plan_agency_title]" value="<?php echo get_post_meta( $post->ID, 'pressable_plan_agency_title', true ); ?>" size="70" placeholder="Enter the agency plan title here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-plan-agency-supports">Agency Box Supporting Text</label></th>
    	            <td><input id="pressable-plan-agency-supports" type="text" name="pressable[plan_agency_supports]" value="<?php echo get_post_meta( $post->ID, 'pressable_plan_agency_supports', true ); ?>" size="70" placeholder="Enter the agency supporting text here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-plan-agency-link">Agency Box Link</label></th>
    	            <td><input id="pressable-plan-agency-link" type="text" name="pressable[plan_agency_link]" value="<?php echo get_post_meta( $post->ID, 'pressable_plan_agency_link', true ); ?>" size="70" placeholder="Enter the agency box link here." /></td>
    	        </tr>
				<tr valign="middle">
    	            <th scope="row"><label for="pressable-plan-marketer-title">Marketer Box Title</label></th>
    	            <td><input id="pressable-plan-marketer-title" type="text" name="pressable[plan_marketer_title]" value="<?php echo get_post_meta( $post->ID, 'pressable_plan_marketer_title', true ); ?>" size="70" placeholder="Enter the marketer plan title here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-plan-marketer-supports">Marketer Box Supporting Text</label></th>
    	            <td><input id="pressable-plan-marketer-supports" type="text" name="pressable[plan_marketer_supports]" value="<?php echo get_post_meta( $post->ID, 'pressable_plan_marketer_supports', true ); ?>" size="70" placeholder="Enter the marketer supporting text here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-plan-marketer-link">Marketer Box Link</label></th>
    	            <td><input id="pressable-plan-marketer-link" type="text" name="pressable[plan_marketer_link]" value="<?php echo get_post_meta( $post->ID, 'pressable_plan_marketer_link', true ); ?>" size="70" placeholder="Enter the marketer box link here." /></td>
    	        </tr>
				<tr valign="middle">
    	            <th scope="row"><label for="pressable-plan-enterprise-title">Enterprise Box Title</label></th>
    	            <td><input id="pressable-plan-enterprise-title" type="text" name="pressable[plan_enterprise_title]" value="<?php echo get_post_meta( $post->ID, 'pressable_plan_enterprise_title', true ); ?>" size="70" placeholder="Enter the enterprise plan title here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-plan-enterprise-supports">Enterprise Box Supporting Text</label></th>
    	            <td><input id="pressable-plan-enterprise-supports" type="text" name="pressable[plan_enterprise_supports]" value="<?php echo get_post_meta( $post->ID, 'pressable_plan_enterprise_supports', true ); ?>" size="70" placeholder="Enter the enterprise supporting text here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-plan-enterprise-link">Enterprise Box Link</label></th>
    	            <td><input id="pressable-plan-enterprise-link" type="text" name="pressable[plan_enterprise_link]" value="<?php echo get_post_meta( $post->ID, 'pressable_plan_enterprise_link', true ); ?>" size="70" placeholder="Enter the enterprise box link here." /></td>
    	        </tr>
				<tr valign="middle">
    	            <th scope="row"><label for="pressable-plan-button">Plan Button Text</label></th>
    	            <td><input id="pressable-plan-button" type="text" name="pressable[plan_button]" value="<?php echo get_post_meta( $post->ID, 'pressable_plan_button', true ); ?>" size="70" placeholder="Enter the plan button text here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-plan-button-link">Plan Button Link</label></th>
    	            <td><input id="pressable-plan-button-link" type="text" name="pressable[plan_button_link]" value="<?php echo get_post_meta( $post->ID, 'pressable_plan_button_link', true ); ?>" size="70" placeholder="Enter the plan main value button link here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-plan-sub">Plan Sub Button Text</label></th>
    	            <td><input id="pressable-plan-sub" type="text" name="pressable[plan_sub]" value="<?php echo get_post_meta( $post->ID, 'pressable_plan_sub', true ); ?>" size="70" placeholder="Enter the plan sub button text here." /></td>
    	        </tr>
    	    </tbody>
    	</table>
    	<?php

	}

	public function pressable_pricing( $post ) {

    	?>
    	<h4>Pricing Header Settings</h4>
    	<table class="form-table">
    	    <tbody>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-pricing-title">Pricing Value Prop Title</label></th>
    	            <td><input id="pressable-pricing-title" type="text" name="pressable[pricing_title]" value="<?php echo get_post_meta( $post->ID, 'pressable_pricing_title', true ); ?>" size="70" placeholder="Enter the pricing main value prop title here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-pricing-supports">Pricing Value Prop Supporting Text</label></th>
    	            <td><textarea id="pressable-pricing-supports" name="pressable[pricing_supports]" placeholder="Enter the pricing main value prop supporting text here." rows="5" cols="71"><?php echo get_post_meta( $post->ID, 'pressable_pricing_supports', true ); ?></textarea></td>
    	        </tr>
    	    </tbody>
    	</table>

    	<hr>

    	<h4>Pricing Table Settings</h4>
    	<p>Each section is for a pricing column. You can add/delete columns with the buttons. These columns can also be sorted as you see fit.</p>
    	<table class="form-table">
    	    <tbody>
    	        <tr valign="middle">
    	            <th scope="row"><label>Pricing Columns</label></th>
    	            <td>
        	            <ul class="tgm-repeatable-fields" style="margin:0;">
						    <?php $pricing_fields = get_post_meta( $post->ID, 'pressable_pricing_columns', true ); if ( empty( $pricing_fields ) ) : ?>
						        <li class="tgm-repeating-field" data-number="0" data-column="true" style="margin-bottom:10px;border: 5px dashed #e5e5e5;padding:10px;cursor:move;">
    						            <a class="tgm-repeat-field button button-primary" title="Repeat Field" style="vertical-align: middle;margin-bottom: 10px;">Repeat Field</a> <a class="tgm-remove-field button button-secondary" title="Remove Field" style="vertical-align: middle;margin-bottom: 10px;">Remove Field</a>
						            <p>
						                <label><strong>Pricing Column Title</strong></label> <input type="text" name="_pressable_pricing[0][title]" value="" size="45" placeholder="Enter the pricing column title here." />
						            </p>
						            <p>
						                <label><strong>Pricing Column Price</strong></label> <input type="text" name="_pressable_pricing[0][price]" value="" size="45" placeholder="Enter the pricing column price here." />
						            </p>
						            <p><strong>Pricing Row Items</strong></p>
						            <ul class="tgm-repeatable-fields">
						                <li class="tgm-repeating-field" data-number="0" data-column="false" style="margin-bottom:5px;cursor:move;">
						                    <img src="<?php echo get_template_directory_uri(); ?>/admin/images/sortable.gif" style="vertical-align: middle; cursor: move;" />
						                    <input type="text" name="_pressable_pricing[0][rows][]" value="" size="35" placeholder="Enter the pricing row item here." /> <a class="tgm-repeat-field button button-primary" title="Repeat Field">Repeat Field</a> <a class="tgm-remove-field button button-secondary" title="Remove Field">Remove Field</a>
						                </li>
						            </ul>
						        </li>
						    <?php else : ?>
						    <?php foreach ( (array) $pricing_fields as $i => $field ) : ?>
						        <li class="tgm-repeating-field" data-number="<?php echo $i; ?>" data-column="true" style="margin-bottom:10px;border: 5px dashed #e5e5e5;padding:10px;cursor:move;">

						            <a class="tgm-repeat-field button button-primary" title="Repeat Field" style="vertical-align: middle;margin-bottom: 10px;">Repeat Field</a> <a class="tgm-remove-field button button-secondary" title="Remove Field" style="vertical-align: middle;margin-bottom: 10px;">Remove Field</a>
						            <p>
						                <label><strong>Pricing Column Title</strong></label> <input type="text" name="_pressable_pricing[<?php echo $i; ?>][title]" value="<?php echo $field['title']; ?>" size="45" placeholder="Enter the pricing column title here." />
						            </p>
						            <p>
						                <label><strong>Pricing Column Price</strong></label> <input type="text" name="_pressable_pricing[<?php echo $i; ?>][price]" value="<?php echo $field['price']; ?>" size="45" placeholder="Enter the pricing column price here." />
						            </p>
						            <p><strong>Pricing Row Items</strong></p>
                                    <ul class="tgm-repeatable-fields">
                                        <?php foreach ( (array) $field['rows'] as $n => $row ) : ?>
						                <li class="tgm-repeating-field" data-number="<?php echo $n; ?>" data-column="false" style="margin-bottom:5px;cursor:move;">
						                    <img src="<?php echo get_template_directory_uri(); ?>/admin/images/sortable.gif" style="vertical-align: middle; cursor: move;" />
						                    <input type="text" name="_pressable_pricing[<?php echo $i; ?>][rows][]" value="<?php echo esc_attr( $row ); ?>" size="35" placeholder="Enter the pricing row item here." /> <a class="tgm-repeat-field button button-primary" title="Repeat Field">Repeat Field</a> <a class="tgm-remove-field button button-secondary" title="Remove Field">Remove Field</a>
						                </li>
						                <?php endforeach; ?>
						            </ul>
						        </li>
							<?php endforeach; ?>
							<?php endif; ?>
					    </ul>
    	            </td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-pricing-footer">Pricing Box Footer Text</label></th>
    	            <td><input id="pressable-pricing-footer" type="text" name="pressable[pricing_footer]" value="<?php echo get_post_meta( $post->ID, 'pressable_pricing_footer', true ); ?>" size="70" placeholder="Enter the pricing table footer text here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-pricing-footer-button">Pricing Box Footer Button Text</label></th>
    	            <td><input id="pressable-pricing-footer-button" type="text" name="pressable[pricing_footer_button]" value="<?php echo get_post_meta( $post->ID, 'pressable_pricing_footer_button', true ); ?>" size="70" placeholder="Enter the pricing table footer button text here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-pricing-footer-button-link">Pricing Box Footer Button Link</label></th>
    	            <td><input id="pressable-pricing-footer-button-link" type="text" name="pressable[pricing_footer_button_link]" value="<?php echo get_post_meta( $post->ID, 'pressable_pricing_footer_button_link', true ); ?>" size="70" placeholder="Enter the pricing table footer button link here." /></td>
    	        </tr>
    	    </tbody>
    	</table>

    	<hr>

    	<h4>Pricing Feature Settings</h4>
    	<table class="form-table">
    	    <tbody>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-pricing-feature-title">Pricing Feature Title</label></th>
    	            <td><input id="pressable-feature-title" type="text" name="pressable[pricing_feature_title]" value="<?php echo get_post_meta( $post->ID, 'pressable_pricing_feature_title', true ); ?>" size="70" placeholder="Enter the pricing feature title here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label>Pricing Features</label></th>
    	            <td>
    	                <ul class="tgm-repeatable-fields" style="margin:0;">
    	                    <?php $pricing_features = get_post_meta( $post->ID, 'pressable_pricing_features', true ); if ( empty( $pricing_fields ) ) : ?>
    	                    <li class="tgm-repeating-field" data-number="0" data-column="false" style="margin-bottom:5px;cursor:move;">
			                    <img src="<?php echo get_template_directory_uri(); ?>/admin/images/sortable.gif" style="vertical-align: middle; cursor: move;" />
			                    <input type="text" name="pressable[pricing_features][]" value="" size="35" placeholder="Enter the pricing feature here." /> <a class="tgm-repeat-field button button-primary" title="Repeat Field">Repeat Field</a> <a class="tgm-remove-field button button-secondary" title="Remove Field">Remove Field</a>
			                </li>
			                <?php else : ?>
                            <?php foreach ( (array) $pricing_features as $n => $feature ) : ?>
			                <li class="tgm-repeating-field" data-number="<?php echo $n; ?>" data-column="false" style="margin-bottom:5px;cursor:move;">
			                    <img src="<?php echo get_template_directory_uri(); ?>/admin/images/sortable.gif" style="vertical-align: middle; cursor: move;" />
			                    <input type="text" name="pressable[pricing_features][]" value="<?php echo esc_attr( $feature ); ?>" size="35" placeholder="Enter the pricing feature here." /> <a class="tgm-repeat-field button button-primary" title="Repeat Field">Repeat Field</a> <a class="tgm-remove-field button button-secondary" title="Remove Field">Remove Field</a>
			                </li>
			                <?php endforeach; ?>
			                <?php endif; ?>
			            </ul>
    	            </td>
    	        </tr>
    	    </tbody>
    	</table>

    	<hr>

    	<h4>Pricing FAQ Settings</h4>
    	<table class="form-table">
    	    <tbody>
    	        <tr valign="middle">
    	            <th scope="row"><label>Pricing FAQ</label></th>
    	            <td>
    	                <ul class="tgm-repeatable-fields" style="margin:0;">
    	                    <?php $pricing_faq = get_post_meta( $post->ID, 'pressable_pricing_faq', true ); if ( empty( $pricing_faq ) ) : ?>
    	                    <li class="tgm-repeating-field" data-number="0" data-column="true" style="margin-bottom:10px;border: 5px dashed #e5e5e5;padding:10px;cursor:move;">
					            <a class="tgm-repeat-field button button-primary" title="Repeat Field" style="vertical-align: middle;margin-bottom: 10px;">Repeat Field</a> <a class="tgm-remove-field button button-secondary" title="Remove Field" style="vertical-align: middle;margin-bottom: 10px;">Remove Field</a>
					            <p>
    			                    <label><strong>Pricing FAQ Title</strong></label> <input type="text" name="_pressable_faq[0][title]" value="" size="35" placeholder="Enter the pricing faq title here." />
					            </p>
					            <p>
    			                    <label><strong>Pricing FAQ Description</strong></label> <textarea name="_pressable_faq[0][faq]" value="" rows="5" cols="34" placeholder="Enter the pricing faq title here."></textarea>
					            </p>
			                </li>
			                <?php else : ?>
                            <?php foreach ( (array) $pricing_faq as $n => $faq ) : ?>
			                <li class="tgm-repeating-field" data-number="<?php echo $n; ?>" data-column="true" style="margin-bottom:10px;border: 5px dashed #e5e5e5;padding:10px;cursor:move;">
					            <a class="tgm-repeat-field button button-primary" title="Repeat Field" style="vertical-align: middle;margin-bottom: 10px;">Repeat Field</a> <a class="tgm-remove-field button button-secondary" title="Remove Field" style="vertical-align: middle;margin-bottom: 10px;">Remove Field</a>
			                    <p>
    			                    <label><strong>Pricing FAQ Title</strong></label> <input type="text" name="_pressable_faq[<?php echo $n; ?>][title]" value="<?php echo $faq['title']; ?>" size="35" placeholder="Enter the pricing faq title here." />
					            </p>
					            <p>
    			                    <label><strong>Pricing FAQ Description</strong></label> <textarea name="_pressable_faq[<?php echo $n; ?>][desc]" value="" rows="5" cols="34" placeholder="Enter the pricing faq title here."><?php echo $faq['desc']; ?></textarea>
					            </p>
			                </li>
			                <?php endforeach; ?>
			                <?php endif; ?>
			            </ul>
    	            </td>
    	        </tr>
    	    </tbody>
    	</table>

    	<hr>

    	<h4>Pricing High Touch Settings</h4>
    	<p>Each section is for a pricing column. You can add/delete columns with the buttons. These columns can also be sorted as you see fit.</p>
    	<table class="form-table">
    	    <tbody>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-pricing-high-title">Pricing High Touch Title</label></th>
    	            <td><input id="pressable-high-title" type="text" name="pressable[pricing_high_title]" value="<?php echo get_post_meta( $post->ID, 'pressable_pricing_high_title', true ); ?>" size="70" placeholder="Enter the pricing high touch title here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-pricing-high-supports">Pricing High Touch Supporting Text</label></th>
    	            <td><input id="pressable-high-supports" type="text" name="pressable[pricing_high_supports]" value="<?php echo get_post_meta( $post->ID, 'pressable_pricing_high_supports', true ); ?>" size="70" placeholder="Enter the pricing high touch supporting text here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label>Pricing Columns</label></th>
    	            <td>
        	            <ul class="tgm-repeatable-fields" style="margin:0;">
						    <?php $pricing_high = get_post_meta( $post->ID, 'pressable_pricing_high', true ); if ( empty( $pricing_high ) ) : ?>
						        <li class="tgm-repeating-field" data-number="0" data-column="true" style="margin-bottom:10px;border: 5px dashed #e5e5e5;padding:10px;cursor:move;">
    						            <a class="tgm-repeat-field button button-primary" title="Repeat Field" style="vertical-align: middle;margin-bottom: 10px;">Repeat Field</a> <a class="tgm-remove-field button button-secondary" title="Remove Field" style="vertical-align: middle;margin-bottom: 10px;">Remove Field</a>
						            <p>
						                <label><strong>Pricing Column Title</strong></label> <input type="text" name="_pressable_high[0][title]" value="" size="45" placeholder="Enter the pricing column title here." />
						            </p>
						            <p>
						                <label><strong>Pricing Column Price</strong></label> <input type="text" name="_pressable_high[0][price]" value="" size="45" placeholder="Enter the pricing column price here." />
						            </p>
						            <p><strong>Pricing Row Items</strong></p>
						            <ul class="tgm-repeatable-fields">
						                <li class="tgm-repeating-field" data-number="0" data-column="false" style="margin-bottom:5px;cursor:move;">
						                    <img src="<?php echo get_template_directory_uri(); ?>/admin/images/sortable.gif" style="vertical-align: middle; cursor: move;" />
						                    <input type="text" name="_pressable_high[0][rows][]" value="" size="35" placeholder="Enter the pricing row item here." /> <a class="tgm-repeat-field button button-primary" title="Repeat Field">Repeat Field</a> <a class="tgm-remove-field button button-secondary" title="Remove Field">Remove Field</a>
						                </li>
						            </ul>
						            <p>
						                <label><strong>Pricing Column Button Text</strong></label> <input type="text" name="_pressable_high[0][button]" value="" size="45" placeholder="Enter the pricing column button text here." />
						            </p>
						            <p>
						                <label><strong>Pricing Column Button Link</strong></label> <input type="text" name="_pressable_high[0][button_link]" value="" size="45" placeholder="Enter the pricing column button link here." />
						            </p>
						        </li>
						    <?php else : ?>
						    <?php foreach ( (array) $pricing_high as $i => $field ) : ?>
						        <li class="tgm-repeating-field" data-number="<?php echo $i; ?>" data-column="true" style="margin-bottom:10px;border: 5px dashed #e5e5e5;padding:10px;cursor:move;">

						            <a class="tgm-repeat-field button button-primary" title="Repeat Field" style="vertical-align: middle;margin-bottom: 10px;">Repeat Field</a> <a class="tgm-remove-field button button-secondary" title="Remove Field" style="vertical-align: middle;margin-bottom: 10px;">Remove Field</a>
						            <p>
						                <label><strong>Pricing Column Title</strong></label> <input type="text" name="_pressable_high[<?php echo $i; ?>][title]" value="<?php echo $field['title']; ?>" size="45" placeholder="Enter the pricing column title here." />
						            </p>
						            <p>
						                <label><strong>Pricing Column Price</strong></label> <input type="text" name="_pressable_high[<?php echo $i; ?>][price]" value="<?php echo $field['price']; ?>" size="45" placeholder="Enter the pricing column price here." />
						            </p>
						            <p><strong>Pricing Row Items</strong></p>
                                    <ul class="tgm-repeatable-fields">
                                        <?php foreach ( (array) $field['rows'] as $n => $row ) : ?>
						                <li class="tgm-repeating-field" data-number="<?php echo $n; ?>" data-column="false" style="margin-bottom:5px;cursor:move;">
						                    <img src="<?php echo get_template_directory_uri(); ?>/admin/images/sortable.gif" style="vertical-align: middle; cursor: move;" />
						                    <input type="text" name="_pressable_high[<?php echo $i; ?>][rows][]" value="<?php echo esc_attr( $row ); ?>" size="35" placeholder="Enter the pricing row item here." /> <a class="tgm-repeat-field button button-primary" title="Repeat Field">Repeat Field</a> <a class="tgm-remove-field button button-secondary" title="Remove Field">Remove Field</a>
						                </li>
						                <?php endforeach; ?>
						            </ul>
						            <p>
						                <label><strong>Pricing Column Button Text</strong></label> <input type="text" name="_pressable_high[<?php echo $i; ?>][button]" value="<?php echo $field['button']; ?>" size="45" placeholder="Enter the pricing column button text here." />
						            </p>
						            <p>
						                <label><strong>Pricing Column Button Link</strong></label> <input type="text" name="_pressable_high[<?php echo $i; ?>][button_link]" value="<?php echo $field['button_link']; ?>" size="45" placeholder="Enter the pricing column button link here." />
						            </p>
						        </li>
							<?php endforeach; ?>
							<?php endif; ?>
					    </ul>
    	            </td>
    	        </tr>
    	    </tbody>
    	</table>
    	<?php

	}

	public function pressable_landing( $post ) {

    	?>
    	<h4>Landing Title Settings</h4>
    	<table class="form-table">
    	    <tbody>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-landing-title">Landing Value Prop Title</label></th>
    	            <td><input id="pressable-landing-title" type="text" name="pressable[landing_title]" value="<?php echo get_post_meta( $post->ID, 'pressable_landing_title', true ); ?>" size="70" placeholder="Enter the landing main value prop title here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-landing-supports">Landing Value Prop Supporting Text</label></th>
    	            <td><textarea id="pressable-landing-supports" name="pressable[landing_supports]" placeholder="Enter the landing main value prop supporting text here." rows="5" cols="71"><?php echo get_post_meta( $post->ID, 'pressable_landing_supports', true ); ?></textarea></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-landing-button">Landing Value Button Text</label></th>
    	            <td><input id="pressable-landing-button" type="text" name="pressable[landing_button]" value="<?php echo get_post_meta( $post->ID, 'pressable_landing_button', true ); ?>" size="70" placeholder="Enter the landing main value button text here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-landing-button-link">Landing Value Button Link</label></th>
    	            <td><input id="pressable-landing-button-link" type="text" name="pressable[landing_button_link]" value="<?php echo get_post_meta( $post->ID, 'pressable_landing_button_link', true ); ?>" size="70" placeholder="Enter the landing main value button link here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-landing-sub">Landing Value Sub Button Text</label></th>
    	            <td><input id="pressable-landing-sub" type="text" name="pressable[landing_sub]" value="<?php echo get_post_meta( $post->ID, 'pressable_landing_sub', true ); ?>" size="70" placeholder="Enter the landing main value sub button text here." /></td>
    	        </tr>
    	    </tbody>
    	</table>

    	<hr />

        <h4>Landing Value Settings</h4>
    	<table class="form-table">
    	    <tbody>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-landing-value-title">Landing Value Title</label></th>
    	            <td><input id="pressable-landing-value-title" type="text" name="pressable[landing_value_title]" value="<?php echo get_post_meta( $post->ID, 'pressable_landing_value_title', true ); ?>" size="70" placeholder="Enter the home landing value selection title here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-landing-value-supports">Landing Value Supporting Text</label></th>
    	            <td><textarea id="pressable-landing-value-supports" name="pressable[landing_value_supports]" placeholder="Enter the landing value supporting text here." rows="5" cols="71"><?php echo get_post_meta( $post->ID, 'pressable_landing_value_supports', true ); ?></textarea></td>
    	        </tr>
    	        <tr valign="middle">
					<th scope="row"><label for="pressable-landing-image-one">Landing Value First Icon</label></th>
					<td>
						<input type="text" name="pressable[landing_image_one]" id="pressable-landing-image-one" size="34" value="<?php echo get_post_meta( $post->ID, 'pressable_landing_image_one', true ); ?>" placeholder="Upload the first landing icon here." />&nbsp;<a href="#" class="tgm-open-media button button-primary">Click Here to Upload Image</a>&nbsp;<a href="#" class="tgm-remove-media button button-secondary">Remove</a>
					</td>
				</tr>
				<tr valign="middle">
    	            <th scope="row"><label for="pressable-landing-image-one-text">Landing Value First Icon Text</label></th>
    	            <td><input id="pressable-landing-image-one-text" type="text" name="pressable[landing_image_one_text]" value="<?php echo get_post_meta( $post->ID, 'pressable_landing_image_one_text', true ); ?>" size="70" placeholder="Upload the first landing icon text here." /></td>
    	        </tr>
    	        <tr valign="middle">
					<th scope="row"><label for="pressable-landing-image-two">Landing Value Second Icon</label></th>
					<td>
						<input type="text" name="pressable[landing_image_two]" id="pressable-landing-image-two" size="34" value="<?php echo get_post_meta( $post->ID, 'pressable_landing_image_two', true ); ?>" placeholder="Upload the second landing icon here." />&nbsp;<a href="#" class="tgm-open-media button button-primary">Click Here to Upload Image</a>&nbsp;<a href="#" class="tgm-remove-media button button-secondary">Remove</a>
					</td>
				</tr>
				<tr valign="middle">
    	            <th scope="row"><label for="pressable-landing-image-two-text">Landing Value Second Icon Text</label></th>
    	            <td><input id="pressable-landing-image-two-text" type="text" name="pressable[landing_image_two_text]" value="<?php echo get_post_meta( $post->ID, 'pressable_landing_image_two_text', true ); ?>" size="70" placeholder="Upload the second landing icon text here." /></td>
    	        </tr>
    	        <tr valign="middle">
					<th scope="row"><label for="pressable-landing-image-three">Landing Value Third Icon</label></th>
					<td>
						<input type="text" name="pressable[landing_image_three]" id="pressable-landing-image-three" size="34" value="<?php echo get_post_meta( $post->ID, 'pressable_landing_image_three', true ); ?>" placeholder="Upload the third landing icon here." />&nbsp;<a href="#" class="tgm-open-media button button-primary">Click Here to Upload Image</a>&nbsp;<a href="#" class="tgm-remove-media button button-secondary">Remove</a>
					</td>
				</tr>
				<tr valign="middle">
    	            <th scope="row"><label for="pressable-landing-image-three-text">Landing Value Third Icon Text</label></th>
    	            <td><input id="pressable-landing-image-three-text" type="text" name="pressable[landing_image_three_text]" value="<?php echo get_post_meta( $post->ID, 'pressable_landing_image_three_text', true ); ?>" size="70" placeholder="Upload the third landing icon text here." /></td>
    	        </tr>
    	        <tr valign="middle">
					<th scope="row"><label for="pressable-landing-image-four">Landing Value Fourth Icon</label></th>
					<td>
						<input type="text" name="pressable[landing_image_four]" id="pressable-landing-image-four" size="34" value="<?php echo get_post_meta( $post->ID, 'pressable_landing_image_four', true ); ?>" placeholder="Upload the fourth landing icon here." />&nbsp;<a href="#" class="tgm-open-media button button-primary">Click Here to Upload Image</a>&nbsp;<a href="#" class="tgm-remove-media button button-secondary">Remove</a>
					</td>
				</tr>
				<tr valign="middle">
    	            <th scope="row"><label for="pressable-landing-image-four-text">Landing Value Fourth Icon Text</label></th>
    	            <td><input id="pressable-landing-image-four-text" type="text" name="pressable[landing_image_four_text]" value="<?php echo get_post_meta( $post->ID, 'pressable_landing_image_four_text', true ); ?>" size="70" placeholder="Upload the fourth landing icon text here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-landing-form">Landing Page Form ID</label></th>
    	            <td><input id="pressable-landing-form" type="text" name="pressable[landing_form]" value="<?php echo get_post_meta( $post->ID, 'pressable_landing_form', true ); ?>" size="70" placeholder="Enter the Gravity Forms ID for this landing page form." /></td>
    	        </tr>
    	    </tbody>
    	</table>

    	<hr>

    	<h4>Landing Feature Settings</h4>
    	<table class="form-table">
    	    <tbody>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-landing-feature-left-title">Landing Feature Left Title</label></th>
    	            <td><input id="pressable-landing-feature-left-title" type="text" name="pressable[landing_feature_left_title]" value="<?php echo get_post_meta( $post->ID, 'pressable_landing_feature_left_title', true ); ?>" size="70" placeholder="Enter the landing feature left title here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-landing-feature-left-text">Landing Feature Left Supporting Text</label></th>
    	            <td><textarea id="pressable-landing-feature-left-text" name="pressable[landing_feature_left_text]" placeholder="Enter the landing feature left text here." rows="5" cols="71"><?php echo get_post_meta( $post->ID, 'pressable_landing_feature_left_text', true ); ?></textarea></td>
    	        </tr>
                <tr valign="middle">
    	            <th scope="row"><label>Landing Left Features</label></th>
    	            <td>
    	                <ul class="tgm-repeatable-fields" style="margin:0;">
    	                    <?php $landing_left = get_post_meta( $post->ID, 'pressable_landing_left', true ); if ( empty( $landing_left ) ) : ?>
    	                    <li class="tgm-repeating-field" data-number="0" data-column="true" style="margin-bottom:10px;border: 5px dashed #e5e5e5;padding:10px;cursor:move;">
					            <a class="tgm-repeat-field button button-primary" title="Repeat Field" style="vertical-align: middle;margin-bottom: 10px;">Repeat Field</a> <a class="tgm-remove-field button button-secondary" title="Remove Field" style="vertical-align: middle;margin-bottom: 10px;">Remove Field</a>
					            <p>
    			                    <label><strong>Landing Feature Title</strong></label> <input type="text" name="_pressable_landing_left[0][title]" value="" size="35" placeholder="Enter the landing feature title here." />
					            </p>
					            <p>
    			                    <label><strong>Landing Feature Description</strong></label> <textarea name="_pressable_landing_left[0][desc]" value="" rows="5" cols="34" placeholder="Enter the landing feature description here."></textarea>
					            </p>
			                </li>
			                <?php else : ?>
                            <?php foreach ( (array) $landing_left as $n => $faq ) : ?>
			                <li class="tgm-repeating-field" data-number="<?php echo $n; ?>" data-column="true" style="margin-bottom:10px;border: 5px dashed #e5e5e5;padding:10px;cursor:move;">
					            <a class="tgm-repeat-field button button-primary" title="Repeat Field" style="vertical-align: middle;margin-bottom: 10px;">Repeat Field</a> <a class="tgm-remove-field button button-secondary" title="Remove Field" style="vertical-align: middle;margin-bottom: 10px;">Remove Field</a>
			                    <p>
    			                    <label><strong>Landing Feature Title</strong></label> <input type="text" name="_pressable_landing_left[<?php echo $n; ?>][title]" value="<?php echo $faq['title']; ?>" size="35" placeholder="Enter the landing feature title here." />
					            </p>
					            <p>
    			                    <label><strong>Landing Feature Description</strong></label> <textarea name="_pressable_landing_left[<?php echo $n; ?>][desc]" value="" rows="5" cols="34" placeholder="Enter the landing feature description here."><?php echo $faq['desc']; ?></textarea>
					            </p>
			                </li>
			                <?php endforeach; ?>
			                <?php endif; ?>
			            </ul>
    	            </td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-landing-feature-right-title">Landing Feature Right Title</label></th>
    	            <td><input id="pressable-landing-feature-right-title" type="text" name="pressable[landing_feature_right_title]" value="<?php echo get_post_meta( $post->ID, 'pressable_landing_feature_right_title', true ); ?>" size="70" placeholder="Enter the landing feature right title here." /></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label for="pressable-landing-feature-right-text">Landing Feature Right Supporting Text</label></th>
    	            <td><textarea id="pressable-landing-feature-right-text" name="pressable[landing_feature_right_text]" placeholder="Enter the landing feature right text here." rows="5" cols="71"><?php echo get_post_meta( $post->ID, 'pressable_landing_feature_right_text', true ); ?></textarea></td>
    	        </tr>
    	        <tr valign="middle">
    	            <th scope="row"><label>Landing Right Features</label></th>
    	            <td>
    	                <ul class="tgm-repeatable-fields" style="margin:0;">
    	                    <?php $landing_right = get_post_meta( $post->ID, 'pressable_landing_right', true ); if ( empty( $landing_right ) ) : ?>
    	                    <li class="tgm-repeating-field" data-number="0" data-column="true" style="margin-bottom:10px;border: 5px dashed #e5e5e5;padding:10px;cursor:move;">
					            <a class="tgm-repeat-field button button-primary" title="Repeat Field" style="vertical-align: middle;margin-bottom: 10px;">Repeat Field</a> <a class="tgm-remove-field button button-secondary" title="Remove Field" style="vertical-align: middle;margin-bottom: 10px;">Remove Field</a>
					            <p>
    			                    <label><strong>Landing Feature Title</strong></label> <input type="text" name="_pressable_landing_right[0][title]" value="" size="35" placeholder="Enter the landing feature title here." />
					            </p>
					            <p>
    			                    <label><strong>Landing Feature Description</strong></label> <textarea name="_pressable_landing_right[0][desc]" value="" rows="5" cols="34" placeholder="Enter the landing feature description here."></textarea>
					            </p>
			                </li>
			                <?php else : ?>
                            <?php foreach ( (array) $landing_right as $n => $faq ) : ?>
			                <li class="tgm-repeating-field" data-number="<?php echo $n; ?>" data-column="true" style="margin-bottom:10px;border: 5px dashed #e5e5e5;padding:10px;cursor:move;">
					            <a class="tgm-repeat-field button button-primary" title="Repeat Field" style="vertical-align: middle;margin-bottom: 10px;">Repeat Field</a> <a class="tgm-remove-field button button-secondary" title="Remove Field" style="vertical-align: middle;margin-bottom: 10px;">Remove Field</a>
			                    <p>
    			                    <label><strong>Landing Feature Title</strong></label> <input type="text" name="_pressable_landing_right[<?php echo $n; ?>][title]" value="<?php echo $faq['title']; ?>" size="35" placeholder="Enter the landing feature title here." />
					            </p>
					            <p>
    			                    <label><strong>Landing Feature Description</strong></label> <textarea name="_pressable_landing_right[<?php echo $n; ?>][desc]" value="" rows="5" cols="34" placeholder="Enter the landing feature description here."><?php echo $faq['desc']; ?></textarea>
					            </p>
			                </li>
			                <?php endforeach; ?>
			                <?php endif; ?>
			            </ul>
    	            </td>
    	        </tr>
    	    </tbody>
    	</table>
    	<?php

	}

	public function save_settings( $post_id ) {

    	if ( empty( $_POST['pressable'] ) ) return;

    	foreach ( $_POST['pressable'] as $key => $value )
    	    update_post_meta( $post_id, 'pressable_' . strtolower( $key ), is_array( $value ) ? stripslashes_deep( $value ) : $value );

	}

	public function save_pricing_settings( $post_id ) {

    	if ( empty( $_POST['_pressable_pricing'] ) ) return;

        update_post_meta( $post_id, 'pressable_pricing_columns', $_POST['_pressable_pricing'] );
        update_post_meta( $post_id, 'pressable_pricing_faq', $_POST['_pressable_faq'] );
        update_post_meta( $post_id, 'pressable_pricing_high', $_POST['_pressable_high'] );

	}

	public function save_landing_settings( $post_id ) {

    	if ( empty( $_POST['_pressable_landing_left'] ) ) return;

        update_post_meta( $post_id, 'pressable_landing_left', $_POST['_pressable_landing_left'] );

        if ( isset( $_POST['_pressable_landing_right'] ) )
            update_post_meta( $post_id, 'pressable_landing_right', $_POST['_pressable_landing_right'] );

	}

	public function menu() {

		if ( isset( $_GET['update_options'] ) && $_GET['update_options'] )
			$this->update_opts();

		$this->slug = add_theme_page( 'Pressable Options', 'Pressable', 'manage_options', 'pressable-options', array( $this, 'menu_cb' ) );

		if ( $this->slug )
			add_action( 'load-' . $this->slug, array( $this, 'assets' ) );

	}

	public function menu_cb() {

		$this->options = get_option( 'pressable_options' ) ? get_option( 'pressable_options' ) : $this->default_opts();

		?>
		<div class="wrap">
			<?php screen_icon( 'options-general' ); ?>
			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
			<div class="pressable-settings">
				<?php if ( isset( $_GET['update_options'] ) && $_GET['update_options'] ) : ?>
					<div id="message" class="updated">
						<p><strong>Pressable theme options updated.</strong></p>
					</div>
				<?php endif; ?>
				<form method="post" action="<?php echo add_query_arg( array( 'page' => 'pressable-options', 'update_options' => true ), admin_url( 'themes.php' ) ); ?>">
					<table class="form-table">
						<tbody>
						    <tr valign="middle">
								<th scope="row" style="width:100px;"><label for="pressable-typekit">Typekit ID</label></th>
								<td>
								    <input type="text" id="pressable-typekit" name="_pressable[typekit]" size="60" value="<?php echo $this->get_setting( 'typekit' ); ?>" />
								</td>
							</tr>
							<tr valign="middle">
								<th scope="row" style="width:100px;"><label for="pressable-brand-title">Brands Area Title</label></th>
								<td>
								    <input type="text" id="pressable-brand-title" name="_pressable[brand_title]" size="60" value="<?php echo $this->get_setting( 'brand_title' ); ?>" />
								</td>
							</tr>
							<tr valign="middle">
								<th scope="row" style="width:100px;"><label for="pressable-brand-supports">Brands Supporting Text</label></th>
								<td>
								    <input type="text" id="pressable-brand-supports" name="_pressable[brand_supports]" size="60" value="<?php echo $this->get_setting( 'brand_supports' ); ?>" />
								</td>
							</tr>
							<tr valign="middle">
								<th scope="row" style="width:100px;"><label for="pressable-brand-images-0">Brand Images</label></th>
								<td>
								    <ul id="tgm-repeatable-fields" style="margin:0;">
    								    <?php if ( empty( $this->options['brands'] ) ) : ?>
    								        <li class="tgm-repeating-field" data-number="0" style="margin-bottom:5px;">
    								            <img src="<?php echo get_template_directory_uri(); ?>/admin/images/sortable.gif" style="vertical-align: middle; cursor: move;" />
        								        <input data-number="0" type="text" name="_pressable[brands][]" size="60" value="" /> <a href="#" class="tgm-open-media button button-primary">Click Here to Upload Image</a> <a href="#" class="tgm-remove-media button button-secondary">Remove</a>&nbsp;&nbsp;<a class="tgm-repeat-field button button-primary" title="Repeat Field">Repeat Field</a> <a class="tgm-remove-field button button-secondary" title="Remove Field">Remove Field</a>
    								        </li>
    								    <?php else : ?>
    								    <?php foreach ( (array) $this->options['brands'] as $i => $url ) : ?>
    								        <li class="tgm-repeating-field" data-number="<?php echo $i; ?>" style="margin-bottom:5px;">
    								            <img src="<?php echo get_template_directory_uri(); ?>/admin/images/sortable.gif" style="vertical-align: middle; cursor: move;" />
        									    <input data-number="<?php echo $i; ?>" type="text" name="_pressable[brands][]" size="60" value="<?php echo esc_url( $url ); ?>" /> <a href="#" class="tgm-open-media button button-primary">Click Here to Upload Image</a> <a href="#" class="tgm-remove-media button button-secondary">Remove</a> <a class="tgm-repeat-field button button-primary" title="Repeat Field">Repeat Field</a> <a class="tgm-remove-field button button-primary" title="Remove Field">Remove Field</a>
    								        </li>
    									<?php endforeach; ?>
    									<?php endif; ?>
								    </ul>
								</td>
							</tr>
						</tbody>
					</table>
					<p class="submit"><input class="button button-primary button-large" type="submit" value="Save Pressable Options" /></p>
				</form>
			</div>
		</div>
		<?php

	}

	public function default_opts() {

		return array(
			'brands'         => array(),
			'typekit'        => '',
			'brand_title'    => '',
			'brand_supports' => ''
		);

	}

	public function update_opts() {

		$opts = get_option( 'pressable_options' );

        if ( empty( $_POST['_pressable'] ) ) return;

        $opts['brands'] = array();

        foreach ( $_POST['_pressable']['brands'] as $url )
            $opts['brands'][] = esc_url( $url );

        $opts['typekit'] = stripslashes( $_POST['_pressable']['typekit'] );
        $opts['brand_title'] = stripslashes( $_POST['_pressable']['brand_title'] );
        $opts['brand_supports'] = stripslashes( $_POST['_pressable']['brand_supports'] );

		update_option( 'pressable_options', $opts );

	}

	public function get_setting( $setting = '' ) {

    	return isset( $this->options[$setting] ) ? $this->options[$setting] : '';

	}

	public function assets() {

        wp_enqueue_media();
		wp_enqueue_script( 'pressable-brands', get_template_directory_uri() . '/js/pressable-brands.js', array( 'jquery', 'jquery-ui-sortable' ), '1.0.0', true );

	}

}

$pressable_admin = new Pressable_Admin();