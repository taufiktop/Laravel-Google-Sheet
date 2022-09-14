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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('api')->group(function () {
    Route::post('/login', 'API\AuthController@login')->name('login');
    Route::middleware('jwt.verify')->group(function() {
        Route::get('/user-info', 'API\AuthController@me');
        Route::post('/logout', 'API\AuthController@logout');
        Route::get('/google-sheet/all', 'API\GoogleSheetApiController@index');
        Route::post('/google-sheet/store', 'API\GoogleSheetApiController@store');
        Route::post('/google-sheet/create', 'API\GoogleSheetApiController@create');
    });
    
    
});