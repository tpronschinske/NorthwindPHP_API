<?php

namespace Helpers;

class Csrf
{
  public static function makeToken()
  {
      $max_time = 60 * 60 * 1; // token is valid for 1 hour
      $csrf_token = Session::get('csrf_token');
      $stored_time = Session::get('csrf_token_time');
      if ($max_time + $stored_time <= time() || empty($csrf_token)) {
          Session::set('csrf_token', md5(uniqid(rand(), true)));
          Session::set('csrf_token_time', time());
      }
      return Session::get('csrf_token');
  }

  public static function validToken()
  {
      return $_POST['csrf_token'] === Session::get('csrf_token');
  }

  public static function validateToken($token)
  {
      if($token === Session::get('csrf_token')){
        return true;
      } else {
        return false;
      }

  }
}
