<?php
/***
 * 
 * @package adlal-plugin
 * 
 * 
 */

namespace Inc\Base;

 class Activate{
    public static function activate(){
        echo "HELLO";
        flush_rewrite_rules();
    }
 }