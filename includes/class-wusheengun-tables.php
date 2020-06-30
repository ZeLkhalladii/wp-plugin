<?php

/**
 * tables file definition  :
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
class Wusheengun_Tables {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function wusheenguntable(){
		global $wpdb;
		return $wpdb->prefix."wu_membres";
	}
}