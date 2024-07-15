<?php

namespace Aquila_Theme\Inc;
use AQUILA_THEME\Inc\Traits\Singleton;
class Assests {
    use Singleton;

    protected function __construct() {
       
        $this->set_hooks();
    }

    protected function set_hooks() {

       add_action('after_setup_theme',[$this,'setup_theme']);
    }
    public function setup_theme(){
        add_theme_support('title-tag');

        add_theme_support( 'custom-logo',[
            'header-text' => [ 'site-title', 'site-description' ],
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
        ] );

        add_theme_support( 'custom-background', [
            'default-color' => '#fff',
            'default-image' =>  '',
            'default-repeat' => 'no-repeat',
        ]);

        add_theme_support('customize-selective-refresh-widgets');

        add_theme_support('automatic-feed-links');

        add_theme_support(
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'script',
                'style',
            ]
        );
            add_editor_style();
            add_theme_support('wp-block-styles');
            add_theme_support('align-wide');
            add_theme_support('post-thumbnails');
            add_image_size('featured-thumbnail',350,233,true);
            global $content_width;
            if ( ! isset($content_width)){
                $content_width = 1240;
            }
    }
   
}