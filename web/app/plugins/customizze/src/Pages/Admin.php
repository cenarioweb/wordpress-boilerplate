<?php

namespace Cenarioweb\Customizze\Pages;

use Cenarioweb\Customizze\Api\Callbacks\AdminCallbacks;
use Cenarioweb\Customizze\Api\SettingsApi;

/**
 * Menage plugin links and settings pages.
 *
 * @package    CustomizzePlugin
 * @author     Carlos Eduardo <carloseduardo@cenarioweb.com.br>
 */
class Admin
{
    protected $callbacks;
    protected $settings;

    public function register()
    {
        $this->callbacks = new AdminCallbacks();

        $this->settings = new SettingsApi();

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
                'callback' => array($this->callbacks, 'dashboard'),
                'icon_url' => 'dashicons-coffee',
                'position' => 110,
                'subpages' => [
                    [
                        'page_title' => 'Personalizar tela de login',
                        'menu_title' => 'Tela de login',
                        'menu_slug' => 'customizze-login-screen',
                        'callback' => array($this->callbacks, 'loginScreen'),
                    ],
                    [
                        'page_title' => 'Tipos de posts (Custom Post Types)',
                        'menu_title' => 'Tipos de posts',
                        'menu_slug' => 'customizze-custom-post-types',
                        'callback' => array($this->callbacks, 'manageCustomPostTypes'),
                    ]
                ]
            ],
        ];
    }
}
