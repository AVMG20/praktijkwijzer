<?php

namespace Classes;

use Models\UsersModel;

/**
 * Class Auth
 * @package Classes
 */
class Auth
{
    /**
     * Returns the user or null
     * @return mixed|null
     */
    public static function user()
    {
        if (isset($_SESSION['userid']) && !empty($_SESSION['userid'])) {
            $user = (new UsersModel())->find($_SESSION['userid']);
            if (!empty($user)) return $user;
        }
        return null;
    }

    /**
     * Sets the current user
     * @param $id
     * @return bool
     */
    public static function setUser($id){
       if (!empty($id) && isset($id)) $_SESSION['userid'] = $id;
       return true;
    }

    /**
     * Logs off the user
     * @return bool
     */
    public static function removeUser(){
        if (isset($_SESSION['userid'])) unset($_SESSION['userid']);
        return true;
    }

    /**
     * Checks if the user is logged in
     * @return bool
     */
    public static function loggedIn()
    {
        $user = self::user();
        if (is_null($user) || empty($user)) return false; else return true;
    }

    /**
     * check if the user has enough permission
     * @param $lvl
     * @return bool
     */
    public static function hasPermision($lvl)
    {
        if (!self::loggedIn()) return false;
        if (self::user()->role < $lvl) return false; else return true;
    }

}