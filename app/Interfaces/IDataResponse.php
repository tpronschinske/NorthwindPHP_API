<?php namespace interfaces;

interface IDataResponse {

  public function successResponse($data, $message, $title, $statusCode, $headers);

  public function errorResponse($data, $message, $title, $statusCode, $error, $headers);

}
