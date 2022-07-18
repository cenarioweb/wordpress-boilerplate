<?php

/**
 * @package CustomizzePlugin
 */

 class CustomizzePluginDeactivate
 {
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
 }