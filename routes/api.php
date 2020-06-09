<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('api')->name('api.')->group(function (){
    Route::prefix('/movies')->group(function (){
        Route::get('/', 'MovieController@index')->name('movies');
        Route::post('/', 'MovieController@store')->name('movies');
    });

    Route::prefix('/actors')->group(function (){
        Route::get('/', 'ActorController@index')->name('actors');
        Route::post('/', 'ActorController@store')->name('actors');
    });

    Route::prefix('/directors')->group(function (){
        Route::get('/', 'DirectorController@index')->name('directors');
        Route::post('/', 'DirectorController@store')->name('directors');
    });

    Route::prefix('/ratings')->group(function (){
        Route::get('/', 'RatingController@index')->name('ratings');
        Route::post('/', 'RatingController@store')->name('ratings');
    });
});
