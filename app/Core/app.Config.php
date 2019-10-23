<?php

/**
 * Config - an example for setting up system settings.
 * When you are done editing, rename this file to 'Config.php'.
 *
 * @author Travis Pronschinske - tpronschinske@cooneycreative.us
 * @author Edwin Hoksberg - info@edwinhoksberg.nl
 *
 * @version 2.2
 * @date June 27, 2014
 * @date updated Sept 19, 2015
 */
namespace Core;

use Helpers\Session;

/**
 * Configuration constants and options.
 */
class Config
{

    /**
     * Executed as soon as the framework runs.
     */
    public function __construct()
    {
        /*
         * Turn on output buffering.
         */
        ob_start();
        /*
         * Define relative base path.
         */
        define('DIR', '/');
        /*
         * Define site url.
         */
        define('URL', '/');
        /*
         * Set default controller and method for legacy calls.
         */
        define('DEFAULT_CONTROLLER', 'main');
        define('DEFAULT_METHOD', 'index');

        /*
         * Set the default template.
         */
        define('TEMPLATE', 'default');

        /*
         * Set a default language.
         */
        define('LANGUAGE_CODE', 'en');

        /*
         * Database engine default is mysql.
         */
        define('DB_TYPE', 'mysql');

        /*
         * Database host default is localhost.
         * 198.71.236.40
         */
        define('DB_HOST', 'localhost');

        /*
         * Database name.
         */
        define('DB_NAME', '');

        /*
         * Database username.
         */
        define('DB_USER', '');

        /*
         * Database password.
         */
        define('DB_PASS', '');

        /*
         * PREFER to be used in database calls default is smvc_
         */
        define('PREFIX', '');

        /*
         * Set prefix for sessions.
         */
        define('SESSION_PREFIX', 'isla');

        /*
         * Optional create a constant for the name of the site.
         */
        define('SITETITLE', 'Isla Framework - Cooney Creative');

        /*
         * Optional set a site email address.
         */
        define('SITEEMAIL', 'info@cooneycreative.us');

        /*
         * Turn on custom error handling.
         */
        set_exception_handler('Core\Logger::ExceptionHandler');
        set_error_handler('Core\Logger::ErrorHandler');

        /*
         * Set timezone.
         */
        date_default_timezone_set('America/Chicago');

        /*
         * Start sessions.
         */
        Session::init();
    }
}