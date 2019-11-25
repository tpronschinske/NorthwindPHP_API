<?php

namespace Service;

class SupplierService extends \Core\Service {

  public function getSuppliers(){
      return $this->db->select("SELECT * FROM " . PREFIX . "suppliers");
  }

  public function getSupplierById($id) {
      return $this->db->select("SELECT * FROM " . PREFIX . "suppliers WHERE SupplierID=:SupplierID", array(':SupplierID' => $id));
  }

}
