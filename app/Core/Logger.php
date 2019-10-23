<?php
/**
 * Logger class - Custom errors.
 *
 * @author Cooney Creative - info@cooneycreative.us
 *
 * @version 1.0
 * @date March 12, 2019
 * @date updated March 12, 2019
 */
namespace Core;

use Helpers\PhpMailer\Mail;

/**
 * Record and email/display errors or a custom error message.
 */
class Logger
{
    /**
     * Determins if error should be displayed.
     *
     * @var bool
     */
    private static $printError = false;

    /**
     * Determins if error should be emailed to SITEEMAIL defined in app/Core/Config.php.
     *
     * @var bool
     */
    private static $emailError = false;

    /**
     * Clear the errorlog.
     *
     * @var bool
     */
    private static $clear = false;

    /**
     * Path to error file.
     *
     * @var bool
     */
    public static $errorFile = 'errorlog.html';

    /**
     * In the event of an error show this message.
     */
    public static function customErrorMsg($e)
    {
        echo $e;
        exit;
    }

    /**
     * Saved the exception and calls customer error function.
     *
     * @param exeption $e
     */
    public static function exceptionHandler($e)
    {
        self::newMessage($e);
        // self::customErrorMsg($e);

    }

    /**
     * Saves error message from exception.
     *
     * @param numeric $number  error number
     * @param string  $message the error
     * @param string  $file    file originated from
     * @param numeric $line    line number
     */
    public static function errorHandler($number, $message, $file, $line)
    {
        // $msg = "$message in $file on line $line";
        //
        // if (($number !== E_NOTICE) && ($number < 2048)) {
        //     self::errorMessage($msg);
        //     self::customErrorMsg();
        // }
        //
        // return 0;
    }

    /**
     * New exception.
     *
     * @param Throwable/Exception $exception
     * @param bool                $printError show error or not
     * @param bool                $clear      clear the errorlog
     * @param string              $errorFile  file to save to
     */
    public static function newMessage($exception)
    {
        $message = $exception->getMessage();
        $code = $exception->getCode();
        $file = $exception->getFile();
        $line = $exception->getLine();
        $trace = $exception->getTraceAsString();
        $trace = str_replace(DB_PASS, '********', $trace);
        $date = date('M d, Y G:iA');

        $logMessage = "<h3>Exception information:</h3>\n
           <p><strong>Date:</strong> {$date}</p>\n
           <p><strong>Message:</strong> {$message}</p>\n
           <p><strong>Code:</strong> {$code}</p>\n
           <p><strong>File:</strong> {$file}</p>\n
           <p><strong>Line:</strong> {$line}</p>\n
           <h3>Stack trace:</h3>\n
           <pre>{$trace}</pre>\n
           <hr />\n";

        if (is_file(self::$errorFile) === false) {
            file_put_contents(self::$errorFile, '');
        }

        if (self::$clear) {
            $f = fopen(self::$errorFile, 'r+');
            if ($f !== false) {
                ftruncate($f, 0);
                fclose($f);
            }
        }

        file_put_contents(self::$errorFile, $logMessage, FILE_APPEND);

        //send email
        self::sendEmail($logMessage);
        
        return $exception;
    }

    /**
     * Custom error.
     *
     * @param string $error      the error
     * @param bool   $printError display error
     * @param string $errorFile  file to save to
     */
    public static function errorMessage($error)
    {
        // $date = date('M d, Y G:iA');
        // $logMessage = "<p>Error on $date - $error</p>";
        //
        // if (is_file(self::$errorFile) === false) {
        //     file_put_contents(self::$errorFile, '');
        // }
        //
        // if (self::$clear) {
        //     $f = fopen(self::$errorFile, 'r+');
        //     if ($f !== false) {
        //         ftruncate($f, 0);
        //         fclose($f);
        //     }
        // } else {
        //     file_put_contents(self::$errorFile, $logMessage, FILE_APPEND);
        // }
        //
        // /* send email */
        // self::sendEmail($logMessage);
        //
        // if (self::$printError == true) {
        //     echo $logMessage;
        //     exit;
        // }

        return $error;
    }

    /**
     * Send Email upon error.
     *
     * @param string $message holds the error to send
     */
    public static function sendEmail($message)
    {
        if (self::$emailError == true) {
            $mail = new Mail();
            $mail->setFrom(SITEEMAIL);
            $mail->addAddress(SITEEMAIL);
            $mail->subject('New error on '.SITETITLE);
            $mail->body($message);
            $mail->send();
        }
    }
}
