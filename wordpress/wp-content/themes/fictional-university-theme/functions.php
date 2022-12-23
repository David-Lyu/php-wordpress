<!-- This is the hooks -->
<?php

function university_files() {
  wp_enqueue_style('style',get_stylesheet_uri());
}

add_action('wp_enqueue_scripts','university_files');
