<?php

use App\Http\Controllers\APITokenController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PolyclinicController;
use App\Http\Controllers\UserController;
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

Route::post('/sanctum/token', [APITokenController::class, 'create_token']);

Route::group(['middleware' => 'auth:sanctum', 'namespace' => 'App\Http\Controllers'], function () {
    Route::name('polyclinic')
        ->prefix('polyclinic')
        ->group(function () {
            Route::get('getByCity', [PolyclinicController::class, 'getPolyclinicsByCity'])
                ->name('getByCity');
            Route::get('getDoctorsByPolyclinicId', [DoctorController::class, 'getDoctorsByPolyclinic'])
                ->name('getDoctorsByPolyclinicId');
        });

    Route::name('appointment')
        ->prefix('appointment')
        ->group(function () {
            Route::get('getAvailableTimeToAppointment', [AppointmentController::class, 'getAvailableTimeToAppointment'])
                ->name('getAvailableTimeToAppointment');
            Route::get('createAppointment', [AppointmentController::class, 'createAppointment'])
                ->name('createAppointment');
            Route::get('getHistoryOfAppointment', [AppointmentController::class, 'getHistoryOfAppointment'])
                ->name('getHistoryOfAppointment');
        });

    Route::name('user')
        ->prefix('user')
        ->group(function () {
            Route::get('getUserInfo', [UserController::class, 'getUserInfo'])
                ->name('getUserInfo');
            Route::post('updateUserInfo', [UserController::class, 'updateUserInfo'])
                ->name('updateUserInfo');
        });
});
