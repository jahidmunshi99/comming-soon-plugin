<?php
namespace Proghivecomming\Soon\Frontend;

/**
 * Template Class
 */
class Template{
    public function __construct(){
        add_filter('theme_page_templates', [ $this, 'proghive_comming_soong_template' ]);
        add_filter('template_include', [ $this, 'ph_commingsoon_page_include']);
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );

    }
    public function proghive_comming_soong_template( $templates ){
        $templates['coming-soon-template.php'] = 'Coming Soon Template';
        return $templates;
    }

    public function ph_commingsoon_page_include( $template ){
        if( is_home('Comming Soon Page') || is_page('Comming Soon Page')){
                $template = __DIR__ . '/templates/coming-soon-template.php';

            if( function_exists( $template )){
                include( $template );
            }
        }
        return $template;
    }

    public function enqueue_assets(){
        wp_enqueue_style( 'commingsoon-style' );
    }


}