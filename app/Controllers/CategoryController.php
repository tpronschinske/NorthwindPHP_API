<?php

namespace Controllers;

use Exception;
use Core\Controller;
use \Middleware\ResponseMiddleware;

class CategoryController extends Controller
{

  private $_category;

  public function __construct()
  {
      parent::__construct();
      $this->$_category = new \Service\CategoryService();
  }


  public function getCategories(){
    try {
        $cats = $this->$_category->getCategories();
        if (isset($cats)) {
          ResponseMiddleware::SuccessJsonResponse($cats);
        } else {
          throw new Exception('Category Not Found Exception', 404);
        }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }

  public function getCategoryById($id){
    try {
        $cat = $this->$_category->getCategoryById($id);
        if (isset($cat) && count($cat) > 0) {
           ResponseMiddleware::SuccessJsonResponse($cat);
        } else {
           throw new Exception('Category Not Found Exception', 404);
        }
    } catch (Exception $e) {
        ResponseMiddleware::ErrorJsonResponse($e);
    }
  }


}
