<?php

namespace Controllers;

use Exception;
use Core\Controller;
use \Middleware\ResponseMiddleware;

class EmployeeController extends Controller
{

  private $_employee;

  public function __construct()
  {
      parent::__construct();
      $this->$_employee = new \Service\EmployeeService();
  }


  public function getEmployees(){
    try {
        $employees = $this->$_employee->getEmployees();
        if (isset($employees) && count($employees) > 0) {
          ResponseMiddleware::SuccessJsonResponse($employees);
        } else {
          throw new Exception('Employees Not Found', 404);
        }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }

  public function getEmployeeById($id){
    try {
        $employee = $this->$_employee->getEmployeeById($id);
        if (isset($employee) && count($employee) > 0) {
           ResponseMiddleware::SuccessJsonResponse($employee);
        } else {
           throw new Exception('Employee Not Found Exception', 404);
        }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }


}
