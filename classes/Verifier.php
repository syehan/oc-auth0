<?php

namespace Sehan\Auth0\Classes;

use Auth0\SDK\JWTVerifier;

class Verifier {

  protected $token;
  protected $tokenInfo;

  public function setCurrentToken($token) {

    try {
      $verifier = new JWTVerifier([
        'supported_algs' => ['RS256'],
        'valid_audiences' => ['https://wetguns.sehan.site/v1/i'],
        'authorized_iss' => ['https://wetguns.auth0.com/']
      ]);

      $this->token = $token;
      $this->tokenInfo = $verifier->verifyAndDecode($token);
    }
    catch(\Auth0\SDK\Exception\CoreException $e) {
      throw $e;
    }
  }

  // This endpoint doesn't need authentication
  public function publicEndpoint() {
    return array(
      "status" => "ok",
      "message" => "Hello from a public endpoint! You don't need to be authenticated to see this."
    );
  }

  public function privateEndpoint() {
    return array(
      "status" => "ok",
      "message" => "Hello from a private endpoint! You need to be authenticated to see this."
    );
  }
}