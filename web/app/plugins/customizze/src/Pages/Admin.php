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
                'position' => 110,
                'subpages' => [
                    [
                        'page_title' => 'Personalizar tela de login',
                        'menu_title' => 'Tela de login',
                        'menu_slug' => 'customizze-login-screen',
                        'callback' => function () { echo '<h1>Personalizar tela de login</h1>'; }
                    ],
                    [
                        'page_title' => 'Tipos de posts (Custom Post Types)',
                        'menu_title' => 'Tipos de posts',
                        'menu_slug' => 'customizze-custom-post-types',
                        'callback' => function () { echo '<h1>Tipos de posts (Custom Post Types)</h1>'; }
                    ]
                ]
            ],
        ];
    }
}
