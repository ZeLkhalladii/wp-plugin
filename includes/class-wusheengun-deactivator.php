<?php

/**
 * Fired during plugin deactivation
 *
 * @link       www.google.com
 * @since      1.0.0
 *
 * @package    Wusheengun
 * @subpackage Wusheengun/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Wusheengun
 * @subpackage Wusheengun/includes
 * @author     zineb <zinebelkhalladi.2019@gmail.com>
 */
class Wusheengun_Deactivator {

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
	public function deactivate() {
		global $wpdb;
		$wpdb->query("Drop table IF EXISTS ".$this->table->wusheenguntable());
	}
	// public function wusheenguntable(){
	// 	global $wpdb;
	// 	return $wpdb->prefix."wu_sheengun_table";
	// }

}
