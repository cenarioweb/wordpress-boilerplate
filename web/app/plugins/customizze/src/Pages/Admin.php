<?php

namespace Cenarioweb\Customizze\Pages;

/**
 * Menage plugin links and settings pages.
 *
 * @package    CustomizzePlugin
 * @author     Carlos Eduardo <carloseduardo@cenarioweb.com.br>
 */
class Admin
{
    public function register()
    {
        add_action('admin_menu', array($this, 'add_admin_page'), 9);

        add_filter('plugin_action_links_' . PLUGIN_BASENAME, array($this, 'add_settings_link'));
    }

    public function add_admin_page()
    {
        add_menu_page('Customizze', 'Customizze', 'manage_options', 'customizze', array($this, 'admin_page' ), 'dashicons-coffee', 110);
    }

    public function add_settings_link($links)
    {
        $settings_link = sprintf('<a href="admin.php?page=%s">%s</a>', PLUGIN_NAME, __('Settings'));

        array_push($links, $settings_link);

        return $links;
    }

    public function admin_page()
    {
        require_once PLUGIN_PATH . 'templates/index.php';
    }
}
