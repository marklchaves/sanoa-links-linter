<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://caughtmyeye.cc
 * @since      1.0.0
 *
 * @package    Sanoa_Links_Linter
 * @subpackage Sanoa_Links_Linter/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sanoa_Links_Linter
 * @subpackage Sanoa_Links_Linter/admin
 * @author     caught my eye <mark@marklchaves.com>
 */
class Sanoa_Links_Linter_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sanoa-links-linter-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sanoa-links-linter-admin.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since 1.0.0
	 * 
	 * ~mlc 26 Mar 2020
	 */

	public function add_plugin_admin_menu()
	{
		add_options_page('Sanoa Links Linter Settings', 'Sanoa Links Linter', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'));
	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since 1.0.0
	 * 
	 * ~mlc 26 Mar 2020
	 */

	public function add_action_links($links)
	{
		$settings_link = array(
			'<a href="' . admin_url('options-general.php?page=' . $this->plugin_name) . '">' . __('Settings', $this->plugin_name) . '</a>',
		);
		return array_merge($settings_link, $links);
	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since 1.0.0
	 * 
	 * ~mlc 26 Mar 2020
	 */

	public function display_plugin_setup_page()
	{
		include_once('partials/sanoa-links-linter-admin-display.php');
	}

	// ~mlc 26 Mar 2020
	public function validate($input)
	{
		// All inputs        
		$valid = array();

		$check_input = $input['input-hostname'];

		$check_input = sanitize_text_field( $check_input );

        $urlparts = parse_url(site_url());
        $domain = $urlparts [host];

		// Input hostname
		$valid['input-hostname'] = (isset($check_input) && !empty($check_input)) ? $check_input : $domain ;

		return $valid;
	}

	// ~mlc 26 Mar 2020
	public function options_update()
	{
		register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}
}
