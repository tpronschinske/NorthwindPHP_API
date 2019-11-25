<?php

namespace Controllers;

use Exception;
use Core\Controller;
use \Middleware\ResponseMiddleware;

class SupplierController extends Controller
{

  private $_supplier;

  public function __construct()
  {
      parent::__construct();
      $this->$_supplier = new \Service\SupplierService();
  }


  public function getSuppliers(){
    try {
        $suppliers = $this->$_supplier->getSuppliers();
        if (isset($suppliers) && count($suppliers) > 0) {
          ResponseMiddleware::SuccessJsonResponse($suppliers);
        } else {
          throw new Exception('Suppliers Not Found', 404);
        }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }

  public function getSupplierById($id){
    try {
        $supplier = $this->$_supplier->getSupplierById($id);
        if (isset($supplier) && count($supplier) > 0) {
           ResponseMiddleware::SuccessJsonResponse($supplier);
        } else {
           throw new Exception('Supplier Not Found Exception', 404);
        }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }


}
