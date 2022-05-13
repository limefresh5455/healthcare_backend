<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public Routes
    Route::group(['namespace' => 'Api'], function() {
    Route::get('/registrations','RegistrationController@index');
    Route::post('/register','UserController@register');
    Route::post('/login','UserController@login');
    Route::post('/image','UserController@image');
    Route::post('/getDataa','UserController@getData');
   // Route::put('/updateData/{id}','UserController@updateData'); 
    Route::group(['middleware' => ['jwt.verify']], function () {
    Route::post('/changepassword','UserController@change_password');
    Route::get('/doctor_details_mr/{id}','DoctorDetailController@getData');   
    Route::post('/updateData/{id}','UserController@updateData');    
    Route::post('/doctor-add','DoctorDetailController@doctorAdd');
    Route::get('/show','DoctorDetailController@list');
    Route::put('/update/{id}','DoctorDetailController@update');
    Route::delete('/delete/{id}','DoctorDetailController@delete');
    Route::get('/search/{name}','DoctorDetailController@search');
    Route::post('logout', 'UserController@logout');
    });
});