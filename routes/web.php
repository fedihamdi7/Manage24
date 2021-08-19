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


Route::get('home', 'HomeController@index')->name('home');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::resource('collab', 'admin\CollabController');
Route::resource('service', 'admin\ServiceController');
Route::resource('client', 'admin\ClientController');
Route::resource('mission', 'admin\MissionController');
Route::resource('time', 'admin\TimeController');
Route::resource('user', 'UserController');
Route::resource('grade', 'admin\GradeController');


Route::get('analytic-MG','admin\AnalyticController@MG')->name('analytic.MG');
Route::get('analytic-M','admin\AnalyticController@M')->name('analytic.M');
Route::get('analytic-C','admin\AnalyticController@C')->name('analytic.C');
Route::get('analytic-CD','admin\AnalyticController@CD')->name('analytic.CD');
Route::get('analytic-SL','admin\AnalyticController@SL')->name('analytic.SL');
Route::get('analytic-G','admin\AnalyticController@G')->name('analytic.G');
Route::POST('analytic-MG-search','admin\AnalyticController@MGsearch')->name('MG.search');
Route::POST('analytic-M-search','admin\AnalyticController@Msearch')->name('M.search');
Route::POST('analytic-C-search','admin\AnalyticController@Csearch')->name('C.search');
Route::POST('analytic-CD-search','admin\AnalyticController@CDsearch')->name('CD.search');
Route::POST('analytic-SL-search','admin\AnalyticController@SLsearch')->name('SL.search');
Route::POST('analytic-G-search','admin\AnalyticController@Gsearch')->name('G.search');

Route::get('pdf-MG/{s}/{f}','admin\AnalyticController@pdfMG')->name('pdf.MG');
Route::get('pdf-M/{s}/{f}/{m}','admin\AnalyticController@pdfM')->name('pdf.M');
Route::get('pdf-C/{s}/{f}/{c}','admin\AnalyticController@pdfC')->name('pdf.C');
Route::get('pdf-CD/{start}/{fini}/{col}/{miss}','admin\AnalyticController@pdfCD')->name('pdf.CD');
Route::get('pdf-SL/{s}/{f}/{serv}','admin\AnalyticController@pdfSL')->name('pdf.SL');
Route::get('pdf-G/{g}','admin\AnalyticController@pdfG')->name('pdf.G');


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
Route::get('pdf-profile','UserController@pdf')->name('profile.pdf');

Route::get('lo', function () {
    return view('auth.login');
});

Route::get('/forgot','admin\CollabController@password')->name('collab.password');
Route::post('/create_pwd/collab/confirm','admin\CollabController@Confirmpassword')->name('collab.confirmpassword');


Auth::routes();
