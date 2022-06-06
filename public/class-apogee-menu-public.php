<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://devdaryl.com/
 * @since      1.0.0
 *
 * @package    Apogee_Menu
 * @subpackage Apogee_Menu/public
 */
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Apogee_Menu
 * @subpackage Apogee_Menu/public
 * @author     Daryl Magera <mageradaryl12@gmail.com>
 */
class Apogee_Menu_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Returns the template for the public area.
	 *
	 * @since    1.0.0
	 * @return  string  The public partial HTML
	 */ 
	public function apogee_menu_public_display() {
		// /** Code that displays the HTML of the PUBLIC section */
		include_once plugin_dir_path( __FILE__ ) . 'partials/apogee-menu-public-display.php';
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Apogee_Menu_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Apogee_Menu_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( 'apogee-public-bootstrap-styles', '//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array(), '5.0.2', 'all' );
		wp_enqueue_style( 'apogee-public-bootstrap-icon-styles', '//cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css', array('apogee-public-bootstrap-styles'),'1.8.1', 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/apogee-menu-public.css', array('apogee-public-bootstrap-styles', 'apogee-public-bootstrap-icon-styles'), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Apogee_Menu_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Apogee_Menu_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'apogee-public-bootstrap-scripts', '//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array(), '5.0.2', false );
		wp_enqueue_script( 'apogee-public-bootstrap-popper-scripts', '//cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js', array( 'apogee-public-bootstrap-scripts' ), '2.9.2', false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/apogee-menu-public.js', array( 'apogee-public-bootstrap-scripts', 'apogee-public-bootstrap-popper-scripts' ), $this->version, false );

	}

}