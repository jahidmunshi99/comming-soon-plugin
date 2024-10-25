<?php
namespace Proghivecomming\Soon;

/**
 * Installer Class
 */
 class Installer{
    public function run(){
        $this->add_commingsoon_page();
    }

    public function add_commingsoon_page(){ 
        $existing_page = get_page_by_title( 'Comming Soon Page' );
        if( ! $existing_page ){
            // Create a new Coming Soon page
            $commingsoon_page = [
                'post_title'    => wp_strip_all_tags( 'Comming Soon Page' ),
                'post_status'   => 'publish',
                'post_author'   => 1,
                'post_type'     => 'page',
            ];
            wp_insert_post( $commingsoon_page );
        }
    }
}