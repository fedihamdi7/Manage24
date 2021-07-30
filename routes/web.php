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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('collab', 'admin\CollabController');
Route::resource('service', 'admin\ServiceController');
Route::resource('client', 'admin\ClientController');
Route::resource('mission', 'admin\MissionController');
Route::resource('time', 'admin\TimeController');
Route::resource('user', 'UserController');

Route::get('/reg', function () {
    return view('welcome');
});
