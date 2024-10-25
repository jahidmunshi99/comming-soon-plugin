<?php
namespace Proghivecomming\Soon\Admin;

/**
 * Menu Class
 */
class Menu{
    public function __construct(){
        add_action( 'admin_menu', [ $this, 'admin_menu' ]);
    }
    public function admin_menu(){
        $page_title = esc_attr__( 'PH Comming...', 'proghive' );
        $capability = 'manage_options';
        $parent_slug = 'proghive-plugin-commingsoon-page';
        add_menu_page( $page_title, esc_attr__( 'PH Comming...', 'proghive' ), $capability, $parent_slug, [$this, 'proghive_cb'], 'dashicons-visibility', 105 );
        add_submenu_page( $parent_slug, $page_title, esc_attr__('Comming Soon', 'proghive'), $capability, $parent_slug, [$this, 'proghive_cb'] );
        add_submenu_page( $parent_slug, $page_title, esc_attr__('Settings', 'proghive'), $capability, 'proghive-plugin-settings', [$this, 'settings_pages_function'] );
    }

    public function proghive_cb(){
        echo '<h1>Dashborad</h1>';
    }
}

