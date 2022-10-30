<?php

/**
 * 
 * @package Adlal-plugin
 * 
 */


namespace Inc\Posts;


class CustomPost
{
    public $plugin_path;

    function __construct(){
        $this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
    }
    
    function register(){
        
        //add_action('init',array($this, 'create_variety_post_type'));
        add_action('init', array($this, 'slider_cpt'));

        add_shortcode('slideshow', array($this, 'show_slider'));
    }

    public function slider_cpt(){
        $labels = array(
             'name' => 'Sliders',
             'singular_name' => 'Slider',
             'menu_name' => 'Sliders',
        );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => false,
            'supports' => array('title','custom-fields'),
            'menu_icon' => 'dashicons-format-gallery',
            'exclude_from_search' => true,
            'publicaly_queryable' => false,
        );
        register_post_type('slider',$args);
    }

    public function show_slider(){
        ob_start();
        
        require_once $this->plugin_path.'/templates/slider.php';

        

        return ob_get_clean();
    }
    // function create_variety_post_type()
    // {
    //     $labels = array(
    //         'name' => _x('Varieties', 'Post Type General Name', 'varieties'),
    //         'singular_name' => _x('Variety', 'Post Type Singular Name', 'varieties'),
    //         'menu_name' => _x('Varieties', 'Admin Menu text', 'varieties'),
    //         'name_admin_bar' => _x('Variety', 'Add New on Toolbar', 'varieties'),
    //         'archives' => __('Variety Archives', 'varieties'),
    //         'attributes' => __('Variety Attributes', 'varieties'),
    //         'parent_item_colon' => __('Parent Variety:', 'varieties'),
    //         'all_items' => __('All Varieties', 'varieties'),
    //         'add_new_item' => __('Add New Variety', 'varieties'),
    //         'add_new' => __('Add New', 'varieties'),
    //         'new_item' => __('New Variety', 'varieties'),
    //         'edit_item' => __('Edit Variety', 'varieties'),
    //         'update_item' => __('Update Variety', 'varieties'),
    //         'view_item' => __('View Variety', 'varieties'),
    //         'view_items' => __('View Varieties', 'varieties'),
    //         'search_items' => __('Search Variety', 'varieties'),
    //         'not_found' => __('Not found', 'varieties'),
    //         'not_found_in_trash' => __('Not found in Trash', 'varieties'),
    //         'featured_image' => __('Featured Image', 'varieties'),
    //         'set_featured_image' => __('Set featured image', 'varieties'),
    //         'remove_featured_image' => __('Remove featured image', 'varieties'),
    //         'use_featured_image' => __('Use as featured image', 'varieties'),
    //         'insert_into_item' => __('Insert into Variety', 'varieties'),
    //         'uploaded_to_this_item' => __('Uploaded to this Variety', 'varieties'),
    //         'items_list' => __('Varieties list', 'varieties'),
    //         'items_list_navigation' => __('Varieties list navigation', 'varieties'),
    //         'filter_items_list' => __('Filter Varieties list', 'varieties'),
    //     );
    //     $args = array(
    //         'label' => __('Variety', 'varieties'),
    //         'description' => __('Fruit Varieties Description', 'varieties'),
    //         'labels' => $labels,
    //         'menu_icon' => 'dashicons-art',
    //         //'supports' => array('title', 'excerpt', 'thumbnail', 'revisions', 'comments', 'custom-fields'),
    //         'supports' => array(),
    //         'taxonomies' => array('fruit'),
    //         'public' => true,
    //         'show_ui' => true,
    //         'show_in_menu' => true,
    //         'menu_position' => 5,
    //         'show_in_admin_bar' => true,
    //         'show_in_nav_menus' => true,
    //         'can_export' => true,
    //         'has_archive' => true,
    //         'hierarchical' => false,
    //         'exclude_from_search' => false,
    //         'show_in_rest' => true,
    //         'publicly_queryable' => true,
    //         'capability_type' => 'post',
    //     );
    //     register_post_type('variety', $args);
    // }
}
