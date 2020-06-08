<?php
namespace Classes;

class Route {
   public static $validRoutes = array();
   public static $availableRouteFound = false;

    /**
     * @param $route
     * @param $function
     */
    public static function set($route , $function){
       self::$validRoutes[] = $route;

       if (!isset($_GET['url'])) $_GET['url'] = "index.php";

//     Execute function
       if ($_GET['url'] == $route) {
           self::$availableRouteFound = true;
           $function->__invoke();
       }
   }
}
