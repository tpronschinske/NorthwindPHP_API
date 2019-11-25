<?php

namespace Controllers;

use Exception;
use Core\Controller;
use \Middleware\ResponseMiddleware;

class TerritoryController extends Controller
{

  private $_territory;

  public function __construct()
  {
      parent::__construct();
      $this->$_territory = new \Service\TerritoryService();
  }


  public function getTerritories(){
    try {
        $territories = $this->$_territory->getTerritories();
        if (isset($territories) && count($territories) > 0) {
          ResponseMiddleware::SuccessJsonResponse($territories);
        } else {
          throw new Exception('Territories Not Found', 404);
        }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }

  public function getTerritoryById($id){
    try {
        $territory = $this->$_territory->getTerritoryById($id);
        if (isset($territory) && count($territory) > 0) {
           ResponseMiddleware::SuccessJsonResponse($territory);
        } else {
           throw new Exception('Territory Not Found Exception', 404);
        }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }


}
