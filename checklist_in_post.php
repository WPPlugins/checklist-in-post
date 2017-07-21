<?php
/*
Plugin Name: Checklist in Post
Description: Checklist in Post - Allow creating checklists in posts for readers
Author: Tomasz Małecki
Version: 1.0.3
Author URI: http://tomiskym.deviantart.com
Text Domain: checklistinpost
License: #GNUGPLv3
Licence URI: https://www.gnu.org/licenses/lgpl.html
Domain Path: /languages
*/
function checklistinpost_load_fa() {
	$plugin_url = plugin_dir_url( __FILE__ );
	wp_enqueue_style( 'wpb-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
}
add_action( 'admin_enqueue_scripts', 'checklistinpost_load_fa' );
function checklistinpost_load_frontend_style() {
	$plugin_url = plugin_dir_url( __FILE__ );
	wp_enqueue_style( 'checklist_in_post_css_frontend', $plugin_url . 'css/checklist_in_post_frontend.css' );
}
function checklistinpost_load_frontend_script() {
	$plugin_url = plugin_dir_url( __FILE__ );
	wp_register_script(
        'checklist_in_post_js_frontend',
        $plugin_url . 'checklist_in_post_frontend.js',
        array( 'jquery' )
    );
  wp_enqueue_script('checklist_in_post_js_frontend');
}

function checklistinpost_enqueue_plugin_scripts($plugin_array)
{
    //enqueue TinyMCE plugin script with its ID.
    $plugin_array["green_button_plugin"] =  plugin_dir_url(__FILE__) . "checklist_in_post.js";
    return $plugin_array;
}

add_filter("mce_external_plugins", "checklistinpost_enqueue_plugin_scripts");

function checklistinpost_register_buttons_editor($buttons)
{
    //register buttons with their id.
    array_push($buttons, "green");
    return $buttons;
}

add_filter("mce_buttons", "checklistinpost_register_buttons_editor");

function checklistinpost_load_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_style( 'checklist_in_post_css', $plugin_url . 'css/checklist_in_post.css' );
}
add_action( 'admin_enqueue_scripts', 'checklistinpost_load_plugin_css' );

function checklistinpost_start_shortcode( $attributes,$content=null ) {

				$content = "<div class='checklist_in_post'>" . $content . "</div>";
        return $content;
				//Return div instead of ul ?
}

add_shortcode( 'checklist_in_post', 'checklistinpost_start_shortcode' );
add_action( 'wp_enqueue_scripts', 'checklistinpost_load_frontend_script' );
add_action( 'wp_enqueue_scripts', 'checklistinpost_load_frontend_style' );
add_action( 'wp_enqueue_scripts', 'checklistinpost_load_fa' );
?>
