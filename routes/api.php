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

Route::get('template', 'TemplateController@index');
Route::get('template/{id}', 'TemplateController@search');
Route::post('template', 'TemplateController@store');
Route::post('template/{id}', 'TemplateController@copy');
Route::put('template/{id}', 'TemplateController@update');
Route::delete('template/{id}', 'TemplateController@delete');

Route::get('message', 'MessageController@index');
Route::get('message/{id}', 'MessageController@search');
Route::post('message', 'MessageController@store');
Route::post('message/{id}', 'MessageController@copy');
Route::put('message/{id}', 'MessageController@update');
Route::delete('message/{id}', 'MessageController@delete');
