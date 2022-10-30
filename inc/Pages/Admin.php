<?php

/***
 *  @package adlal-plugin
 * 
 */

 namespace Inc\Pages;

 class Admin{
    function __construct()
    {
        
    }
    public function register(){
        add_action('admin_menu',array($this, 'add_adlal_admin_page'));
    }
    public function add_adlal_admin_page(){
        add_menu_page('Adlal | Settings','Adlal','manage_options','adlal_plugin',array($this , 'adlal_template'),'dashicons-store',null);
    }
    function adlal_template(){
        require_once PLUGIN_PATH.'./templates/index.php';
    }
 }