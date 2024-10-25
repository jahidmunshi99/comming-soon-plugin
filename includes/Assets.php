<?php
namespace Proghivecomming\Soon;


/**
 * Assets Class
 */
 class Assets{
    public function __construct(){
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_assets' ] );
    }

    public function get_scripts(){
        return [
            'commingsoon-script' => [
                'src' => PROGHIVE_PLUGIN_ASSETS . '/js/commingsoon-frontend.js',
                'version' => filemtime( PROGHIVE_PLUGIN_PATH . '/assets/js/commingsoon-frontend.js' ),
                'deps' => 'jquery',
            ],
        
            'commingsoon-admin-script' => [
                'src' => PROGHIVE_PLUGIN_ASSETS . '/js/commingsoon-admin.js',
                'version' => filemtime( PROGHIVE_PLUGIN_PATH . '/assets/js/commingsoon-admin.js' ),
                'deps' => 'jquery',
            ]
        ];
    }

    public function get_styles(){
        return [
            'commingsoon-style' => [
                'src' => PROGHIVE_PLUGIN_ASSETS . '/css/commingsoon-frontend.css',
                'version' => filemtime( PROGHIVE_PLUGIN_PATH . '/assets/css/commingsoon-frontend.css' ),
            ],

            'commingsoon-admin-style' => [
                'src' => PROGHIVE_PLUGIN_ASSETS . '/css/commingsoon-admin.css',
                'version' => filemtime( PROGHIVE_PLUGIN_PATH . '/assets/css/commingsoon-admin.css' ),
            ]
        ];
    }

    public function enqueue_assets(){
        $scripts = $this->get_scripts();
        foreach( $scripts as $handler => $script ){
            $deps =  isset( $script['deps'] ) ? $script['deps'] : '';
            wp_register_script( $handler, $script['src'], $deps, $script['version'], true );
        }

        $styles = $this->get_styles();
        foreach( $styles as $handler => $style ){
            $deps = isset( $style['deps'] ) ? $style['deps'] : '';
            wp_register_style( $handler, $style['src'], $deps, $style['version'] );
        }
    }
}