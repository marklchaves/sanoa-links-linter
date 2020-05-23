<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://caughtmyeye.cc
 * @since      1.0.0
 *
 * @package    Sanoa_Links_Linter
 * @subpackage Sanoa_Links_Linter/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Sanoa_Links_Linter
 * @subpackage Sanoa_Links_Linter/includes
 * @author     caught my eye <mark@marklchaves.com>
 */
class Sanoa_Links_Linter_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'sanoa-links-linter',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
