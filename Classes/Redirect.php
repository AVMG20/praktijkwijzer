<?php
namespace Classes;

/**
 * Class Redirect
 * @package Classes
 */
class Redirect {

    /**
     * Redirects user to location and sets the flash message
     * Example $message: ["success" => "Good job!"]
     * the key will be used as class to allow you to style your different messages
     * @param $location
     * @param $message
     */
    public static function send($location , $message = array()){
        if (isset($_POST)) Old::setOld($_POST);
        $_SESSION['message'] = $message;
        $_SESSION['redirect'] = true;
        header("Location:" . $location);
    }

    /**
     * Get current route including folder were in (editable in config.php) and append stuff to it
     * example http://localhost/FOLDER/ANOTHERFOLDER/
     * @return string
     */
    public static function route($location = ""){
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . URLADDON . $location;
    }


    /**
     * Get full current route including paths. without get requests
     * example http://localhost/example
     * @return string
     */
    public static function getRoute(){
        $request_uri = explode('?' , $_SERVER['REQUEST_URI'])[0];
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]{$request_uri}";
    }

    /**
     * returns the stored flash message and removes it from the session
     * @return string
     */
    public static function getFlashMessage(){
        if (isset($_SESSION['message'])){

            $msg = $_SESSION['message'];
            unset($_SESSION['message']);

            return $msg;
        }
    }

    /**
     * Check if there is a flash message without removing it
     * @return bool
     */
    public static function checkFlashMessage(){
        if (isset($_SESSION['message'])) return true; else return false;
    }

}