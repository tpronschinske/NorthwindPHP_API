<?php

namespace Controllers;

use Exception;
use Core\Controller;
use \Middleware\ResponseMiddleware;

class RegionController extends Controller
{

  private $_region;

  public function __construct()
  {
      parent::__construct();
      $this->$_region = new \Service\RegionService();
  }


  public function getRegions(){
    try {
        $regions = $this->$_region->getRegions();
        if (isset($regions) && count($regions) > 0) {
          ResponseMiddleware::SuccessJsonResponse($regions);
        } else {
          throw new Exception('Regions Not Found', 404);
        }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }

  public function getRegionById($id){
    try {
        $region = $this->$_region->getRegionById($id);
        if (isset($region) && count($region) > 0) {
           ResponseMiddleware::SuccessJsonResponse($region);
        } else {
           throw new Exception('Region Not Found Exception', 404);
        }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }


}
