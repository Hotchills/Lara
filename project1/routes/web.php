<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Lara', 'LaraController@index')->name('Lara');
Route::get('/CreateLara', 'LaraController@createpage')->name('CreateLara');
Route::get('/FlorianDashboard', 'LaraController@onepage')->name('FlorianDashboard');

Route::get('/BookDevice', 'BookdeviceController@index');
Route::get('/CreateDevice', 'BookdeviceController@createpage')->name('CreateDevice');

Route::post('/CreateLara', ['uses'=> 'LaraController@store','as'=>'lara.store' ]);
Route::post('/UpdateLara', ['uses'=> 'LaraController@update','as'=>'lara.update' ]);
Route::post('/ExtendLara', ['uses'=> 'LaraController@extend','as'=>'lara.extend' ]);

Route::post('/StoreDevice', ['uses'=> 'BookdeviceController@store','as'=>'device.store' ]);
Route::post('/UpdateDevice', ['uses'=> 'BookdeviceController@update','as'=>'device.update' ]);


Route::delete('/DeleteLara' , ['uses'=>'LaraController@destroy','as'=>'lara.delete' ]);
Route::delete('/DeleteDevice' , ['uses'=>'BookdeviceController@destroy','as'=>'device.delete' ]);