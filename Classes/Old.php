<?php

namespace Classes;

/**
 * Class Old
 * This class is used to store old form data to be used after validating the users input
 * simply echo the getOld in any form value and it does its thing :)
 * @package Classes
 */
class Old{

    /**
     * sets old values
     * @param array $array
     * @return bool
     */
    public static function setOld($array = array()){
        if (isset($array) && !empty($array)) $_SESSION['old'] = $array;
        return true;
    }

    /**
     * returns old form value $key = the input name
     * Destroys the old data after 1 use
     * @param $key
     * @return string
     */
    public static function getOld($key){
       if (isset($_SESSION['old'][$key])) {
           $old = $_SESSION['old'][$key];
           unset($_SESSION['old'][$key]);
           return $old;
       }
       else return "";
    }

    /**
     * Destroy the old data
     * @return bool
     */
    public static function destroyOld(){
        if (isset($_SESSION['old'])) unset($_SESSION['old']);
        return true;
    }

}