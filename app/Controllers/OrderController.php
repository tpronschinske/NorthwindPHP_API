<?php
namespace Controllers;

use Exception;
use Core\Controller;
use \Helpers\GateKeeper;
use \Helpers\Request;
use \Middleware\ResponseMiddleware;

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
      if(Request::isGet()){
        $orders = $this->$_order->getOrders();
        if (isset($orders)) {
          ResponseMiddleware::SuccessJsonResponse($orders);
        } else {
          throw new Exception('Orders Not Found Exception', 400);
        }
      } else {
        throw new Exception('Method Not Allowed Exception', 405);
      }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }

  public function getOrderDetailsById($id){
    try {
      if(Request::isGet()){
        $order = $this->$_order->getOrderDetailsById($id);
        if (isset($order)) {
          ResponseMiddleware::SuccessJsonResponse($order);
        } else {
          throw new Exception('Order Not Found Exception', 404);
        }
      } else {
        throw new Exception('Method Not Allowed Exception', 405);
      }

    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }

  public function getOrderById($id){
    try {
      if(Request::isGet()){
        $order = $this->$_order->getOrderById($id);
        if (isset($order) && count($order) > 0) {
           ResponseMiddleware::SuccessJsonResponse($order);
        } else {
           throw new Exception('Order Not Found Exception', 404);
        }
      } else {
        throw new Exception('Method Not Allowed Exception', 405);
      }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }

  public function updateOrder(){
    try {
      if(Request::isPost()){
        $data = json_decode(Request::Post());
        if(isset($data)){
          $order = $this->$_order->updateOrder($data->$id, $data);
          if (isset($order) && count($order) > 0) {
             ResponseMiddleware::SuccessJsonResponse($order, 'Order Id: ' . $data->$id . ' was updated successfully.');
          } else {
             throw new Exception('Order Not Found Exception', 404);
          }
        } else {
          throw new Exception('Bad Request', 400);
        }
      } else {
        throw new Exception('Method Not Allowed Exception', 405);
      }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }


}
