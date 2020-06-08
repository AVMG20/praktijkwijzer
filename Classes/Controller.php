<?php
namespace Classes;

class Controller extends Database {
    /**
     * Render page from views folder
     * @param $view
     */
    public static function view($view , $data = null) {
        if (!isset($_SESSION['redirect'])) Old::destroyOld(); else unset($_SESSION['redirect']);
        require_once "./views/layout.php";
    }
}