<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/experiment', array('as' => 'experiment', function() {
    return view('experiment');
 }));

 Route::get('/sample', array('as' => 'sample', function() {
    return view('sample');
 }));

 Route::get('/sample/create', 'CalculateController@store');

Route::get('ajax',function() {
    return view('sample');
 });
Route::post('/getmsg','CalculateController@index');