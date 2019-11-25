<?php

namespace Service;

class ShipperService extends \Core\Service {

  public function getShippers(){
      return $this->db->select("SELECT * FROM " . PREFIX . "shippers");
  }

  public function getShipperById($id) {
      return $this->db->select("SELECT * FROM " . PREFIX . "shippers WHERE ShipperID=:ShipperID", array(':ShipperID' => $id));
  }

}
