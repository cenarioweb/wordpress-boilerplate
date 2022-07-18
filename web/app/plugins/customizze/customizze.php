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
    public function activate()
    {
        flush_rewrite_rules();
    }

    public function deactivate()
    {
        flush_rewrite_rules();
    }
}

if (class_exists('CustomizzePlugin')) {
    $customizzePlugin = new CustomizzePlugin();
}

register_activation_hook(__FILE__, array($customizzePlugin, 'activate'));

register_deactivation_hook(__FILE__, array($customizzePlugin, 'deactivate'));