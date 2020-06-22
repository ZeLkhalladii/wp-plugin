<?php
/**
 * @package youpluG
 */
/*
plugin Name: youplug
plugin URI: http://youplug.com/plugin
Description: This is my first attempt on writing a custom plugin .
Version: 1.0.0
Author: Zineb Elkhalladi
Author URI: http://youplug.com
License: GPLv2 or leter
Text Domain: youplug
*/


/*
 this program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 2 of the License, or
 any later version.
 
 this program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program. If not,write to the free software 
 foundation, Inc., 51 Franklin Street, Fifth floor, boston, MA  02110-1301, USA.
 
 Copyright 2005-2015 Automattic, Inc.
*/

defined('ABSPATH') or die('hey, what are you doing here ? you silly humain!');


class YouPlug {

//public
// can be accessed everywhere

//protected
//can be accssed only within the class itself

//private

    function __construct() {

        add_action('init', array($this, 'custom_post_type'));
    }

    function register() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue') );
    }

    protected function create_post_type() {
        add_action( 'init', array( $this, 'custom_post_type' ));
    }
    
    function activate() {
        //genereted a CPI
        $this->custom_post_type();
        //flush rewrite rules
        flush_rewrite_rules();
    }


    function deactivate() {
        //flush rewrite rules
    }


    // function uninstall() {
    // //delete CPI

    // }
    function custom_post_type() {
        register_post_type('book', ['public'=> true, 'label'=> 'books']);
    }

    // add_action( 'init', 'custom_post_type' );


    function enqueue() {
        //enqueue all  our scripts
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
        wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));

    }
}

if (class_exists('YouPlug')) {
    $youPlug= new YouPlug();
    $youPlug->register();

}

// // activation

// register_activation_hook( __FILE__, array( $youPlug, 'activate'));

//deactivation
register_deactivation_hook(__FILE__, array($youPlug, 'deactivate'));

//uninstall
register_uninstall_hook(__FILE__, array($youPlug, 'uninstall'));