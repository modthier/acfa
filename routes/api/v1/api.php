<?php

use App\Http\Controllers\api\v1\BrandAPIController;
use App\Http\Controllers\api\v1\CartAPIController;
use App\Http\Controllers\api\v1\CategoryAPIController;
use App\Http\Controllers\api\v1\ColorAPIController;
use App\Http\Controllers\api\v1\ProductAPIController;
use App\Http\Controllers\api\v1\UserAPIController;
use App\Http\Controllers\api\v1\OrderAPIController;
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











