<?php

namespace Cenarioweb\Customizze\Pages;

use Cenarioweb\Customizze\Api\SettingsApi;

/**
 * Menage plugin links and settings pages.
 *
 * @package    CustomizzePlugin
 * @author     Carlos Eduardo <carloseduardo@cenarioweb.com.br>
 */
class Admin
{
    protected $settings;

    public function __construct()
    {
        $this->settings = new SettingsApi();
    }

    public function register()
    {
        $this->settings->addPages($this->pages())->register();
    }

    private function pages()
    {
        return [
            [
                'page_title' => 'Customizze - Configurações',
                'menu_title' => 'Customizze',
                'capability' => 'manage_options',
                'menu_slug' => 'customizze',
                'callback' => function () { echo '<h1>Customizze</h1>'; },
                'icon_url' => 'dashicons-coffee',
                'position' => 110
            ],
            [
                'page_title' => 'Alfred - Configurações',
                'menu_title' => 'Alfred',
                'capability' => 'manage_options',
                'menu_slug' => 'alfred',
                'callback' => function () { echo '<h1>Alfred</h1>'; },
                'icon_url' => 'dashicons-admin-settings',
                'position' => 111
            ]
        ];
    }
}
