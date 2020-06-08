<?php
use Classes\Route;
use Controllers\IndexController;
use Controllers\ComplaintsController;
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

//complaints public
Route::set('complaint-create' , function() {
    ComplaintsController::create();
});
Route::set('complaint@store' , function() {
    ComplaintsController::store();
});


//everything beyond this is only available once the user is logged in
if (!\Classes\Auth::loggedIn()) return false;


if(\Classes\Auth::hasPermision(10)) {
    //complaints
    Route::set('complaint' , function() {
        ComplaintsController::index();
    });
    Route::set('complaint-edit' , function() {
        ComplaintsController::edit();
    });
    Route::set('complaint-show' , function() {
        ComplaintsController::show();
    });
    Route::set('complaint@update' , function() {
        ComplaintsController::update();
    });
    Route::set('complaint@solve' , function() {
        ComplaintsController::solve();
    });

    Route::set('complaint@destroy' , function() {
        ComplaintsController::destroy();
    });
}

