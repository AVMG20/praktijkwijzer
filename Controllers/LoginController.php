<?php

namespace Controllers;

use Classes\Auth;
use Classes\Controller;
use Classes\Redirect;
use Classes\Old;
use Models\UsersModel;

class LoginController extends Controller
{

    /**
     *
     */
    public static function index()
    {
        Auth::removeUser();
        return self::view('login/login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return self::view('login/register');
    }

    public function login(){
        $user = new UsersModel();
        //check if everything is set
        foreach ($_POST as $item) {
            if (!isset($item) || empty($item)) return Redirect::send('login' , ['danger' => 'Please fill in all inputs']);
        }

//      get user info
        $userinfo = $user->where("UPPER(username) = UPPER(:username)" , [":username" => $_POST['username']])[0];
        if (empty($userinfo)) return Redirect::send('login' , ['danger' => 'Login details incorrect!']);

//      check if password matches
        if (password_verify($_POST['password'] , $userinfo->password)) {
            Auth::setUser($userinfo->id);
            return Redirect::send('index' , ['success' => "Welcome {$userinfo->username}"]);
        }
        return Redirect::send('index' , ['danger' => 'Login details incorrect!']);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $user = new UsersModel();
//      check if everything is set
        foreach ($_POST as $item) {
            if (!isset($item) || empty($item)) return Redirect::send('register' , ['danger' => 'Please fill in all inputs']);
        }

//      Validate more stuff
        if (strlen($_POST['username']) < 3) return Redirect::send('register' , ['danger' => 'Username has to be atleast 3 char long']);
        if (strlen($_POST['password']) < 6) return Redirect::send('register' , ['danger' => 'Password has to be atleast 6 char long']);

//      encrypt password
        $encryptedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12]);

//      check if username or email are unique
        if(!empty($user->where("email = :email OR UPPER(username) = UPPER(:username)" , [
            ":email" => $_POST["email"],
            ":username" => $_POST["username"],
        ]))) return Redirect::send('register' , ['danger' => 'Email Or Username is already taken']);

//      create user
        $user->create([
            "username" => $_POST['username'],
            "email" => $_POST['email'],
            "password" => $encryptedPassword
        ]);

//      Setting auth and redirect
        $userinfo = $user->where("email = :email" , [":email" => $_POST['email']])[0];
        Auth::setUser($userinfo->id);
        return Redirect::send('index' , ['success' => "Welcome {$userinfo->username}"]);

    }
}