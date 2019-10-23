<?php

namespace Service;

class ProductService extends \Core\Service {

  public function getProducts(){
      return $this->db->select("SELECT * FROM " . PREFIX . "products");
  }

  public function getProductById($id) {
      return $this->db->select("SELECT * FROM " . PREFIX . "products WHERE ProductID=:ProductID", array(':ProductID' => $id));
  }

}
