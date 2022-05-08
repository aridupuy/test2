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
Route::get("/zipcode", 'App\Http\Controllers\zipcodeController@selectAll');
Route::get("/zipcode/{id}", 'App\Http\Controllers\zipcodeController@selectzipcode');
//Route::get("v1/item/incrementarView/{id}", 'MobulSwapMeet\ItemsController@incrementar_view')->middleware('MobulSwapMeet');
Route::get("/", function(){
    var_dump("aca");
    
});

