<?php

/*
* Creating a function to create our CPT
*/
 
function custom_post_type_travel() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Travels', 'Post Type General Name', 'easyit-travel-cpt' ),
        'singular_name'       => _x( 'Travel', 'Post Type Singular Name', 'easyit-travel-cpt' ),
        'menu_name'           => __( 'Travels', 'easyit-travel-cpt' ),
        'parent_item_colon'   => __( 'Parent Travel', 'easyit-travel-cpt' ),
        'all_items'           => __( 'All Travels', 'easyit-travel-cpt' ),
        'view_item'           => __( 'View Travel', 'easyit-travel-cpt' ),
        'add_new_item'        => __( 'Add New Travel', 'easyit-travel-cpt' ),
        'add_new'             => __( 'Add New', 'easyit-travel-cpt' ),
        'edit_item'           => __( 'Edit Travel', 'easyit-travel-cpt' ),
        'update_item'         => __( 'Update Travel', 'easyit-travel-cpt' ),
        'search_items'        => __( 'Search Travel', 'easyit-travel-cpt' ),
        'not_found'           => __( 'Not Found', 'easyit-travel-cpt' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'easyit-travel-cpt' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'travels', 'easyit-travel-cpt' ),
        'description'         => __( 'Travel posts', 'easyit-travel-cpt' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'      => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'comments' ),
  
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'category' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-smiley',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'capability_type'     => 'post',
        'rewrite'             => array('slug'=>'travel'), 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'travels', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type_travel', 0 ); 
