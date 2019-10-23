<?php

namespace Middleware;

class ResponseMiddleware
{

  public function __construct()
  {

  }

  public static function SuccessJsonResponse($data, $message = null){
    $responseData = array(
      'code' => 200,
      'data' => $data,
      'message' => $message,
    );
    echo json_encode($responseData);
    exit;
  }

  public static function ErrorJsonResponse($data, $message = ''){
    $errorResponseData = array(
      'code' => $data->getCode(),
      'message' => $message ? $message : $data->getMessage(),
    );
    http_response_code($code);
    header('Content-Type: application/json');
    header('HTTP/1.1 '. $data->getCode() . ' ' . $data->getMessage());
    echo json_encode($errorResponseData);
    exit;
  }


}
