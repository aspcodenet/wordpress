<?php


class StefansTheme{
    private static $instance = null;

    
    private function __construct(){
        add_action('wp_enqueue_scripts', array($this, 'enqueueScripts'));
        add_action('after_setup_theme', array($this, 'setupThemeSupport'));
    }

    public function setupThemeSupport(){
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
    }

    public function enqueueScripts(){
       $version = wp_get_theme()->get('Version');
       wp_enqueue_style('stefansthemestyle', get_template_directory_uri() . "/style.css",array(), $version,'all');
    }

    public static function get_instance(){
        if(self::$instance == null){
            self::$instance = new self;
        }
        return self::$instance;
    }
}

StefansTheme::get_instance();
?>