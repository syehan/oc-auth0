<?php

Route::group(['as' => 'sehan.auth0::'], function () {
    Route::get('login', ['as' => 'login', function () {
        return Auth0::login();
    }]);
    
    Route::get('logout', ['as' => 'logout', function () {
        return Auth0::logout();
    }]);
});