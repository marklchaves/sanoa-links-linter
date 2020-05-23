<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.caughtmyeye.cc
 * @since             1.0.0
 * @package           sanoa_links_linter
 *
 * @wordpress-plugin
 * Plugin Name:       Sanoa Links Linter
 * Plugin URI:        https://www.caughtmyeye.cc
 * Description:       Make external links open in a new tab.
 * Version:           1.0.0
 * Author:            caught my eye
 * Author URI:        https://www.caughtmyeye.cc
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sanoa-links-linter
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SANOA_LINKS_LINTER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sanoa-links-linter-activator.php
 */
function activate_sanoa_links_linter() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sanoa-links-linter-activator.php';
	Sanoa_Links_Linter_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sanoa-links-linter-deactivator.php
 */
function deactivate_sanoa_links_linter() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sanoa-links-linter-deactivator.php';
	Sanoa_Links_Linter_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sanoa_links_linter' );
register_deactivation_hook( __FILE__, 'deactivate_sanoa_links_linter' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sanoa-links-linter.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sanoa_links_linter() {

	$plugin = new sanoa_links_linter();
	$plugin->run();

}
run_sanoa_links_linter();
