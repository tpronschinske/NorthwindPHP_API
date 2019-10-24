<?php namespace Controllers;


use \Core\View;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Url;
use \Helpers\Jwt;
use \Helpers\Request;
// Fake Auth Controller, Accepts any user and password

class AuthController extends \Core\Controller {

    public function __construct(){
        parent::__construct();
    }

    public function login(){
      // try {
      //   if(Request::isPost()){
      //       // $token = array (
      //       //   "iss" => 'http://northwind.coonetcreative.net',
      //       //   "aud" => "http://northwind.coonetcreative.net",
      //       //   "iat" => 1356999524,
      //       //   "nbf" => 1357000000
      //       // );
      //       // $jwt = JWT::encode($token, $key);
      //       // $decoded = JWT::decode($jwt, $key, array('HS256'));
      //       // echo json_encode($decoded);
      //
      //       // $reqToken = Csrf::makeToken();
      //       // echo json_encode($reqToken);
      //   }
      //
      //
      // } catch (Exception $e) {
      //     http_response_code(400);
      //     var_dump($e);
      //     echo($e->getMessage());
      //     echo($e->getCode());
      //     exit;
      // }


      $token = array (
        "iss" => URL,
        "aud" => URL,
        "iat" => time(),
        "nbf" => time() + 60
      );
      $jwt = JWT::encode($token, KEY);
      JWT::$leeway = 60; // $leeway in seconds
      $decoded = JWT::decode($jwt, KEY, array('HS256'));
      $decoded_array = (array) $decoded;
      $data['jwt'] = $jwt;
      $data['decoded'] = $decoded_array;

      View::renderTemplate('header');
      View::render('auth/login', $data);
      View::renderTemplate('footer');

    }


    public function logout(){
        Session::destroy();
    }


}
