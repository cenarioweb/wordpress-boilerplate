<?php

namespace Cenarioweb\Customizze;

use Cenarioweb\Customizze\Base\Activate;
use Cenarioweb\Customizze\Base\Deactivate;

final class Init
{
    /**
     * Store all classes in array
     *
     * @return array Full list of classes
     */
    public static function get_services()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class
        ];
    }

    /**
     * Loop through the classes, initialize them,
     * and call the register() method, if exists.
     *
     * @return void
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    /**
     * Register the plugin's activation and deactivation hooks.
     *
     * @return void
     */
    public static function register_hooks()
    {
        register_activation_hook(PLUGIN_FILE, array(Activate::class, 'activate'));
        register_deactivation_hook(PLUGIN_FILE, array(Deactivate::class, 'deactivate'));
    }

    /**
     * Initialize the class
     *
     * @param class $class Class from the services array
     * @return class New instance of the class.
     */
    private static function instantiate($class)
    {
        return new $class();
    }
}