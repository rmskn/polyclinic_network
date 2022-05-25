<?php

use App\Http\Controllers\APITokenController;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
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

Route::post('/sanctum/token', [APITokenController::class, 'create_token']);

Route::middleware('auth:sanctum')->get('/products', function(Request $request) {
    dd(json_encode(['key1' => 'value1', 'key2' => 2, 'key3' => true], JSON_THROW_ON_ERROR));
    //dd($request->user());
});

Route::group(
    [
    ],
    function (Router $api) {
        $api->get(
            'test',
            \App\Http\Controllers\TestController::class . '@test'
        );

//        $api->get(
//            'cart',
//            CartController::class . '@getCartPage'
//        );

    }
);
