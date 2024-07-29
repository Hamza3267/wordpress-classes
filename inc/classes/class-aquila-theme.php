<?php

namespace AQUILA_THEME\Inc;
use AQUILA_THEME\Inc\Traits\Singleton;

class AQUILA_THEME {
    use Singleton;

    protected function __construct() {
        Assets::get_instance();
		Menus::get_instance();
		Meta_Boxes::get_instance();
		Sidebars::get_instance();
		Blocks::get_instance();
		Block_Patterns::get_instance();
		Loadmore_Posts::get_instance();
		Loadmore_Single::get_instance();
		Register_Post_Types::get_instance();
		Register_Taxonomies::get_instance();
		Archive_Settings::get_instance();

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
        //wp_enqueue_script('main-js-2', AQUILA_BUILD_JS_URI . '/main.js', ['jquery'], '1.0', true);
        wp_enqueue_script( 'main-js-2', AQUILA_BUILD_JS_URI . '/main.js', ['jquery'], filemtime( AQUILA_BUILD_JS_DIR_PATH . '/main.js' ), true );
    }
}
