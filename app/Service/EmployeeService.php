<?php

namespace Service;

class EmployeeService extends \Core\Service {

  public function getEmployees(){
      return $this->db->select("SELECT * FROM " . PREFIX . "employees");
  }

  public function getEmployeeById($id) {
      return $this->db->select("SELECT * FROM " . PREFIX . "employees WHERE EmployeeID=:EmployeeID", array(':EmployeeID' => $id));
  }

}
