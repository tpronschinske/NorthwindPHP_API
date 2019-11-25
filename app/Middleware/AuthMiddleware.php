<?php

namespace Middleware;
use \Helpers\Jwt;

class AuthMiddleware
{
    public function __construct()
    {

    }

    public static function getToken($data = null)
    {
      //nbf = not before time
      $token = array (
        "iss" => URL,
        "aud" => URL,
        "iat" => time(),
        "nbf" => time() + 10,
        "exp" => time() + 7200,
        "data" => $data
      );
      $jwt = JWT::encode($token, KEY);
      return $jwt;
    }


}
