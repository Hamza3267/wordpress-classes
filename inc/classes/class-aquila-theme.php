<?php

namespace AQUILA_THEME\Inc;
use AQUILA_THEME\Inc\Traits\Singleton;

class AQUILA_THEME {
    use Singleton;

    protected function __construct() {
        Assests::get_instance();
        Menus::get_instance();
        Meta_Boxes::get_instance();
        Sidebars::get_instance();

        $this->set_hooks();
    }

    protected function set_hooks() {
        add_action('wp_enqueue_scripts', [$this, 'style_sheet_enqueue']);
        add_action('wp_enqueue_scripts', [$this, 'hamzamalik_register_scripts']);
    }

    public function style_sheet_enqueue() {
        wp_enqueue_style('hamzamalik-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css", array(), '5.3.3', 'all');
        wp_enqueue_style('hamzamalik-custom', AQUILA_DIR_URI . "/style.css", array('hamzamalik-bootstrap'), '1.0', 'all');
    }

    public function hamzamalik_register_scripts() {
        wp_enqueue_script('main-js-2', AQUILA_DIR_URI . '/assests/src/js/main.js', ['jquery'], '1.0', true);
    }
}
