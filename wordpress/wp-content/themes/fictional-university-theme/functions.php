<?php
/* This is a hook */
function university_files() {
  wp_enqueue_style('style',get_stylesheet_uri());
}

add_action('wp_enqueue_scripts','university_files');
