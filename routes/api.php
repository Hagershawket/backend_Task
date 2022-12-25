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

//********************************************** Category Routes *****************************************************
Route::apiResource('/categories', App\Http\Controllers\CategoryController::class);
//********************************************** Tags Routes *****************************************************
Route::apiResource('/tags', App\Http\Controllers\TagController::class);

//********************************************** Ads Routes *****************************************************
Route::get('/ads/show/{advertiserId}', [App\Http\Controllers\AdController::class,'showAds']);
Route::get('/ads/categories/filter/{categoryId}', [App\Http\Controllers\AdController::class,'filterByCategory']);
Route::get('/ads/tags/filter/{tagId}', [App\Http\Controllers\AdController::class,'filterByTag']);
