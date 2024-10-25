<?php 
/*
 * Plugin Name:       ProgHive Comming Soon
 * Plugin URI:        https://www.proghive.com/plugins
 * Description:       This Plugin will work for comming soon page on your website.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Jahid Munshi
 * Author URI:        https://proghive.com/
 * License:           GPL v4 or later
 * Text Domain:       proghive
 * Domain Path:       /languages
 */

 if( ! defined( 'ABSPATH' )){
    exit;
 }

require_once( __DIR__ . '/vendor/autoload.php');

 /**
  * Main Class
  */
  final class ProghiveCommingSoon{
    private function __construct(){
        $this->define_constructor();
        add_action( 'plugins_loaded', [ $this, 'activate' ] );
        register_activation_hook( __FILE__, [ $this, 'plugin_init' ]);
    }

    /**
     * Initialize Plugin Constructor
     */
    public function define_constructor(){
		define("PROGHIVE_PLUGIN_FILE", __FILE__ );
		define("PROGHIVE_PLUGIN_PATH", __DIR__ );
		define("PROGHIVE_PLUGIN_URL", plugins_url('', PROGHIVE_PLUGIN_FILE) );
		define("PROGHIVE_PLUGIN_ASSETS", PROGHIVE_PLUGIN_URL . '/assets' );
    }

    /**
     * Initialize Plugins after Activation
     */
    public function activate(){
      if( is_admin() ){
        new Proghivecomming\Soon\Admin();
      }else{ 
      new Proghivecomming\Soon\Frontend();
      new \Proghivecomming\Soon\Assets();
     };
    }

    /**
     * After Plugin Activation
     */
    public function plugin_init(){
        $installer = new Proghivecomming\Soon\Installer();
        $installer->run();
    }
    /**
     * Initalize Singleton Instance
     */
    public static function init(){
        static $instance = false;
        if( ! $instance ){
            $instance = new self();
        }
        return $instance;
    }
  }

  /**
   * pluging function
   */
  function prghive_comming_soon(){
    return ProghiveCommingSoon::init();
  }

  /**
   * Kick off functions
   */
  prghive_comming_soon();