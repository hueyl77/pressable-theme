<?php
/**
 * Functions
 *
 * @package	  Pressable
 * @author	  Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @copyright Copyright © 2013, Thomas Griffin.
 * @license	  http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 */

if ( ! isset( $content_width ) ) $content_width = 825;

add_action( 'after_setup_theme', 'tgm_setup_theme', 0 );
/**
 * Loads all theme specific elements, including custom backgrounds, image
 * sizes and other theme functionality.
 *
 * The priority is set to 0 to ensure that this function fires as early as
 * possible within this hook.
 *
 * @since 1.0.0
 */
function tgm_setup_theme() {

    // If is in the admin, run admin functions.
    if ( is_admin() )
        require get_template_directory() . '/admin/init.php';

	/** Add theme supports */
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );

	/** Register our navigation menus */
	register_nav_menu( 'primary', __( 'Primary Navigation', 'tgm' ) );
	register_nav_menu( 'footer',  __( 'Footer Navigation', 'tgm' ) );

	/** Add custom post thumbnail sizes */

	/** Register our sidebar areas */
	register_sidebar( array(
		'name' 			=> __( 'Primary Sidebar', 'tgm' ),
		'description'	=> __( 'This sidebar is the primary sidebar for the site.', 'tgm' ),
		'id'			=> 'main-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4 class="widget-title">',
		'after_title' 	=> '</h4>',
	) );

	register_sidebar( array(
		'name' 			=> __( 'Footer Widget One', 'tgm' ),
		'description'	=> __( 'This sidebar should contain one widget for the first footer widget area.', 'tgm' ),
		'id'			=> 'footer-widget-one',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4 class="widget-title">',
		'after_title' 	=> '</h4>',
	) );

	register_sidebar( array(
		'name' 			=> __( 'Footer Widget Two', 'tgm' ),
		'description'	=> __( 'This sidebar should contain one widget for the second footer widget area.', 'tgm' ),
		'id'			=> 'footer-widget-two',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4 class="widget-title">',
		'after_title' 	=> '</h4>',
	) );

	register_sidebar( array(
		'name' 			=> __( 'Footer Widget Three', 'tgm' ),
		'description'	=> __( 'This sidebar should contain one widget for the third footer widget area.', 'tgm' ),
		'id'			=> 'footer-widget-three',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4 class="widget-title">',
		'after_title' 	=> '</h4>',
	) );

	register_sidebar( array(
		'name' 			=> __( 'Footer Widget Four', 'tgm' ),
		'description'	=> __( 'This sidebar should contain one widget for the fourth footer widget area.', 'tgm' ),
		'id'			=> 'footer-widget-four',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4 class="widget-title">',
		'after_title' 	=> '</h4>',
	) );

	register_sidebar( array(
		'name' 			=> __( 'Footer Widget Five', 'tgm' ),
		'description'	=> __( 'This sidebar should contain one widget for the fifth footer widget area.', 'tgm' ),
		'id'			=> 'footer-widget-five',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4 class="widget-title">',
		'after_title' 	=> '</h4>',
	) );

}

add_action( 'wp_enqueue_scripts', 'tgm_setup_assets', 0 );
/**
 * Loads all theme assets such as scripts and styles.
 *
 * The priority is set to 0 to ensure that this function fires as early as
 * possible within this hook.
 *
 * @since 1.0.0
 */
function tgm_setup_assets() {

	// Enqueue theme styles.
	wp_enqueue_style( 'pressable-main', get_stylesheet_uri() );

	// Enqueue theme scripts.
	wp_enqueue_script( 'pressable-main', get_template_directory_uri() . '/js/pressable.js', array( 'jquery' ), '1.0.0', true );

}

add_action( 'wp_head', 'tgm_setup_header', 0 );
/**
 * Loads any necessary global elements into the <head> tags of the theme,
 * including the main stylesheets.
 *
 * The priority is set to 0 to ensure that this function fires as early as
 * possible within this hook.
 *
 * @since 1.0.0
 */
function tgm_setup_header() {

	echo '<link rel="Shortcut Icon" href="' . get_template_directory_uri() . '/images/favicon.ico' . '" type="image/x-icon" />' . "\n";

}

add_filter( 'body_class', 'tgm_filter_body_class' );
/**
 * Filters the body classes to add custom classes for the theme.
 *
 * @since 1.0.0
 *
 * @global object $post The current post object
 * @param array $classes Default array of body classes
 * @return array $classes Amended array with new body classes
 */
function tgm_filter_body_class( $classes ) {

	global $post;

	return array_unique( $classes );

}

add_filter( 'post_class', 'tgm_filter_post_class' );
/**
 * Filters the post classes to add custom classes for the theme.
 *
 * @since 1.0.0
 *
 * @param array $classes Default array of post classes
 * @return array $classes Amended array with new post classes
 */
function tgm_filter_post_class( $classes ) {

	if ( is_singular() )
		$classes[] = 'singular';

	return array_unique( $classes );

}

add_action( 'wp_footer', 'tgm_setup_footer', 1000 );
/**
 * Loads any necessary global elements just before the closing </body> tag,
 * including the main scripts.
 *
 * The priority is set to 1000 to ensure that this function fires as late as
 * possible within this hook.
 *
 * @since 1.0.0
 */
function tgm_setup_footer() {



}

/**
 * Custom numbered pagination for post archives. Derived from the Genesis Framework.
 *
 * @since 1.0.0
 *
 * @global object $wp_query The query object
 * @return null Return early if on a single page or only one page of posts
 */
function tgm_numbered_pagination() {

	if ( is_singular() )
		return;

	global $wp_query;

	/** Return early if there is only one page of posts */
	if ( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="pagination clearfix"><ul class="clearfix">' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link( __( '&larr; Previous Page', 'tgm' ) ) );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li><span>&hellip;</span></li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li><span>&hellip;</span></li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link( __( 'Next Page &rarr;', 'tgm' ) ) );

	echo '</ul></div>' . "\n";

}

function pressable_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}