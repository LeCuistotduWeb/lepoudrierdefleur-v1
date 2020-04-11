<?php
define('LPDF_VERSION', '0.0.2');  // Define a version of styles and scripts files

//===================================================
//======= Supports
//====================================================
function lpdf_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');

    register_nav_menus([
        'header'    =>  __('Header menu', 'lpdf'),
        'footer'    =>  __('Footer menu', 'lpdf'),
        'social'    =>  __('Social link menu', 'lpdf'),
    ]);

    add_image_size('post-thumb', 1280, 720, true);
}

function lpdf_register_assets()
{
    wp_register_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', [], LPDF_VERSION, 'all');
    wp_register_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', ['popper','jquery'], LPDF_VERSION, true);
    wp_register_script('popper', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', [], false, true);
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', [], false, true);

    wp_enqueue_style('bootstrap-css');
    wp_enqueue_script('lpdf_custom_js', get_template_directory_uri() . '/dist/js/app.min.js', ['bootstrap-js'], LPDF_VERSION, true);
    wp_enqueue_style('lpdf_custom_css', get_template_directory_uri() . '/dist/css/app.min.css', ['bootstrap-css'], LPDF_VERSION, 'all');

}


function lpdf_title_separator()
{
    return "|";
}

function lpdf_menu_class($classes) :array
{
    $classes[] = 'nav-item';
    return $classes;
}

function lpdf_menu_link_class($attrs) :array
{
    $attrs['class'] = 'nav-link';
    return $attrs;
}

function lpdf_pagination()
{
    $pages = paginate_links(["type" => "array"]);
    if($pages !== null){
        echo ' <nav aria-label="pagination">';
        echo '<ul class="pagination">';

        foreach ($pages as $page){
            $active = strpos($page, 'current');
            $class = 'page-item';
            $active ? $class.= ' active' : '';
            echo '<li class="' . $class . '">';
            echo str_replace('page-numbers', 'page-link', $page);
            echo '</li>';
        }
        echo '</ul>';
        echo '</nav>';
    }
}

function lpdf_init() {
    register_post_type('gooddeals', [
        'label'   => __('bons plans', 'lpdf'),
        'public'  => true,
        'menu_position' => 4,
        'menu_icon'     => 'dashicons-products',
        'supports'      => ['title', 'editor', 'thumbnail'],
        'has_archive'   => true
    ]);
}

add_action('init', 'lpdf_init');
add_action('after_setup_theme', 'lpdf_setup');
add_action('wp_enqueue_scripts', 'lpdf_register_assets');

add_filter('document_title_separator', 'lpdf_title_separator');
add_filter('nav_menu_css_class', 'lpdf_menu_class');
add_filter('nav_menu_link_attributes', 'lpdf_menu_link_class');

require_once ('class/metaboxes/sponso.php');
require_once('class/options/bloginformations.php');

SponsoMetaBox::register();
BlogInformations::register();

// Post Filter
add_filter('manage_gooddeals_posts_columns', function($columns){
    return [
        'cb' => $columns['cb'],
        'thumbnail' => __('miniature', 'lpdf'),
        'title' => $columns['title'],
        'date' => $columns['date'],
    ];
});

add_filter('manage_gooddeals_posts_custom_column', function($column, $postId){
   if($column === 'thumbnail'){
       the_post_thumbnail('thumbnail', $postId);
   }
}, 10, 2);

// Post Filter
add_filter('manage_post_posts_columns', function($columns){
    $newColumns = [];
    foreach ($columns as $k => $v){
        if($k === 'date') {
            $newColumns[SponsoMetaBox::META_KEY] = __('Article sponsorisé', 'lpdf');
        }
        $newColumns[$k] = $v;
    }
    return $newColumns;
});

add_filter('manage_post_posts_custom_column', function($column, $postId){
    if($column === SponsoMetaBox::META_KEY){
        !empty(get_post_meta($postId, SponsoMetaBox::META_KEY, true)) ? $class = 'yes' : $class = 'no';
        echo '<div class="bullet bullet-'.$class.'">'. $class.'</div>';
    }
}, 10, 2);

add_action('admin_enqueue_scripts', function(){
    wp_enqueue_style('admin_lpdf', get_template_directory_uri() . '/dist/admin/css/admin.min.css');
    wp_enqueue_script('admin_lpdf', get_template_directory_uri() . '/dist/admin/js/admin.min.js');
});