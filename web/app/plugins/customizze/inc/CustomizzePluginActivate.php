<?php

/**
 * @package CustomizzePlugin
 */

 class CustomizzePluginActivate
 {
    public static function activate()
    {
        flush_rewrite_rules();
    }
 }