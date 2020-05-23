<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://caughtmyeye.cc
 * @since      1.0.0
 *
 * @package    Sanoa_Links_Linter
 * @subpackage Sanoa_Links_Linter/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Sanoa_Links_Linter
 * @subpackage Sanoa_Links_Linter/public
 * @author     caught my eye <mark@marklchaves.com>
 */
class Sanoa_Links_Linter_Public {

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
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sanoa-links-linter-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		
		wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sanoa-links-linter-public.js', '', $this->version, true ); // Put in footer

        // Grab all options
		$options = get_option($this->plugin_name);
		
        $urlparts = parse_url(site_url());
        $domain = $urlparts [host];

		$input_hostname = 
			(empty($options['input-hostname'])) ? $domain : $options['input-hostname'];	

		// Localize the script with new data	
		$searchArgs = array(
			'input_hostname' => $input_hostname,
			$this->plugin_name
		);
		wp_localize_script( $this->plugin_name, 'php_vars', $searchArgs );

		wp_enqueue_script( $this->plugin_name );

	}

}
