<?php
/**
 * Maureen TW Theme functions and definitions
 *
 * @package maureen_tw
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Theme setup.
 */
function maureen_tw_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );

	// Add theme support for widgets.
	add_theme_support( 'widgets' );
}

add_action( 'after_setup_theme', 'maureen_tw_setup' );


require_once get_template_directory() . '/inc/widgets.php';


/**
 * Enqueue theme assets.
 */
function maureen_tw_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'tailpress', maureen_tw_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailpress', maureen_tw_asset( 'js/app.js' ), array(), $theme->get( 'Version' ), true );
}

add_action( 'wp_enqueue_scripts', 'maureen_tw_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string $path Path to asset.
 *
 * @return string
 */
function maureen_tw_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(), get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 * @param int     $depth The depth of the current menu item.
 *
 * @return array
 */
function maureen_tw_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'maureen_tw_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 * @param int     $depth The depth of the current menu item.
 *
 * @return array
 */
function maureen_tw_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'maureen_tw_nav_menu_add_submenu_class', 10, 3 );

/**
 * Sort stories by title.
 *
 * @param WP_Query $query The query object.
 */
function sort_stories_by_title( $query )  {
	if (!is_admin() && $query->is_main_query()) {
		// Check if it's the archive for 'story' post type.
		if (is_post_type_archive('story')) {
			// Set the query to order by title in ascending order.
			$query->set('orderby', 'title');
			$query->set('order', 'ASC');
		}
	}
}
add_action('pre_get_posts', 'sort_stories_by_title');

/**
 * Sort archives by date ascending.
 *
 * @param WP_Query $query The query object.
 */
function maureen_tw_sort_archives_except_story($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_archive() && !is_post_type_archive('story')) {
        // Set the query to order by post date in ascending order for all archives except 'story'
        $query->set('orderby', 'date');
        $query->set('order', 'ASC');
    }
}
add_action('pre_get_posts', 'maureen_tw_sort_archives_except_story');

// Debugging function to show all taxonomies and their attached post types.
// add_action( 'init', function() {
//     if ( ! current_user_can( 'manage_options' ) ) {
//         return; // Only show to admins.
//     }

//     $taxonomies = get_taxonomies( array(), 'objects' );
//     echo '<pre style="background:#fff; padding:1rem; font-size:14px;">';
//     foreach ( $taxonomies as $taxonomy ) {
//         echo $taxonomy->name . ' — attached to: ' . implode( ', ', $taxonomy->object_type ) . "\n";
//     }
//     echo '</pre>';
// }, 99 );



