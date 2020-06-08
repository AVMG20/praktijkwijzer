<?php
namespace Controllers;
use Classes\Controller;
use Models\UsersModel;

class IndexController extends Controller{
    public static function index(){
        return self::view('index/index' , (new UsersModel)->all());
    }
}