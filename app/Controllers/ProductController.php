<?php

namespace Controllers;

use Exception;
use Core\Controller;
use \Middleware\ResponseMiddleware;

class ProductController extends Controller
{

  private $_product;

  public function __construct()
  {
      parent::__construct();
      $this->$_product = new \Service\ProductService();
  }


  public function getProducts(){
    try {
        $products = $this->$_product->getProducts();
        if (isset($products) && count($products) > 0) {
          ResponseMiddleware::SuccessJsonResponse($products);
        } else {
          throw new Exception('Products Not Found', 404);
        }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }

  public function getProductById($id){
    try {
        $product = $this->$_order->getProductById($id);
        if (isset($product) && count($product) > 0) {
           ResponseMiddleware::SuccessJsonResponse($product);
        } else {
           throw new Exception('Product Not Found Exception', 404);
        }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }


}
