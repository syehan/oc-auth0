<?php namespace Sehan\Auth0\Facades;

use October\Rain\Support\Facade;

class Auth0 extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sehan.auth0';
    }

    protected static function getFacadeInstance()
    {
        return new \Sehan\Auth0\Classes\Auth;
    }
}
