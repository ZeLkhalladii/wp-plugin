<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.google.com
 * @since             1.0.0
 * @package           Wusheengun
 *
 * @wordpress-plugin
 * Plugin Name:       Zaineb Playlist
 * Plugin URI:        www.google.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Zaineb khaladi
 * Author URI:        www.google.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wusheengun
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if( ! defined( "WU_SHEENGUN_PLUGIN_DIR" ))
	define( "WU_SHEENGUN_PLUGIN_DIR", plugin_dir_path(__FILE__) );
if( ! defined( "WU_SHEENGUN_PLUGIN_URL" ))
	define( "WU_SHEENGUN_PLUGIN_URL", plugins_url()."/WUSHEENGUN" );

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WUSHEENGUN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wusheengun-activator.php
 */
function activate_wusheengun() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wusheengun-tables.php';
	$tables = new Wusheengun_Tables();
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wusheengun-activator.php';
	$activator = new Wusheengun_Activator($tables);
	$activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wusheengun-deactivator.php
 */
function deactivate_wusheengun() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wusheengun-tables.php';
	$tables = new Wusheengun_Tables();
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wusheengun-deactivator.php';
	$deactivator = new Wusheengun_Deactivator($tables);
	$deactivator->deactivate();
}

register_activation_hook( __FILE__, 'activate_wusheengun' );
register_deactivation_hook( __FILE__, 'deactivate_wusheengun' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wusheengun.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wusheengun() {

	$plugin = new Wusheengun();
	$plugin->run();

}
run_wusheengun();
