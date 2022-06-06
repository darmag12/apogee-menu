<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link https://devdaryl.com/
 * @since 1.0.0
 *
 * @package Apogee_Menu
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}	
$count = 1;
while($count <= get_option('plugin_apogee_menu_options')) {
	// Delete menu item
	delete_option('plugin_apogee_menu_' . $count);
	//Increament
	$count++ ;
}
delete_option('plugin_apogee_menu_options_logo_img');
delete_option('plugin_apogee_menu_options_logo_text');
delete_option('plugin_apogee_menu_options_logo_link');
delete_option('plugin_apogee_menu_options_bg_color');
delete_option('plugin_apogee_menu_options_color');
delete_option('plugin_apogee_menu_options');
// register_uninstall_hook(__FILE__ , 'apogee_menu_uninstall');

// This function runs during uninstallation
// function apogee_menu_uninstall() {
// 	// Get the number of menu items set
// 	// $getApogeeMenuOptionsValue = get_option('plugin_apogee_menu_options');

// 	// check if a menu items have been set
// 	// if($getApogeeMenuOptionsValue) {
// 	// Get all options from the db
// 	// $getApogeeMenuOptionsLogoImg = get_option('plugin_apogee_menu_options_logo_img');
// 	// $getApogeeMenuOptionsLogoTxt = get_option('plugin_apogee_menu_options_logo_text');
// 	// $getApogeeMenuOptionsBgColor = get_option('plugin_apogee_menu_options_bg_color');
// 	// $getApogeeMenuOptionsColor = get_option('plugin_apogee_menu_options_color');
// 	// Set count
// 	// $count = 1;
// 	// while($count <= 10) {
// 	// 	// Get each menu item available
// 	// 	// $linkItemsData = get_option('plugin_apogee_menu_' . $count);
// 	// 	// Delete menu item
// 	// 	delete_option('plugin_apogee_menu_' . $count);
// 	// 	//Increament
// 	// 	$count++ ;
// 	// }

// 	// Delete all options from the db
// 	// delete_option('plugin_apogee_menu_options_logo_img');
// 	// delete_option('plugin_apogee_menu_options_logo_text');
// 	// delete_option('plugin_apogee_menu_options_bg_color');
// 	// delete_option('plugin_apogee_menu_options_color');
// 	// delete_option('plugin_apogee_menu_options');

// // }
// }
