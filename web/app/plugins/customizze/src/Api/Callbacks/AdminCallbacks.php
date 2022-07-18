<?php

namespace Cenarioweb\Customizze\Api\Callbacks;

class AdminCallbacks
{
    public function dashboard()
    {
        return require_once(PLUGIN_PATH . 'templates/dashboard.php');
    }

    public function loginScreen()
    {
        return require_once(PLUGIN_PATH . 'templates/login-screen.php');
    }

    public function manageCustomPostTypes()
    {
        return require_once(PLUGIN_PATH . 'templates/manage-custom-posts.php');
    }
}