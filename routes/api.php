<?php

use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\DevCtrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('services')->controller(ServiceController::class)->name('services.')->group(function () {
    Route::get('index', 'index')->name('index');
});

Route::post('/test',[DevCtrl::class,'test']);