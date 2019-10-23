<?php
/**
 * Controller - base controller.
 *
 * @author Cooney Creative - info@cooneycreative.us
 *
 * @version 1.0
 * @date March 12, 2019
 * @date updated March 12, 2019
 */
namespace Core;

/**
 * Core controller, all other controllers extend this base controller.
 */
abstract class Controller
{
    /**
     * View variable to use the view class.
     *
     * @var string
     */
    public $view;

    /**
     * On run make an instance of the config class and view class.
     */
    public function __construct()
    {
        /* initialise the views object */
        $this->view = new View();
    }
}
