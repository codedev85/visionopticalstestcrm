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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/find-customer',[\App\Http\Controllers\Api\CustomerCrm::class , 'findClient']);

Route::get('find-customer-by-id', [\App\Http\Controllers\Api\CustomerCrm::class , 'findCustomerByID']);

Route::get('/customers', [\App\Http\Controllers\Api\CustomerCrm::class , 'customers']);

Route::post('create-account' ,[\App\Http\Controllers\Api\CustomerCrm::class , 'createAccount']);


