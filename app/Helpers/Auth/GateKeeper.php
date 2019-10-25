<?php

namespace Helpers;

use Exception;
use \Helpers\Session;
use \Helpers\Jwt;
use \Helpers\Csrf;


class GateKeeper
{

  public function __construct()
  {
  }

  public function validateUserToken(){
    try {
      $headers = apache_request_headers();
      $token = $headers['Authorization'];
			return Csrf::validateToken($token);
    } catch (Exception $e){
      throw new Exception('Not Authorized Exception', 401);
      ResponseMiddleware::ErrorJsonResponse($e);
    }

	}

}
