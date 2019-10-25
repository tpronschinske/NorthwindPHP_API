<?php
namespace Controllers;

use Core\Controller;
use Core\View;
use \Helpers\Session;
use \Helpers\Url;


class InstallController extends Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){

      if(DB_NAME != ''){
        Url::redirect('');
      }

      View::renderTemplate('header');
      View::render('install/install');
      View::renderTemplate('footer');
    }

}
