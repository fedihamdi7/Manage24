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

use App\Http\Controllers\admin\MissionController;
use App\Mission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade as PDF;

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
Route::resource('grade', 'admin\GradeController');

Route::get('/reg', function () {
    return view('welcome');
});

Route::get('pdf-mission','admin\MissionController@pdf')->name('mission.pdf');
Route::get('pdf-time','admin\TimeController@pdf')->name('time.pdf');
Route::get('pdf-collablist','admin\CollabController@pdf')->name('collab.pdf');
Route::get('pdf-collab/{collab}','admin\CollabController@pdfOne')->name('onecollab.pdf');
Route::get('pdf-service','admin\ServiceController@pdf')->name('service.pdf');
Route::get('pdf-client','admin\ClientController@pdf')->name('client.pdf');
Route::get('pdf-grade','admin\GradeController@pdf')->name('grade.pdf');

Route::get('lo', function () {
return view('auth.login');
});

