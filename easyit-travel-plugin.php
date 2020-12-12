<?php
/*
Plugin Name: EasyIT Travel Plugin
Plugin URI: https://easyit.rs
Description: Creating, listing and showing posts with destination
Version: 0.1.0
Author: Stevan Pivnicki
Author URI: http://easyit.rs
Text Domain: easyit-travel
*/

if(!defined('ABSPATH')){
	exit;
}

require_once(plugin_dir_path(__FILE__)."/includes/easyit-travel-scripts.php");

require_once(plugin_dir_path(__FILE__)."/includes/easyit-travel-cpt.php");
require_once(plugin_dir_path(__FILE__)."/includes/easyit-travel-metabox.php");  
require_once(plugin_dir_path(__FILE__)."/includes/easyit-travel-shortcodes.php"); 


function add_my_custom_page() {


 $template = plugin_dir_path( __FILE__ ) . 'easyit-travel-list.php';

//     // Create post object
    $my_post = array(
      'post_title'    => wp_strip_all_tags( 'EasyIT Travel Page' ),
      'post_name'     => 'easyit_travel_list',
      'post_content'  => '',
      'post_status'   => 'publish',
      'post_author'   => get_current_user_id(),
      'post_type'     => 'page',
      'page_template'  => 'easyit-travel-list.php'
    );

    // Insert the post into the database
     
    wp_insert_post( $my_post );
}

register_activation_hook(__FILE__, 'add_my_custom_page');

add_filter( 'page_template', 'wp_page_template' );
    function wp_page_template( $page_template )
    {
        if ( is_page( 'EasyIT Travel Page' ) ) {
            $page_template = plugin_dir_path( __FILE__ ) . 'easyit-travel-list.php';
        }
        return $page_template;
    }
 