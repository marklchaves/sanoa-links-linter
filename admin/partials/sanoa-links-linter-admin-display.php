<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://caughtmyeye.cc
 * @since      1.0.0
 *
 * @package    Sanoa_Links_Linter
 * @subpackage Sanoa_Links_Linter/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>

    <form method="post" name="sanoa-links-linter_options" action="options.php">
        <?php
        // Grab all options
        $options = get_option($this->plugin_name);

        $urlparts = parse_url(site_url());
        $domain = $urlparts [host];

        logit_lover('domain = ' . $domain);

        $input_hostname = 
            (empty($options['input-hostname'])) ? $domain : $options['input-hostname'];

        ?>
        <?php
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
        ?>

        <!-- Input Field for Hostname -->
        <fieldset>
            <legend class="screen-reader-text">
                <span>Hostname</span>
            </legend>
            <label for="<?php echo $this->plugin_name; ?>-input-hostname">
                <span>
                    <?php esc_attr_e('Hostname', $this->plugin_name); ?>
                </span>
                <input type="text" id="<?php echo $this->plugin_name; ?>-input-hostname" name="<?php echo $this->plugin_name; ?>[input-hostname]" value="<?php echo $input_hostname; ?>" 
                placeholder="www.yourcooldomainhere.com"/>
            </label>
        </fieldset>

        <?php submit_button('Save all changes', 'primary', 'submit', TRUE); ?>

    </form>

</div>