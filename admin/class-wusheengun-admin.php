<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.google.com
 * @since      1.0.0
 *
 * @package    Wusheengun
 * @subpackage Wusheengun/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wusheengun
 * @subpackage Wusheengun/admin
 * @author     naou <naoufelbenmensour@gmail.com>
 */
class Wusheengun_Admin {

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
	private $tables;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		require_once WU_SHEENGUN_PLUGIN_DIR. 'includes/class-wusheengun-tables.php';
		$this->tables = new Wusheengun_Tables();

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
		 * defined in Wusheengun_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wusheengun_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( "bootstrap.min.css", plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( "dataTables.min.css", plugin_dir_url( __FILE__ ) . 'css/jquery.dataTables.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( "wusheengun.css", plugin_dir_url( __FILE__ ) . 'css/wusheengun.css', array(), $this->version, 'all' );
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
		 * defined in Wusheengun_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wusheengun_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( "bootstrap.min.js", plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( "dataTables.min.js", plugin_dir_url( __FILE__ ) . 'js/jquery.dataTables.min.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( "notifyBar.js", plugin_dir_url( __FILE__ ) . 'js/jquery.notifyBar.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( "validate.min.js", plugin_dir_url( __FILE__ ) . 'js/jquery.validate.min.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( "wusheengun.js", plugin_dir_url( __FILE__ ) . 'js/wusheengun', array( 'jquery' ), $this->version, true );
		wp_localize_script("wusheengun.js", "wu_ajax_url", admin_url("admin-ajax.php"));
	}

	public function wu_menus_sections(){
		add_menu_page("Zaineb Playlist", "Zaineb Playlist", "manage_options", "wu-menus", array($this, "dashboardfunction"), "dashicons-buddicons-activity", 30);
		add_submenu_page("wu-menus", "Playlists", "Playlists", "manage_options", "wu-menus", array($this, "dashboardfunction"));
		add_submenu_page("wu-menus", "Add Playlist", "Add Playlist", "manage_options", "wu-submenu", array($this, "settingfunction"));
	}

	// callback functions :
	public function dashboardfunction(){
		include_once WU_SHEENGUN_PLUGIN_DIR.'admin/partials/wu-menu-dashboard.php';
	}

	public function settingfunction(){
		include_once WU_SHEENGUN_PLUGIN_DIR.'admin/partials/wu-menu-setting.php';
	}

	public function wu_ajax_handler_fns(){
		$param = $_REQUEST['param'];
		global $wpdb;
		if($param == "save_member"){
			$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
			$age = isset($_REQUEST['age']) ? $_REQUEST['age'] : "";
			$levels = isset($_REQUEST['level']) ? $_REQUEST['level'] : "";
			$levels = json_encode($levels);
			$wpdb->insert($this->tables->wusheenguntable(), array(
				"name" => $name,
				"age" => $age,
				"member_for" => $levels
			));
			if($wpdb->insert_id > 0){
				echo json_encode(array(
					"status"=>1,
					"message"=>"Value has been inserted"
				));
			}else{
				echo json_encode(array(
					"status"=>0,
					"message"=>"Failed to insert"
				));
			}
			// $this->tables->wusheenguntable();
		}
		wp_die();
	}
}
