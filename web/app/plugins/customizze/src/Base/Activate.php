<?php

namespace Cenarioweb\Customizze\Base;

/**
 * @package CustomizzePlugin
 */

 class Activate
 {
    public static function activate()
    {
        flush_rewrite_rules();
    }
 }