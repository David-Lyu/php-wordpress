<?php

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
