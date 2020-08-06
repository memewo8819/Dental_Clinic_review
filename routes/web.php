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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('clinics/show', 'GmapController@view');

Route::get('/', 'ClinicController@searchClinic');

Route::get('clinics/index_pref', 'ClinicController@index_pref')->name('clinics.index_pref');
Route::get('clinics/index_city', 'ClinicController@index_city')->name('clinics.index_city');
Route::resource('clinics', 'ClinicController', ['only' => ['create', 'store', 'show', 'edit', 'update']]);

// コメント関連
Route::resource('comments', 'CommentController', ['only' => ['store']]);



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
