<?php

/* This is a hook */
function startwordpress_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
}

add_action( 'wp_enqueue_scripts', 'startwordpress_scripts' );

function startwordpress_google_fonts() {
	wp_register_style('OpenSans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
	wp_enqueue_style( 'OpenSans');
}

add_action('wp_print_styles', 'startwordpress_google_fonts');

// Custom settings
function custom_settings_add_menu() {
	add_menu_page( 'Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99 );
}
add_action( 'admin_menu', 'custom_settings_add_menu' );

// include '../../wp-content/custom-plugins/custom-post-type.php';
// use CustomPlugin\PostType;
// new Recipe();
// add_action( 'init', array($recipeCustomPostType, 'recipe_init') );
// add_filter( 'post_updated_messages', array($recipeCustomPostType, 'recipe_updated_messages') );

function create_posttype() {
  register_post_type( 'wpll_product',
    array(
      'labels' => array(
        'name' => __( 'Products' ),
        'singular_name' => __( 'Product' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'products'),
    )
  );
}
add_action( 'init', 'create_posttype' );

function create_advanced_posttype() {

/**
 * Register a widgets post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

// Define the labels used inside the WordPress admin for this custom post type (CPT)
    $labels = array(
        'name'                => _x( 'Widgets', 'Post Type General Name', 'textdomain' ),
        'singular_name'       => _x( 'Widgets', 'Post Type Singular Name', 'textdomain' ),
        'add_new'             => __( 'Add New', 'textdomain' ),
        'add_new_item'        => __( 'Add New Widget', 'textdomain' ),
        'edit_item'           => __( 'Edit Widget', 'textdomain' ),
        'new_item'            => __( 'New Widget' ),
        'all_items'           => __( 'All Widgets', 'textdomain' ),
        'view_item'           => __( 'View Widget', 'textdomain' ),
        'search_items'        => __( 'Search Widget', 'textdomain' ),
        'menu_name'           => __( 'Widgets', 'textdomain' ),
        'parent_item_colon'   => __( 'Parent Widget', 'textdomain' ),
        'update_item'         => __( 'Update Widget', 'textdomain' ),
        'not_found'           => __( 'Not Found', 'textdomain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'textdomain' )
    );

// Define more options for the CPT

    $args = array(
        'label'               => $labels,
        'description'         => __( 'Widget information and details', 'textdomain' ),
        'labels'              => $labels,
        // Define the allowed features in the post editor
        'supports'            => array( 'title', 'editor', 'author', 'excerpt', 'thumbnail', 'comments', 'trackbacks', 'post-formats', 'page-attributes', 'custom-fields', 'revisions', ),
        // If hierarchical is true then the CPT behaves like a post. If false, it can have parent and child items like a page.
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        // menu_position defines where in the WP admin menu the CPT appears. 5 puts it right below posts. The higher the number to lower the CPT will be.
        'menu_position'       => 19,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );

    // Register this CPT
    register_post_type( 'widgets', $args );

}

// hook into the init action and call create_advanced_posttype when it fires
add_action( 'init', 'create_advanced_posttype', 0 );
