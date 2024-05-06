<?php

function enqueue_mytheme_styles() {
    wp_enqueue_style('mytheme-style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array(), '5.0.2', 'all');
  
}
add_action('wp_enqueue_scripts', 'enqueue_mytheme_styles');

function create_custom_post_types() {
    register_post_type('projects', array(
        'labels' => array(
            'name' => __('Projects'),
            'singular_name' => __('Project'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    ));
}
add_action('init', 'create_custom_post_types');

?>
<?php
function my_theme_add_custom_mods( $wp_customize ) {
  $wp_customize->add_setting(
    'linkedin_url',
    array(
      'default' => '', 
      'sanitize_callback' => 'esc_url_raw'
    )
  );


  
}
add_action( 'customize_register', 'my_theme_add_custom_mods' );
