<?php
namespace Service;

use \Core\Service as BaseService;
use \Interfaces\IOrderService as IOrderService;

class OrderService extends BaseService implements IOrderService {

  public function getOrders(){
      return $this->db->select("SELECT * FROM " . PREFIX . "orders");
  }

  public function getOrderById($id) {
      return $this->db->select("SELECT * FROM " . PREFIX . "orders WHERE OrderID=:OrderID", array(':OrderID' => $id));
  }

  public function getOrderDetailsById($id) {
      return $this->db->select("SELECT * FROM " . PREFIX . "orderdetails WHERE OrderID=:OrderID", array(':OrderID' => $id));
  }

  public function updateOrder($id, $data){
    $order = array('Id' => $id);
    $orderData = array(
      'RequiredDate' => $data->FirstName,
      'ShippedDate' => $data->ShippedDate,
      'ShipVia' => $data->ShipVia,
      'ShipName' => $data->ShipName,
      'ShipAddress' => $data->ShipAddress,
      'ShipCity' => $data->ShipCity,
      'ShipRegion' => $data->ShipRegion,
      'ShipPostalCode' => $data->ShipPostalCode,
      'ShipCountry' => $data->ShipCountry,
    );
    return $this->db->update("orders", $orderData, $order);
  }

}
