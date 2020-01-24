<?php namespace Sehan\Auth0\Models;


use Model;

class Auth0Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'sehan_auth0_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}