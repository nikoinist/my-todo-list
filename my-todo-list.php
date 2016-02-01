<?php
/**
 * Plugin Name: My todo list
 * Description: Simple todo plugin
 * Version: 1.0
 * Author: Zoran Mihelcic
 * 
 **/
 //Exit if Accessed Diretctliy
 if(!defined('ABSPATH')){
     exit;
 }

//Load scripts
require_once(plugin_dir_path(__FILE__) . '/includes/my-todo-list-scripts.php');

//Load shortcodes
require_once(plugin_dir_path(__FILE__) . '/includes/my-todo-list-shortcodes.php');

//check if admin
if(is_admin()){
    //load custom post type
    require_once(plugin_dir_path(__FILE__) . '/includes/my-todo-list-cpt.php');
    //Load fields
    require_once(plugin_dir_path(__FILE__) . '/includes/my-todo-list-fields.php');
}


