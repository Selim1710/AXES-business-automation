<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    return view('dashboard.index');
});


Route::get('/price-list',[\App\Http\Controllers\DailyProcess:: class,'PriceList'])->name('price-list');
Route::get('/expense-record',[\App\Http\Controllers\DailyProcess:: class,'expenseRecord'])->name('expense-record');
Route::get('/expenses-head',[\App\Http\Controllers\DailyProcess:: class,'expensesHead'])->name('expenses-head');
Route::get('/add-expenses-head',[\App\Http\Controllers\DailyProcess:: class,'AddExpensesHead'])->name('add-expenses-head');

Route::get('/priceblade',[\App\Http\Controllers\DailyProcess:: class,'PriceList'])->name('priceblade');
//
Route::namespace('App\Http\Controllers')->group(function(){

    Route::resource('users', 'UserController');
});
