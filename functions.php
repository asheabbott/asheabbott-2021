<?php

// ENQUEUE SCRIPTS AND STYLES

add_action('wp_enqueue_scripts', 'enqueue_scripts_styles');

function enqueue_scripts_styles() {
	// scripts.js
	wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);

	// font awesome
	wp_enqueue_style('fa-icons', get_stylesheet_directory_uri() . '/fonts/font-awesome/css/fontawesome.min.css');
	wp_enqueue_style('fa-brands', get_stylesheet_directory_uri() . '/fonts/font-awesome/css/brands.min.css');

	// style.css
	wp_enqueue_style('style', get_stylesheet_directory_uri() . '/css/styles.css');
}

// ENABLE TITLE SUPPORT
add_theme_support('title-tag');


// CREATE MENUS

add_action('init', 'create_menus');

function create_menus() {
  register_nav_menu('main-menu', 'Main Menu');
}


// ADD FEATURED IMAGE SUPPORT AND IMAGE SIZES

add_theme_support('post-thumbnails');
add_image_size('1722w', 1722, 9999);
add_image_size('1334w', 1334, 9999);
add_image_size('730w', 730, 9999);
add_image_size('572w', 572, 9999);
add_image_size('395w', 395, 9999);


// SELECTIVELY DISABLE CONTENT EDITOR ON SPECIFIC PAGES

add_action('admin_init', 'hide_content_editor');
 
function hide_content_editor() {
	global $pagenow;
	if (( $pagenow == 'post.php' ) || (get_post_type() == 'post')) {
		$post_id = isset($_GET['post']) ? $_GET['post'] : $_POST['post_ID'];
		
		if (!isset($post_id)) {
			return;
		}

		$template_file = get_post_meta($post_id, '_wp_page_template', true);
		$get_post = get_post($post_id);
		$slug = $get_post -> post_name;
			
		if ($template_file == 'page-home.php') {
			remove_post_type_support('page', 'editor');
		}
	}
}


// MOVE YOAST SEO META BOX TO BELOW ACF META BOXES

add_filter( 'wpseo_metabox_prio', 'yoast_seo_priority');

function yoast_seo_priority() {
	return 'low';
}


// ADD SUPPORT FOR OPTIONAL BLOCK EDITOR FEATURES

// editor styles
add_theme_support( 'editor-styles' );
add_editor_style( 'css/editor-styles.css' );

// responsive embeds
add_theme_support( 'responsive-embeds' );

// disable font size picker
add_theme_support('disable-custom-font-sizes');

// disable color picker
add_theme_support('disable-custom-colors');

?>