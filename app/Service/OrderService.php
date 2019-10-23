<?php
namespace Service;

use \Core\Service as BaseService;

class OrderService extends BaseService {

  public function getOrders(){
      return $this->db->select("SELECT * FROM " . PREFIX . "orders");
  }

  public function getOrderById($id) {
      return $this->db->select("SELECT * FROM " . PREFIX . "orders WHERE OrderID=:OrderID", array(':OrderID' => $id));
  }

  public function getOrderDetailsById($id) {
      return $this->db->select("SELECT * FROM " . PREFIX . "orderdetails WHERE OrderID=:OrderID", array(':OrderID' => $id));
  }

}
