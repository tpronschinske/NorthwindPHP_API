<?php namespace Controllers;


use \Core\View;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Url;
use \Helpers\Request;
use \Middleware\AuthMiddleware;


class AuthController extends Controller {

    public function __construct(){
        parent::__construct();
    }

    public function login(){



      $token = AuthMiddleware::getToken();


      View::renderTemplate('header');
      View::render('auth/login', $data);
      View::renderTemplate('footer');
    }

    public function testlogin(){
      //nbf = not before time
      $token = array (
        "iss" => URL,
        "aud" => URL,
        "iat" => time(),
        "nbf" => time() + 10,
        "exp" => time() + 7200
      );
      $jwt = JWT::encode($token, KEY);
      JWT::$leeway = 60; // $leeway in seconds
      $decoded = JWT::decode($jwt, KEY, array('HS256'));
      $decoded_array = (array) $decoded;
      $data['jwt'] = $jwt;
      $data['decoded'] = $decoded_array;

      // if($decoded_array->exp < $decoded_array->iat){
      //   $data['token'] = 'Invalid Token Expired';
      // }

      View::renderTemplate('header');
      View::render('auth/test', $data, $e);
      View::renderTemplate('footer');
    }


    public function logout(){
        Session::destroy();
    }


}
