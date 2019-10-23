<?php

namespace Service;

class CustomerService extends \Core\Service {

  public function getCustomers(){
      return $this->db->select("SELECT * FROM customers");
  }

  public function getCustomerList(){
    return $this->db->select("SELECT CompanyName, ContactName FROM customers ORDER BY CompanyName ASC");
  }

  public function getCustomerById($id) {
      return $this->db->select("SELECT * FROM customers WHERE CustomerID=:CustomerID", array(':CustomerID' => $id));
  }

}
