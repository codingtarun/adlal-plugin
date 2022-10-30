<?php

/**
 * 
 * @package adlal-plugin
 * 
 */

namespace Inc\Scripts;

class Scripts
{
    function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue_style'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_script'));
    }
    function enqueue_style()
    {
        wp_enqueue_style('wp_style', plugins_url('/assests/admin-style.css', __FILE__));
    }
    function enqueue_script()
    {
        wp_enqueue_script('wp_script', plugins_url('/assests/admin-script.js', __FILE__));
    }
}
