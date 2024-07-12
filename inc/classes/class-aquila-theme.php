<?php

namespace AQUILA_THEME\Inc;
use AQUILA_THEME\Inc\Traits\Singleton;
class AQUILA_THEME {
    use Singleton;
    protected function __construct() {

       Assests::get_instance();
       Menus::get_instance();

        $this->set_hooks();
    }

    protected function set_hooks() {

        add_action('wp_enqueue_script', [$this,'style_sheet_enqueue']);
        add_action('wp_enqueue_scripts', [$this,'hamzamalik_register_scripts']);
    }
    public function style_sheet_enqueue(){
        wp_enqueue_style('hamzamalik-custom', AQUILA_DIR_PATH . "/style.css", array('hamzamalik-bootstrap'), '1.0', 'all');
        wp_enqueue_style('hamzamalik-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css", array(), '4.4.1', 'all');
    }

    public function hamzamalik_register_scripts(){
        wp_enqueue_script('hamzamalik-js', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js", array(), '5.3.3', true);
    }
}