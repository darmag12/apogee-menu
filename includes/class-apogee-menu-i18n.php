<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://devdaryl.com/
 * @since      1.0.0
 *
 * @package    Apogee_Menu
 * @subpackage Apogee_Menu/includes
 */
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Apogee_Menu
 * @subpackage Apogee_Menu/includes
 * @author     Daryl Magera <mageradaryl12@gmail.com>
 */
class Apogee_Menu_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'apogee-menu',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}