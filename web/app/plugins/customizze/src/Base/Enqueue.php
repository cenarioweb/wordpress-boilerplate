<?php

namespace Cenarioweb\Customizze\Base;

/**
 * @package CustomizzePlugin
 */

 class Enqueue
 {
    protected $plugin_name;
    protected $plugin_version;

    public function __construct()
    {
        $this->plugin_version = (defined('PLUGIN_VERSION') && (getenv('WP_ENV') == 'production'))
            ? PLUGIN_VERSION
            : substr(md5(uniqid()), 0, 5);

        $this->plugin_name = defined('PLUGIN_NAME') ? PLUGIN_NAME : 'customizze_plugin';
    }

    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    public function enqueue()
    {
        wp_enqueue_style($this->plugin_name, PLUGIN_URL . 'assets/css/customizze.css', array(), $this->plugin_version, 'all');
        wp_enqueue_script($this->plugin_name, PLUGIN_URL . 'assets/js/customizze.js', array(), $this->plugin_version, false);
    }
 }