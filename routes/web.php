<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\MoneyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('componants.home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/',function(){
    return view('componants.home');
})->name('home');

Route::group([
    'middleware' => 'auth'
],function(){
    Route::get('/account',[AccountController::class,'account'])->name('account');
    Route::get('/editOrder/{id}',[OrderController::class,'editOrder'])->name('editOrder');
    Route::post('/updateOrder',[OrderController::class,'updateOrder'])->name('updateOrder');
    
    Route::get('/editTransMoney/{id}',[MoneyController::class,'editTransMoney'])->name('editTransMoney');
    Route::post('/updateTransMoney',[MoneyController::class,'updateTransMoney'])->name('updateTransMoney');
});



Route::post('/treebox/money',[TestController::class,'money_trans'])->name('money');