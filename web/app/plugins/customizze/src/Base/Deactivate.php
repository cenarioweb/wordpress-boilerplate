<?php

namespace Cenarioweb\Customizze\Base;

/**
 * @package CustomizzePlugin
 */

 class Deactivate
 {
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
 }