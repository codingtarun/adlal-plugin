<?php

/**
 * @package Adlal-plugin
 * 
 * Triggers when plugin is uninstalled
 */

if(!defined('WP_UNINSTALL_PLUGIN') ){
    die();
}

/**
 * -------------------------------------------------
 * Clear Database data related to our plugin
 * --------------------------------------------------
 */

 $varieties = get_posts(array('post_type' => 'variety','numberposts'=> -1)); 

 foreach($varieties as $variety){
    wp_delete_post($variety->ID, true);
 }