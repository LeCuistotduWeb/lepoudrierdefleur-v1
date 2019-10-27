<?php

//===================================================
//======= Chargement des scripts
//===================================================

define('LPDF_VERSION', '1.0.0');  // Define a version of styles and scripts files

function lpdf_base_scripts_and_styles(){
    // Scripts css
    wp_enqueue_style('lpdf_bootstrap-core', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', [], LPDF_VERSION, 'all');
    wp_enqueue_style('lpdf_custom_css', get_template_directory_uri() . '/style.css', ['lpdf_bootstrap-core'], LPDF_VERSION, 'all');

    // Scripts js
    wp_enqueue_script('lpdf_custom_js', get_template_directory_uri() . '/js/app.js', [], LPDF_VERSION, true);
}
add_action('wp_enqueue_scripts', 'lpdf_base_scripts_and_styles');


//===================================================
//======= Utilitaires
//===================================================

function lpdf_setup(){

    // Active l'image à la une dans le thème
    add_theme_support('post-thumbnails');

    // Remove wp_generator
    remove_action('wp_head', 'wp_generator');

    // Remove guillemets à la française
    remove_action('the_content', 'wptexturize');

    // bootstrap nav menu plugins.
    require_once('includes\class-wp-bootstrap-navwalker.php');

    // Active la gestion des menus
    register_nav_menus([
            'primary' => 'principal',
        ]
    );
}
add_action('after_setup_theme', 'lpdf_setup');
