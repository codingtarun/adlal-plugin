<?php

/**
 * 
 * @package adlal-plugin
 * 
 */


namespace Inc\Taxonomy;

class CustomTaxonomy
{


    function register()
    {
        add_action('init', array($this, 'create_fruit_taxonomy'));
    }

    function create_fruit_taxonomy()
    {

        $labels = array(
            'name'              => _x('Fruits', 'taxonomy general name', 'textdomain'),
            'singular_name'     => _x('Fruit', 'taxonomy singular name', 'textdomain'),
            'search_items'      => __('Search Fruits', 'textdomain'),
            'all_items'         => __('All Fruits', 'textdomain'),
            'parent_item'       => __('Parent Fruit', 'textdomain'),
            'parent_item_colon' => __('Parent Fruit:', 'textdomain'),
            'edit_item'         => __('Edit Fruit', 'textdomain'),
            'update_item'       => __('Update Fruit', 'textdomain'),
            'add_new_item'      => __('Add New Fruit', 'textdomain'),
            'new_item_name'     => __('New Fruit Name', 'textdomain'),
            'menu_name'         => __('Fruit', 'textdomain'),
        );
        $args = array(
            'labels' => $labels,
            'description' => __('Fruits Category', 'textdomain'),
            'hierarchical' => false,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'show_in_quick_edit' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
        );
        register_taxonomy('fruit', array(), $args);
    }
}
