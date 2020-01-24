<?php namespace Sehan\Auth0;

use Backend;
use System\Classes\PluginBase;
use Illuminate\Foundation\AliasLoader;

/**
 * Auth0 Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Auth0',
            'description' => 'No description provided yet...',
            'author'      => 'Sehan',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {
        $alias = AliasLoader::getInstance();
        $alias->alias('Auth0', 'Sehan\Auth0\Facades\Auth0');
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Sehan\Auth0\Components\Auth' => 'auth0',
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Auth0 Settings',
                'description' => 'Manage Auth0 based settings.',
                'category'    => 'Auth0',
                'icon'        => 'icon-users',
                'class'       => 'Sehan\Auth0\Models\Auth0Settings',
                'order'       => 1,
                'keywords'    => 'security location',
                'permissions' => ['sehan.auth0.auth_settings']
            ]
        ];
    }

}
