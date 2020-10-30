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
Route::post('store-file', 'App\Http\Controllers\API\FileController@storeFile');
Route::post('store-image', 'App\Http\Controllers\API\FileController@storeImage');
Route::post('store-video', 'App\Http\Controllers\API\FileController@storeVideo');
Route::post('store-audio', 'App\Http\Controllers\API\FileController@storeAudio');
Route::post('store-other', 'App\Http\Controllers\API\FileController@storeOther');
