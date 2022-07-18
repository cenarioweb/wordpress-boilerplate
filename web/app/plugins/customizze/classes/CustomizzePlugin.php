<?php

/**
 * The core plugin class.
 *
 * @package    CustomizzePlugin
 * @author     Carlos Eduardo <carloseduardo@cenarioweb.com.br>
 */
class CustomizzePlugin
{
    protected $plugin_name;
    protected $plugin_version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     */
    public function __construct()
    {
        $this->plugin_version = (defined('CUSTOMIZZE_PLUGIN_VERSION') && (getenv('WP_ENV') == 'production'))
            ? CUSTOMIZZE_PLUGIN_VERSION
            : substr(md5(uniqid()), 0, 5);

        $this->plugin_name = 'customizze';
    }

    public function register()
    {
        $this->load_dependencies();
        $this->register_settings_page();

        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    public function register_settings_page()
    {
        $settings_page = new CustomizzePluginSettingsPage();
        $settings_page->register();
    }

    private function load_dependencies()
    {
        require_once plugin_dir_path(__FILE__) . 'CustomizzePluginActivate.php';
        require_once plugin_dir_path(__FILE__) . 'CustomizzePluginDeactivate.php';
        require_once plugin_dir_path(__FILE__) . 'CustomizzePluginSettingsPage.php';
    }

    public function activate()
    {
        CustomizzePluginActivate::activate();
    }

    public function deactivate()
    {
        CustomizzePluginDeactivate::deactivate();
    }

    public function enqueue()
    {
        wp_enqueue_style($this->plugin_name, plugins_url('../assets/css/customizze.css', __FILE__), array(), $this->plugin_version, 'all');
        wp_enqueue_script($this->plugin_name, plugins_url('../assets/js/customizze.js', __FILE__), array(), $this->plugin_version, false);
    }

    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

    public function get_plugin_version()
    {
        return $this->plugin_version;
    }
}
