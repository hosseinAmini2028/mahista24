<?php

use App\Http\Controllers\Admin\AdminAuth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ItemCtrl;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Theme\HomeController;
use App\Http\Controllers\Theme\ItemCtrl as ThemeItemCtrl;
use App\Http\Controllers\Theme\OrderCtrl;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/pay', [PaymentController::class, 'index'])->name('pay');
Route::post('/callback', [PaymentController::class, 'callback'])->name('callback');

Route::get('/detail/{slug}',[ThemeItemCtrl::class,'show']);
Route::get('adminlogin',[AdminAuth::class,'index']);
Route::post('adminlogin',[AdminAuth::class,'login'])->name('admin.login');

Route::get('admin',[DashboardController::class,'index'])->name('admin.dashboard')->middleware('auth.admin');


Route::prefix('admin/items')->name('admin.items.')->middleware(['auth.admin'])->group(function(){
  Route::get('create',[ItemCtrl::class,'create'])->name('create');
  Route::get('/',[ItemCtrl::class,'index'])->name('index');
  Route::post('/',[ItemCtrl::class,'store'])->name('store');
});

Route::post('orders',[OrderCtrl::class,'store'])->name('order.create');
