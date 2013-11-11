<?php
/**
 * Header
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */

?><!DOCTYPE html>
<!--[if lt IE 7]><html class="ie lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="ie lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="ie lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<?php if ( is_singular() ) echo '<meta name="revised" content="' . get_the_modified_date( 'l, F j, Y, g:i a' ) . '">'; ?>
	<title><?php bloginfo( 'name' ); ?> | <?php is_front_page() ? bloginfo( 'description' ) : wp_title( '' ); ?></title>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]><script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/html5.js'; ?>"></script><![endif]-->
	<script type="text/javascript" src="//use.typekit.net/esr1ast.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="site-container">
		<header id="header" class="container">
			<div class="header-content-wrap row">
				<div id="site-title">
					<p id="site-logo" class="no-margin">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
							<img class="site-logo" src="<?php echo get_template_directory_uri() . '/images/logo.png'; ?>" alt="Managed WordPress Hosting" />
						</a>
					</p>
				</div><!-- end #site-title -->
				<nav id="site-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'header-nav clearfix' ) ); ?>
				</nav><!-- end #site-navigation -->
			</div>
		</header><!-- end #header -->