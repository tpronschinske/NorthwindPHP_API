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
      try {
        if(Request::isPost()){
            $reqToken = Csrf::makeToken();
            echo json_encode($reqToken);
        }
      } catch (Exception $e) {
          http_response_code(400);
          var_dump($e);
          echo($e->getMessage());
          echo($e->getCode());
          exit;
      }


    }


    public function logout(){
        Session::destroy();
    }


}
