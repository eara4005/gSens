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

Auth::routes(['verify' => true]);
Route::get('/', function () {
    return redirect('/home');
});
Route::get('/home','CalcController@getCalc')->name('calc');
Route::post('/store','CalcController@store')->name('store');
Route::get('/setting','CalcController@showSetting')->name('setting');
