<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://devdaryl.com/
 * @since      1.0
 *
 * @package    Apogee_Menu
 * @subpackage Apogee_Menu/admin
 */
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Apogee_Menu
 * @subpackage Apogee_Menu/admin
 * @author     Daryl Magera <mageradaryl12@gmail.com>
 */
class Apogee_Menu_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0
	 * @param      string    $apogee_menu      The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		// Lets add an action to setup the admin menu in the left nav
		add_action('admin_menu', array($this, 'add_apogee_menu_admin'));

	}

	/**
	 * Add the menu items to the admin menu
	 *
	 * @since    1.0.0
	 */

	public function add_apogee_menu_admin() {
        // takes 7 argumants
        /** 
         * 1. The actual document title you would see on the tab of your browser.
         * 2. Text you will see in the admin side bar.
         * 3. Capability - The permision a user needs to have inorder to access the page
         * 4. Slug name or shortname for this page (it will display in the url or address bar).
         * 5. Function that outputs the html for the page.
         * 6. Icon that will appear in the admin menu
         * 7. A number that controls where our menu will appear vertically (The higher the number the lower it will be placed on the admin menu panel).
         */
        add_menu_page('Apogee Menu', 'Apogee Menu', 'manage_options', 'apogeemenu', array($this, 'apogee_menu_admin_display'), 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNS4yMSAyNi43Ij48ZGVmcz48c3R5bGU+LmNscy0xe2lzb2xhdGlvbjppc29sYXRlO30uY2xzLTIsLmNscy0ze2ZpbGw6bm9uZTtzdHJva2U6I2ZmZjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2Utd2lkdGg6MS41cHg7fS5jbHMtMntzdHJva2UtbWl0ZXJsaW1pdDoxMDttaXgtYmxlbmQtbW9kZTpkYXJrZW47fS5jbHMtM3tzdHJva2UtbGluZWpvaW46cm91bmQ7fTwvc3R5bGU+PC9kZWZzPjxnIGNsYXNzPSJjbHMtMSI+PGcgaWQ9IkxheWVyXzIiIGRhdGEtbmFtZT0iTGF5ZXIgMiI+PGcgaWQ9IkxheWVyXzEtMiIgZGF0YS1uYW1lPSJMYXllciAxIj48cGF0aCBjbGFzcz0iY2xzLTIiIGQ9Ik0xMiwuOWMuNDYsNCwxLjIyLDMwLjI2LDEwLjgzLDI0LjEzLDMuMjUtMi4wNywxLjIzLTEwLjQzLTIuMjYtOC0xLjIxLjgzLTEuNCw1LjM5LjMzLDUuNSwyLjE3LjEzLDEuODQtNC4xOC4zMS0yLjM3Ii8+PHBhdGggY2xhc3M9ImNscy0yIiBkPSJNNyw2LjA2YzIuNzMuNyw0LTMuNCw0LjQ2LTUuMzEiLz48cGF0aCBjbGFzcz0iY2xzLTIiIGQ9Ik0yLjQzLDE3LjljLS4yMS0uNDYuMjItLjkzLjYxLTEuMjRBMzUuMjUsMzUuMjUsMCwwLDEsMTkuNzMsOS40N2E1LjYsNS42LDAsMCwxLDIuODUuMTJBMi4xNSwyLjE1LDAsMCwxLDI0LDExLjgxYTIuNTQsMi41NCwwLDAsMS0xLjcyLDEuNjksMTEuNTgsMTEuNTgsMCwwLDEtNC4xLjU0QTIuMTEsMi4xMSwwLDAsMSwxNywxMy44MmEuNzcuNzcsMCwwLDEtLjI3LTEuMDcsMi4zNiwyLjM2LDAsMCwxLDEuNzItLjE3Yy41NC4yNC43NCwxLjE0LjIsMS4zOWExLjA4LDEuMDgsMCwwLDAtLjM3LTEuNzgsMS40OSwxLjQ5LDAsMCwwLTEuNzcuOTQiLz48cGF0aCBjbGFzcz0iY2xzLTMiIGQ9Ik0xMS42NCwzLjE5QTU4LjQ2LDU4LjQ2LDAsMCwxLDQsMjIuNjdjLS43OCwxLjI2LTEuOCwyLjYyLTMuMjgsMi43NCIvPjwvZz48L2c+PC9nPjwvc3ZnPg==', 100);
        // takes 6 argumants
        /** 
         * 1. The menu you want to add the subpage to (should be the same as the 4th arguement of the "add_manu_page()" method).
         * 2. The actual document title you would see on the tab of your browser.
         * 3. Text you will see in the admin side bar.
         * 4. Capability - who has access to this.
         * 5. Slug name or shortname for this page (it will display in the url or address bar).
         * 6. Function that outputs the html for the page.
         */
        // Edits the default settings for the first subpage menu option
        add_submenu_page('apogeemenu', 'The Apogee Menu', 'The Menu', 'manage_options', 'apogeemenu', array($this, 'apogee_menu_admin_display'));
        // Adds a subpage menu
        add_submenu_page('apogeemenu', 'Apogee Menu Options', 'Options', 'manage_options', 'apogee-menu-options', array($this, 'apogee_menu_admin_display_options'));
    }


	/**
	 * Returns the template for the admin area.
	 *
	 * @since    1.0.0
	 * @return  string  The admin partial HTML
	 */ 

	public function apogee_menu_admin_display() {
	/** Code that displays the HTML of the ADMIN section */
	include_once plugin_dir_path( __FILE__ ) . 'partials/apogee-menu-admin-display.php';
	
	}

	/**
	 * Returns the template for the admin options area.
	 *
	 * @since    1.0.0
	 * @return  string  The admin options partial HTML
	 */ 

	public function apogee_menu_admin_display_options() {
	/** Code that displays the HTML of the ADMIN section */
	include_once plugin_dir_path( __FILE__ ) . 'partials/apogee-menu-admin-display-options.php';
		
	}


	/**
	 * Register the stylesheets for the admin area.
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
		wp_enqueue_style( 'apogee-admin-bootstrap-styles', '//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array(), '5.0.2', 'all' );
		wp_enqueue_style( 'apogee-admin-bootstrap-icon-styles', '//cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css', array('apogee-admin-bootstrap-styles'),'1.8.1', 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/apogee-menu-admin.css', array('apogee-admin-bootstrap-styles', 'apogee-admin-bootstrap-icon-styles'), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/apogee-menu-admin.js', array($this->plugin_name . '-jquery'), $this->version, true );
		wp_enqueue_media();
		wp_enqueue_script( $this->plugin_name . '-jquery', '//code.jquery.com/jquery-3.6.0.min.js', array(), '3.0.6', true );
	}

}