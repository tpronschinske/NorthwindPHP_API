<?php

namespace Service;

class CategoryService extends \Core\Service {

  public function getCategories(){
      return $this->db->select("SELECT CategoryID, CategoryName, Description FROM " . PREFIX . "categories");
  }
  
  public function getCategoryById($id) {
      return $this->db->select("SELECT CategoryID, CategoryName, Description FROM " . PREFIX . "categories WHERE CategoryID=:CategoryID", array(':CategoryID' => $id));
  }

}
