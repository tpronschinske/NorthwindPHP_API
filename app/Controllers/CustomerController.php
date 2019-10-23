<?php

namespace Controllers;

use Exception;
use Core\Controller;
use \Middleware\ResponseMiddleware;

class CustomerController extends Controller
{

  private $_customer;

  public function __construct()
  {
      parent::__construct();
      $this->$_customer = new \Service\CustomerService();
  }


  public function getCustomers(){
    try {
        $customers = $this->$_customer->getCustomers();
        if (isset($customers)) {
          ResponseMiddleware::SuccessJsonResponse($customers);
        } else {
          throw new Exception('Customers Not Found', 404);
        }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }

  public function getCustomerList(){
    try {
        $customers = $this->$_customer->getCustomerList();
        if (isset($customers) && count($customers) > 0) {
          ResponseMiddleware::SuccessJsonResponse($customers);
        } else {
          throw new Exception('Customers Not Found', 404);
        }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }

  public function getCustomerById($id){
    try {
        $customer = $this->$_customer->getCustomerById($id);
        if (isset($customer) && count($customer) > 0) {
           ResponseMiddleware::SuccessJsonResponse($customer);
        } else {
           throw new Exception('Customer Not Found Exception', 404);
        }
    } catch (Exception $e) {
        http_response_code(404);
        // var_dump($e);
        // echo($e->getMessage());
        // echo($e->getCode());
        exit;
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }


}
