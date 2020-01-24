<?php

namespace Sehan\Auth0\Classes;

use Sehan\Auth0\Models\Auth0Settings;
use Auth0\SDK\Auth0;

class Auth {

    public $domain;
    public $client_id;
    public $client_secret;
    public $redirect_uri;
    public $audience;
    public $auth0;

    public function __construct()
    {
        $this->setConfig();
        
        if($this->audience == ''){
            $this->audience = 'https://' . $this->domain . '/userinfo';
        }

        $this->auth0 = $auth0 = new Auth0([
            'domain' => $this->domain,
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
            'redirect_uri' => $this->redirect_uri,
            'audience' => $this->audience,
            'scope' => 'openid profile',
            'persist_id_token' => true,
            'persist_access_token' => true,
            'persist_refresh_token' => true,
          ]);

    }

    public function setConfig()
    {
        $configType = Auth0Settings::get('config_type', 'env');
        
        $this->domain = $configType('AUTH0_DOMAIN');
        $this->client_id = $configType('AUTH0_CLIENT_ID');
        $this->client_secret = $configType('AUTH0_CLIENT_SECRET');
        $this->redirect_uri = $configType('AUTH0_CALLBACK_URL');
        $this->audience = $configType('AUTH_AUDIENCE', '');
    }

    public function getUser()
    {
        $userInfo = $this->auth0->getUser();

        return $userInfo;
    }

    public function login()
    {
        $this->auth0->login();
    }

    public function logout()
    {
        $this->auth0->logout();
        $return_to = 'http://' . $_SERVER['HTTP_HOST'];
        $logout_url = sprintf('http://%s/v2/logout?client_id=%s&returnTo=%s', $this->domain, $this->client_id, $return_to);
        header('Location: ' . $logout_url);
        die();
    }

}