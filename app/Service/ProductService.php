<?php

namespace Service;

use \Core\Service as BaseService;

class ProductService extends BaseService {

  public function getProducts(){
      return $this->db->select("SELECT * FROM " . PREFIX . "products");
  }

  public function getProductById($id) {
      return $this->db->select("SELECT * FROM " . PREFIX . "products WHERE ProductID=:ProductID", array(':ProductID' => $id));
  }

}
