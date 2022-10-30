<?php

/**
 * @package adlal-plugin
 */
 
 namespace Inc;


 final class Init{

    public static function get_services(){
        return [
            Scripts\Scripts::class,
            Pages\Admin::class,
            //Taxonomy\CustomTaxonomy::class,
            Posts\CustomPost::class,

        ];
    }
    private static function instantiate($class){
        return new $class();
    }
    public static function start_services(){
        foreach(self::get_services() as $class){
            $services = self::instantiate($class);
            if(method_exists($services, 'register')){
                $services->register();
            }
        }
    }
 }

//  use Inc\Base\Activate;
// use Inc\Base\Deactivate;
// use Inc\Pages\Admin;


// if(!class_exists('AdlalPlugin')){
//     class AdlalPlugin{

//         public $plugin;
//         function __construct()
//         {
//             $this->plugin = plugin_basename(__FILE__);
//         }
        
//         function init(){
//             /**
//             * -----------------------------------------------------
//             * Bootstraping the plugin.
//             * Adding Custom Taxonomy & Post Type.
//             * Initializing all the scripts & styles.
//             * Adding custom admin page.
//             * Adding Extra Options links to plugin panel.
//             * -----------------------------------------------------
//             */
            
//             add_action('init',array($this, 'create_fruit_taxonomy'));
//             add_action('init',array($this, 'create_variety_post_type'));
    
//             add_action('admin_enqueue_scripts',array($this, 'enqueue_style'));
//             add_action('admin_enqueue_scripts',array($this, 'enqueue_script'));
    
            
    
//             add_filter('plugin_action_links_'.$this->plugin, array($this, 'plugin_settings_link'));
    
//         }
        
    
//         /***
//          * -----------------------------------------------------------------------------------------------
//          * Plugin Basic funcationality 
//          * Activate : When plugin is activated.
//          * Deactivate :  When plugin is deactivated.
//          * Uninstall : When plugin is uninstalled.
//          * -----------------------------------------------------------------------------------------------
//          */
    
//          function activate(){
//             Activate::activate();
//          }
    
//          function deactivate(){
//             Deactivate::deactivate();
//          }
//         /**
//          * -------------------------------------
//          * Custom Post Type : Varieties 
//          * -------------------------------------
//          */
//         function create_variety_post_type(){
//             $labels = array(
//                 'name' => _x( 'Varieties', 'Post Type General Name', 'varieties' ),
//                 'singular_name' => _x( 'Variety', 'Post Type Singular Name', 'varieties' ),
//                 'menu_name' => _x( 'Varieties', 'Admin Menu text', 'varieties' ),
//                 'name_admin_bar' => _x( 'Variety', 'Add New on Toolbar', 'varieties' ),
//                 'archives' => __( 'Variety Archives', 'varieties' ),
//                 'attributes' => __( 'Variety Attributes', 'varieties' ),
//                 'parent_item_colon' => __( 'Parent Variety:', 'varieties' ),
//                 'all_items' => __( 'All Varieties', 'varieties' ),
//                 'add_new_item' => __( 'Add New Variety', 'varieties' ),
//                 'add_new' => __( 'Add New', 'varieties' ),
//                 'new_item' => __( 'New Variety', 'varieties' ),
//                 'edit_item' => __( 'Edit Variety', 'varieties' ),
//                 'update_item' => __( 'Update Variety', 'varieties' ),
//                 'view_item' => __( 'View Variety', 'varieties' ),
//                 'view_items' => __( 'View Varieties', 'varieties' ),
//                 'search_items' => __( 'Search Variety', 'varieties' ),
//                 'not_found' => __( 'Not found', 'varieties' ),
//                 'not_found_in_trash' => __( 'Not found in Trash', 'varieties' ),
//                 'featured_image' => __( 'Featured Image', 'varieties' ),
//                 'set_featured_image' => __( 'Set featured image', 'varieties' ),
//                 'remove_featured_image' => __( 'Remove featured image', 'varieties' ),
//                 'use_featured_image' => __( 'Use as featured image', 'varieties' ),
//                 'insert_into_item' => __( 'Insert into Variety', 'varieties' ),
//                 'uploaded_to_this_item' => __( 'Uploaded to this Variety', 'varieties' ),
//                 'items_list' => __( 'Varieties list', 'varieties' ),
//                 'items_list_navigation' => __( 'Varieties list navigation', 'varieties' ),
//                 'filter_items_list' => __( 'Filter Varieties list', 'varieties' ),
//             );
//             $args = array(
//                 'label' => __( 'Variety', 'varieties' ),
//                 'description' => __( 'Fruit Varieties Description', 'varieties' ),
//                 'labels' => $labels,
//                 'menu_icon' => 'dashicons-art',
//                 'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'comments', 'custom-fields'),
//                 'taxonomies' => array('fruit'),
//                 'public' => true,
//                 'show_ui' => true,
//                 'show_in_menu' => true,
//                 'menu_position' => 5,
//                 'show_in_admin_bar' => true,
//                 'show_in_nav_menus' => true,
//                 'can_export' => true,
//                 'has_archive' => true,
//                 'hierarchical' => false,
//                 'exclude_from_search' => false,
//                 'show_in_rest' => true,
//                 'publicly_queryable' => true,
//                 'capability_type' => 'post',
//             );
//             register_post_type( 'variety', $args );
//         }
    
//         /**
//          * Custom Taxonomy Type : Fruit
//          */
//         function create_fruit_taxonomy() {
    
//             $labels = array(
//                 'name'              => _x( 'Fruits', 'taxonomy general name', 'textdomain' ),
//                 'singular_name'     => _x( 'Fruit', 'taxonomy singular name', 'textdomain' ),
//                 'search_items'      => __( 'Search Fruits', 'textdomain' ),
//                 'all_items'         => __( 'All Fruits', 'textdomain' ),
//                 'parent_item'       => __( 'Parent Fruit', 'textdomain' ),
//                 'parent_item_colon' => __( 'Parent Fruit:', 'textdomain' ),
//                 'edit_item'         => __( 'Edit Fruit', 'textdomain' ),
//                 'update_item'       => __( 'Update Fruit', 'textdomain' ),
//                 'add_new_item'      => __( 'Add New Fruit', 'textdomain' ),
//                 'new_item_name'     => __( 'New Fruit Name', 'textdomain' ),
//                 'menu_name'         => __( 'Fruit', 'textdomain' ),
//             );
//             $args = array(
//                 'labels' => $labels,
//                 'description' => __( 'Fruits Category', 'textdomain' ),
//                 'hierarchical' => false,
//                 'public' => true,
//                 'publicly_queryable' => true,
//                 'show_ui' => true,
//                 'show_in_menu' => true,
//                 'show_in_nav_menus' => true,
//                 'show_tagcloud' => true,
//                 'show_in_quick_edit' => true,
//                 'show_admin_column' => true,
//                 'show_in_rest' => true,
//             );
//             register_taxonomy( 'fruit', array(), $args );
//         }
//         /**
//          * ---------------------------------------------------------------
//          * Enqueue Stylesheets & Scripts required for the plugin
//          * ---------------------------------------------------------------
//          */
    
//          function enqueue_style(){
//             wp_enqueue_style('wp_style', plugins_url('/assests/admin-style.css', __FILE__));
//          }
//          function enqueue_script(){
//             wp_enqueue_script('wp_script', plugins_url('/assests/admin-script.js', __FILE__));
//          }
//          /**
//           * --------------------------------------------------------------------
//           * Admin Page for Adlal Plugin
//           * Template for Adlal Plugin Page.
//           * Setting page link in plugin page.
//           *
//           *---------------------------------------------------------------------
//           */
//          function add_adlal_admin_page(){
//             //add_menu_page('Adlal | Settings','Adlal','manage_options','adlal_plugin',array($this, 'adlal_template'),'dashicons-store',null);
//             Admin::register();
//         }
//          function adlal_template(){
//             require_once plugin_dir_path(__FILE__).'templates/index.php';
//          }
//          function plugin_settings_link($links){
//             $settings = '<a href="options-general.php?page=adlal_plugin">Settings</a>';
//             array_push($links, $settings);
//             return $links;
//          }
//     }
// }



// if(class_exists('AdlalPlugin')){
//     $objAdlalPlugin = new AdlalPlugin();
//     $objAdlalPlugin->init();
// }

// /**
//  * -------------------------------------------------------------------
//  * Trigger a function when plugin is activated
//  * -------------------------------------------------------------------
//  */
// register_activation_hook(__FILE__, array($objAdlalPlugin, 'activate'));

// /**
//  * -------------------------------------------------------------------
//  * Trigger a function when plugin is deactivated
//  * -------------------------------------------------------------------
//  */

// register_deactivation_hook(__FILE__, array($objAdlalPlugin, 'deactivate'));

// /**
//  * -------------------------------------------------------------------
//  * Trigger a function when plugin is uninstalled
//  * -------------------------------------------------------------------
//  */

// register_uninstall_hook(__FILE__,array($objAdlalPlugin, 'uninstall'));