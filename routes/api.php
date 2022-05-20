<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public Routes
    Route::group(['namespace' => 'Api'], function() {
    Route::get('/registrations','RegistrationController@index');
    Route::post('/register','UserController@register');
    Route::post('/login','UserController@login');
    Route::post('/image','UserController@image');
   // Route::get('/searchep/{name}','EpicJsonController@searchepic');
   
   // Route::put('/updateData/{id}','UserController@updateData'); 
    Route::group(['middleware' => ['jwt.verify']], function () {
       
        Route::post('/changepassword','UserController@change_password');
        Route::get('/doctor_details_mr/{id}','DoctorDetailController@getData');   
        Route::post('/updateData/{id}','UserController@updateData');    
        Route::post('/updateImage/{id}','UserController@updateImage');
        Route::post('/doctor-add','DoctorDetailController@doctorAdd');
        Route::get('/show','DoctorDetailController@list');
        Route::put('/update/{id}','DoctorDetailController@update');
        Route::delete('/delete/{reference_id}','DoctorDetailController@delete');
        Route::get('/listepic','EpicJsonController@listepic');
        Route::get('/searchepic/{name}','EpicJsonController@searchepic');
        Route::get('/getData','UserController@getData');
        Route::post('logout', 'UserController@logout');
    });
});