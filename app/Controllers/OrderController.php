<?php
namespace Controllers;

use Exception;
use Core\Controller;
use \Helpers\GateKeeper;
use \Middleware\ResponseMiddleware;
use \Interfaces\IOrderService;

class OrderController extends Controller
{

  private $_order;

  public function __construct()
  {
      parent::__construct();
      $this->$_order = new \Service\OrderService();
  }

  public function getOrders(){
    try {
          $orders = $this->$_order->getOrders();
          if (isset($orders)) {
            ResponseMiddleware::SuccessJsonResponse($orders);
          } else {
            throw new Exception('Orders Not Found Exception', 400);
          }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }

  public function getOrderDetailsById($id){
    try {
          $order = $this->$_order->getOrderDetailsById($id);
          if (isset($order)) {
            ResponseMiddleware::SuccessJsonResponse($order);
          } else {
            throw new Exception('Order Not Found Exception', 404);
          }

    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }

  public function getOrderById($id){
    try {
          $order = $this->$_order->getOrderById($id);
          if (isset($order) && count($order) > 0) {
             ResponseMiddleware::SuccessJsonResponse($order);
          } else {
             throw new Exception('Order Not Found Exception', 404);
          }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }


}
