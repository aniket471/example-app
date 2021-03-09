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

Route::middleware('auth:token')->get('/user',function(Request $request){
    return $request->user();
});

Route::middleware('auth:token')->group(function(){
 Route::post('insertUser','UserController@insertUser');
//Route::get('loginUser','UserController@loginUser');
Route::get('LoginUserByToken','UserController@LoginUserByToken');
});
//register the user and login user
Route::get('loginUser','UserController@loginUser');

//project details
Route::post('InsertProjectDetails','ProjectController@InsertProjectDetails');

//block details
Route::post('InsertProjectBlocks','ProjectBlocksController@InsertProjectBlocks');

//floor details
Route::post('InsertProjectFloor','ProjectFloorsController@InsertProjectFloor');

//project unit details
Route::post('InsertProjectUnits','ProjectUnitsController@InsertProjectUnits');

//project and block 
Route::get('ProjectAndBlockList','ProjectAndBlockController@ProjectAndBlockList');
Route::get('SelectProjectBlock','ProjectAndBlockController@SelectProjectBlock');
Route::get('getBlockDetails','ProjectAndBlockController@getBlockDetails');
Route::get('ProjectAndBlockListWith','ProjectAndBlockController@ProjectAndBlockListWith');
Route::get('getBlockDetailsByID','ProjectAndBlockController@getBlockDetailsByID');
Route::get('getAllUnitsById','ProjectAndBlockController@getAllUnitsById');

//check availabele or hold flats
Route::get('checkAvailableORHold','CheckAvailableHoldController@checkAvailableORHold');
