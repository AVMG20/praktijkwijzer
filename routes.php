<?php
use Classes\Route;
use Controllers\IndexController;
use Controllers\ExampleController;
use Controllers\LoginController;

//index
Route::set('index.php' , function() {
    IndexController::index();
});
Route::set('index' , function() {
    IndexController::index();
});

//login
Route::set('login' , function() {
    LoginController::index();
});
Route::set('login@login' , function() {
    LoginController::login();
});
Route::set('register' , function() {
    LoginController::create();
});
Route::set('register@store' , function() {
    LoginController::store();
});


//everything beyond this is only available once the user is logged in
if (!\Classes\Auth::loggedIn()) return false;

//example
Route::set('example' , function() {
    ExampleController::index();
});
Route::set('example-create' , function() {
    ExampleController::create();
});
Route::set('example-edit' , function() {
    ExampleController::edit();
});
Route::set('example@store' , function() {
    ExampleController::store();
});
Route::set('example@update' , function() {
    ExampleController::update();
});
Route::set('example@destroy' , function() {
    ExampleController::destroy();
});
