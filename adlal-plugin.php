<?php
/**
 * @package Adlal-plugin
 */
/*
Plugin Name: Adlal PLugin
Plugin URI: https://tarun.tech/
Description: My first plugin.
Version: 0.1
Author: Tarun Chauhan
Author URI: https://tarun.tech/
License: GPLv2 or later
Text Domain: adlal-plugin
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2022 Automattic, Inc.
*/
/**
 * defined('ABSPATH') or die("You are not authorized to access this file");
 *if(!function_exists('add_action')){
 * die("you are not authorized to access this file");
 *}
 */

// Security Checkup

if(!defined('ABSPATH')){
    die();
}
if(file_exists(dirname(__FILE__).'./vendor/autoload.php')){
    require_once dirname(__FILE__).'./vendor/autoload.php';
}

define('PLUGIN_PATH',plugin_dir_path(__FILE__));

if(class_exists('Inc\\Init')){
    Inc\Init::start_services();
}