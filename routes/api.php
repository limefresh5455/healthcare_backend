<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\RegistrationController;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\doctordetailapi;

// Public Routes

Route::group(['namespace' => 'Api'], function() {
    Route::get('/registrations','RegistrationController@index');
    Route::post('/register','UserController@register');
    Route::post('/login','UserController@login');
    Route::post('/doctor-add','doctordetailapi@doctorAdd');
    Route::get('/show','doctordetailapi@list');
    Route::put('/update/{id}','doctordetailapi@update');
    Route::delete('/delete/{id}','doctordetailapi@delete');
    Route::get('/search/{name}','doctordetailapi@search');
    Route::group(['middleware' => ['jwt.verify']], function () {
    Route::post('logout', 'UserController@logout');
     });
});



// Route::group([

//     'prefix' => 'auth'

// ], function () {

//     Route::post('login', 'AuthController@login');
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');

// });