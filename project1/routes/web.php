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

Route::post('/CreateLara', ['uses'=> 'LaraController@store','as'=>'lara.store' ]);
Route::post('/UpdateLara', ['uses'=> 'LaraController@update','as'=>'lara.update' ]);
Route::delete('/DeleteLara' , ['uses'=>'LaraController@delete','as'=>'lara.delete' ]);