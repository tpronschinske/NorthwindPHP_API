<?php

namespace Interfaces;

interface IOrderService {

  public function getOrders();
  public function getOrderById($id);
  public function getOrderDetailsById($id);

}
