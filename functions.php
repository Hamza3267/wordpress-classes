<?php
if ( ! defined('AQUILA_DIR_PATH')){
    define( 'AQUILA_DIR_PATH',untrailingslashit( get_template_directory() ) );
}
if ( ! defined('AQUILA_DIR_URI')){
    define( 'AQUILA_DIR_URI',untrailingslashit( get_template_directory() ) );
}
// echo '<pre>';
// print_r(AQUILA_DIR_PATH);
// wp_die();
require_once AQUILA_DIR_PATH. './inc/helpers/autoloader.php';
require_once AQUILA_DIR_PATH. './inc/helpers/template-tags.php';
function aquila_get_theme_instance(){
    \AQUILA_THEME\Inc\AQUILA_THEME::get_instance();
}
aquila_get_theme_instance();

function style_sheet_enqueue()
{
    // $version = wp_get_theme()->get('Version');
    wp_enqueue_style('hamzamalik-custom', get_template_directory_uri() . "/style.css", array('hamzamalik-bootstrap'), '1.0', 'all');
    wp_enqueue_style('hamzamalik-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css", array(), '4.4.1', 'all');
}
add_action('wp_enqueue_scripts', 'style_sheet_enqueue');

function Hamzamalik_register_scripts()
{

    wp_enqueue_script('hamzamalik-js', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js", array(), '5.3.3', true);

}
add_action('wp_enqueue_scripts', 'Hamzamalik_register_scripts');