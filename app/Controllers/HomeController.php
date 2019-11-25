<?php

namespace Controllers;

use Core\Controller;
use Core\View;
use \Helpers\Session;
use \Helpers\Url;

class HomeController extends Controller
{
    /**
     * Call the parent construct.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['pageId'] = 'Home';
        $data['title'] = 'Home';
        View::renderTemplate('header');
        View::render('home/home');
        View::renderTemplate('footer');
    }

}
