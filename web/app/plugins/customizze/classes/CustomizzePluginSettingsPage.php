<?php

/**
 * Menage plugin links and settings pages.
 *
 * @package    CustomizzePlugin
 * @author     Carlos Eduardo <carloseduardo@cenarioweb.com.br>
 */
class CustomizzePluginSettingsPage
{
    public function register()
    {
        add_action('admin_menu', array($this, 'add_settings_page'), 9);

        add_filter('plugin_action_links_' . CUSTOMIZZE_PLUGIN_BASENAME, array($this, 'add_settings_link'));
    }

    public function add_settings_page()
    {
        add_menu_page(CUSTOMIZZE_PLUGIN_TITLE, CUSTOMIZZE_PLUGIN_TITLE, 'manage_options', CUSTOMIZZE_PLUGIN_NAME, array($this, 'menu_dashboard' ), 'dashicons-coffee', 110);
    }

    public function add_settings_link($links)
    {
        $settings_link = '<a href="admin.php?page=customizze">' . __('Settings') . '</a>';

        array_push($links, $settings_link);

        return $links;
    }

    public function menu_dashboard()
    {
        require_once plugin_dir_path(__FILE__) . '/../templates/index.php';
    }
}
