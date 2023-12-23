<?php
/**
 * Initializes theme widgets.
 *
 * @package maureen_tw
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function maureen_tw_widgets_init() {

	// Header Widget Area.
	register_sidebar(
		array(
			'name'          => __( 'Header Widget Area', 'maureen_tw' ),
			'id'            => 'header-widget-area',
			'description'   => __( 'Add widgets here to appear in your header.', 'maureen_tw' ),
			'before_widget' => '<div id="%1$s" class="header-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// Footer Widget Area.
	register_sidebar(
		array(
			'name'          => __( 'Footer Widget Area', 'maureen_tw' ),
			'id'            => 'footer-widget-area',
			'description'   => __( 'Add widgets here to appear in your footer.', 'maureen_tw' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'maureen_tw_widgets_init' );
