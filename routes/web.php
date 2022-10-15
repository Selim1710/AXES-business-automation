<?php

use App\Http\Controllers\DailyProcess;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
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


Route::get('/price-list',[DailyProcess:: class,'PriceList'])->name('price-list');
Route::get('/expense-record',[DailyProcess:: class,'expenseRecord'])->name('expense-record');
Route::get('/expenses-head',[DailyProcess:: class,'expensesHead'])->name('expenses-head');
Route::get('/add-expenses-head',[DailyProcess:: class,'AddExpensesHead'])->name('add-expenses-head');

Route::get('/priceblade',[DailyProcess:: class,'PriceList'])->name('priceblade');
//
Route::namespace('App\Http\Controllers\Backend')->group(function(){

    Route::resource('users', 'UserController');
});
