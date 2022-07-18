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

require_once dirname(__FILE__) . '/vendor/autoload.php';

define( 'PLUGIN_PATH', plugin_dir_path(__FILE__) );
define( 'PLUGIN_URL', plugin_dir_url(__FILE__) );
define( 'PLUGIN_FILE', __FILE__);
define( 'PLUGIN_BASENAME', plugin_basename(__FILE__) );
define( 'PLUGIN_NAME', 'customizze' );
define( 'PLUGIN_TITLE', 'Customizze' );
define( 'PLUGIN_VERSION', '0.1.0' );

\Cenarioweb\Customizze\Init::register_hooks();
\Cenarioweb\Customizze\Init::register_services();

// register_activation_hook(__FILE__, array(\Cenarioweb\Customizze\Base\Activate::class, 'activate'));
// register_deactivation_hook(__FILE__, array(\Cenarioweb\Customizze\Base\Deactivate::class, 'deactivate'));
