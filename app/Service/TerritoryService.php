<?php

namespace Service;

class TerritoryService extends \Core\Service {

  public function getTerritories(){
      return $this->db->select("SELECT * FROM " . PREFIX . "territories");
  }

  public function getTerritoryById($id) {
      return $this->db->select("SELECT * FROM " . PREFIX . "territories WHERE TerritoryID=:TerritoryID", array(':TerritoryID' => $id));
  }

}
