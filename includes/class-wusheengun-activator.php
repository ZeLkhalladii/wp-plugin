<?php

/**
 * Fired during plugin activation
 *
 * @link       www.google.com
 * @since      1.0.0
 *
 * @package    Wusheengun
 * @subpackage Wusheengun/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wusheengun
 * @subpackage Wusheengun/includes
 * @author     zineb <zinebelkhalladi.2019@gmail.com>
 */
class Wusheengun_Activator {

	private $table;
	public function __construct ($table_object){
		$this->table = $table_object;
	}

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate() {

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

		global $wpdb;
		if(count($wpdb->get_var("show tables like'".$this->table->wusheenguntable()."'")) == 0){
			$sqlQuery = 'CREATE TABLE `'.$this->table->wusheenguntable().'` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`name` varchar(255) DEFAULT NULL,
				`email` varchar(255) DEFAULT NULL,
				`phone_no` varchar(20) DEFAULT NULL,
				PRIMARY KEY (`id`)
			   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4';
			dbDelta($sqlQuery);
		}
		// $this->wu_menus_sections();
	}

	// public function wu_menus_sections(){
	// 	global $wpdb;
	// 	add_menu_page("Wu Menus","Wu Menus", "manage_options", "wu-menus", "", "dashicons-buddicons-activity", 7);
	// }

	// public function wusheenguntable(){
	// 	global $wpdb;
	// 	return $wpdb->prefix."wu_sheengun_table";
	// }

}
