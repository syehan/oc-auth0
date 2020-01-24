<?php namespace Sehan\Auth0\Components;

use Cms\Classes\ComponentBase;
use Auth0;

class Auth extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Auth Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->addCss('assets/css/style.css');
        $this->page['user'] = $user = Auth0::getUser();
    }

    public function onLogin()
    {
        return redirect()->route('sehan.auth0::login');
    }

    public function onLogout()
    {
        return redirect()->route('sehan.auth0::logout');
    }

}
