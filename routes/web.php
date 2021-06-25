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
    return view('/form/index');
});

Route::prefix('continuous_transition')->group(function () {
    Route::get('/',                           'ContinuousTransitionController@index')   ->name('continuous_transition.index');
    Route::match(['get', 'post'], 'confirm',  'ContinuousTransitionController@confirm') ->name('continuous_transition.confirm');
    Route::match(['get', 'post'], 'password', 'ContinuousTransitionController@password')->name('continuous_transition.password');
    Route::post('store',                      'ContinuousTransitionController@store')   ->name('continuous_transition.store');
    Route::get('complete',                    'ContinuousTransitionController@complete')->name('continuous_transition.complete');
});

// Route::get('/','HomeController@index');
// Route::match(['get', 'post'], '/form/conf', 'HomeController@conf');
// Route::match(['get','post'], '/form/password', 'HomeController@password');
// Route::post('/form/complete', 'HomeController@complete_post');
