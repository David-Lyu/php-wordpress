<?php

/* Enqueue the scripts can do js */

// function startwordpress_scripts() {
// 	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6' );
// 	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
// }

// add_action( 'wp_enqueue_scripts', 'startwordpress_scripts' );

// require_once WP_CONTENT_DIR . '/products.php';

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
