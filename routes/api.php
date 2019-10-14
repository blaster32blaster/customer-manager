<?php

use Illuminate\Http\Request;

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

Route::resource('customer', \Api\CustomerController::class);

Route::resource('email', \Api\EmailController::class)->except('index', 'show');

Route::resource('address', \Api\AddressController::class)->except('index', 'show');

