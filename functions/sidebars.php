<?php
/**
 * Sets up the default theme sidebars if the child theme supports them. 
 * These are a replacement of the default framework sidebars because
 * we're using HTML5
 *
 * 'Primary', 'secondary', and 'subsidiary' are on by default.
 * Themes may choose to use or not use these sidebars, create new sidebars, or 
 * unregister individual sidebars.  A theme must register support for 'cakifo-sidebars' to use them
 *
 * @package Cakifo
 * @subpackage Functions
 */

/* Register widget areas. */
add_action( 'widgets_init', 'cakifo_register_sidebars' );

/**
 * Registers the default framework dynamic sidebars.  Theme developers may optionally choose to support 
 * these sidebars within their themes or add more custom sidebars to the mix.
 *
 * @since 1.2
 * @uses register_sidebar() Registers a sidebar with WordPress.
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function cakifo_register_sidebars() {

	/* Get theme-supported sidebars. */
	$sidebars = get_theme_support( 'cakifo-sidebars' );

	/* If there is no array of sidebars IDs, return. */
	if ( !is_array( $sidebars[0] ) )
		return;

	/* Get the theme textdomain. */
	$domain = hybrid_get_textdomain();

	/* Set up the primary sidebar arguments. */
	$primary = array(
		'id' => 'primary',
		'name' => __( 'Primary', $domain ),
		'description' => __( 'The main (primary) widget area, most often used as a sidebar.', $domain ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s widget-%2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	);

	/* Set up the secondary sidebar arguments. */
	$secondary = array(
		'id' => 'secondary',
		'name' => __( 'Secondary', $domain ),
		'description' => __( 'The second most important widget area, most often used as a secondary sidebar.', $domain ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s widget-%2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	);

	/* Set up the subsidiary sidebar arguments. */
	$subsidiary = array(
		'id' => 'subsidiary',
		'name' => __( 'Subsidiary', $domain ),
		'description' => __( 'A widget area loaded in the footer of the site.', $domain ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s widget-%2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	);

	/* Set up the header sidebar arguments. */
	$header = array(
		'id' => 'header',
		'name' => __( 'Header', $domain ),
		'description' => __( 'Displayed within the site\'s header area.', $domain ),
		'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-wrap widget-inside">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	);

	/* Set up the before content sidebar arguments. */
	$before_content = array(
		'id' => 'before-content',
		'name' => __( 'Before Content', $domain ),
		'description' => __( 'Loaded before the page\'s main content area.', $domain ),
		'before_widget' => '<section id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-wrap widget-inside">',
		'after_widget' => '</div></section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	);

	/* Set up the after content sidebar arguments. */
	$after_content = array(
		'id' => 'after-content',
		'name' => __( 'After Content', $domain ),
		'description' => __( 'Loaded after the page\'s main content area.', $domain ),
		'before_widget' => '<section id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-wrap widget-inside">',
		'after_widget' => '</div></section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	);

	/* Set up the after singular sidebar arguments. */
	$after_singular = array(
		'id' => 'after-singular',
		'name' => __( 'After Singular', $domain ),
		'description' => __( 'Loaded on singular post (page, attachment, etc.) views before the comments area.', $domain ),
		'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	);

	/* Set up the after single sidebar arguments. */
	$after_single = array(
		'id' => 'after-single',
		'name' => __( 'After Single', $domain ),
		'description' => __( 'Loaded on single post views before the comments area.', $domain ),
		'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	);
	
	/* Set up the 404 error page arguments. */
	$error_page = array(
		'id' => 'error-page',
		'name' => __( 'Error Page', $domain ),
		'description' => __( 'Loaded on 404 error pages', $domain ),
		'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	);

	/* Register the primary sidebar. */
	if ( in_array( 'primary', $sidebars[0] ) )
		register_sidebar( $primary );

	/* Register the secondary sidebar. */
	if ( in_array( 'secondary', $sidebars[0] ) )
		register_sidebar( $secondary );

	/* Register the subsidiary sidebar. */
	if ( in_array( 'subsidiary', $sidebars[0] ) )
		register_sidebar( $subsidiary );

	/* Register the header sidebar. */
	if ( in_array( 'header', $sidebars[0] ) )
		register_sidebar( $header );

	/* Register the before content sidebar. */
	if ( in_array( 'before-content', $sidebars[0] ) )
		register_sidebar( $before_content );

	/* Register the after content sidebar. */
	if ( in_array( 'after-content', $sidebars[0] ) )
		register_sidebar( $after_content );

	/* Register the after singular sidebar. */
	if ( in_array( 'after-singular', $sidebars[0] ) )
		register_sidebar( $after_singular );
		
	/* Register the after singular sidebar. */
	if ( in_array( 'after-single', $sidebars[0] ) )
		register_sidebar( $after_single );
		
	/* Register the error page sidebar. */
	if ( in_array( 'error-page', $sidebars[0] ) )
		register_sidebar( $error_page );
}

?>