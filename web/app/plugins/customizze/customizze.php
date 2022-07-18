<?php

/**
 * This plugin was developed in the learning process
 * of building a WordPress plugins.
 * A lot of material was read, but the main source was the video
 * tutorials from Alessandro Castellani's channel
 * (https://www.youtube.com/c/AlessandroCastellani), with the
 * following playlist:
 *
 * https://www.youtube.com/playlist?list=PLriKzYyLb28kR_CPMz8uierDWC2y3znI2
 *
 * @package           Customizze
 * @link              https://cenarioweb.com.br
 * @since             1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       Customizze
 * Plugin URI:        https://fvgestao.com.br
 * Description:       This plugin was developed to offer customization options for a website built with Wordpress.
 * Version:           0.1.0
 * Author:            Carlos Eduardo
 * Author URI:        https://cenarioweb.com.br
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       customizze
 */

defined('ABSPATH') or die("You can't access this file. Get out of here!");

class CustomizzePlugin
{
    protected $plugin_name = 'customizze';
    protected $plugin_version = '0.1.0';

    public function __construct()
    {
        $this->plugin_name = 'customizze';
        $this->plugin_version = getenv('WP_ENV') == 'production' ? $this->plugin_version : substr(md5(uniqid()), 0, 5);
    }

    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    public function activate()
    {
        flush_rewrite_rules();
    }

    public function deactivate()
    {
        flush_rewrite_rules();
    }

    public function enqueue()
    {
        wp_enqueue_style($this->plugin_name, plugins_url('assets/css/customizze.css', __FILE__), array(), $this->plugin_version, 'all');
        wp_enqueue_script($this->plugin_name, plugins_url('assets/js/customizze.js', __FILE__), array(), $this->plugin_version, false);
    }
}

if (class_exists('CustomizzePlugin')) {
    $customizzePlugin = new CustomizzePlugin();
    $customizzePlugin->register();
}

register_activation_hook(__FILE__, array($customizzePlugin, 'activate'));

register_deactivation_hook(__FILE__, array($customizzePlugin, 'deactivate'));