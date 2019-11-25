<?php

namespace Service;

class RegionService extends \Core\Service {

  public function getRegions(){
      return $this->db->select("SELECT * FROM " . PREFIX . "region");
  }

  public function getRegionById($id) {
      return $this->db->select("SELECT * FROM " . PREFIX . "region WHERE RegionID=:RegionID", array(':RegionID' => $id));
  }

}
