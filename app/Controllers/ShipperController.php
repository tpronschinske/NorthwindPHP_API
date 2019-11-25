<?php

namespace Controllers;

use Exception;
use Core\Controller;
use \Middleware\ResponseMiddleware;

class ShipperController extends Controller
{

  private $_shipper;

  public function __construct()
  {
      parent::__construct();
      $this->$_shipper = new \Service\ShipperService();
  }


  public function getShippers(){
    try {
        $shippers = $this->$_shipper->getShippers();
        if (isset($shippers) && count($shippers) > 0) {
          ResponseMiddleware::SuccessJsonResponse($shippers);
        } else {
          throw new Exception('Employees Not Found', 404);
        }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }

  public function getShipperById($id){
    try {
        $shipper = $this->$_shipper->getShipperById($id);
        if (isset($shipper) && count($shipper) > 0) {
           ResponseMiddleware::SuccessJsonResponse($shipper);
        } else {
           throw new Exception('Employee Not Found Exception', 404);
        }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }


}
