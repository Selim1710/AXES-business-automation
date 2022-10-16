<?php

use App\Http\Controllers\Backend\InventoryController;
use App\Http\Controllers\DailyProcess;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\RoleController;


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

Route::group(['prefix' => 'backend'], function () {

    // daily process
    Route::group(['prefix' => 'daily-process'], function () {
        Route::get('/price-list', [DailyProcess::class, 'PriceList'])->name('price-list');
        Route::get('/expense-record', [DailyProcess::class, 'expenseRecord'])->name('expense-record');
        Route::get('/expenses-head', [DailyProcess::class, 'expensesHead'])->name('expenses-head');
        Route::get('/add-expenses-head', [DailyProcess::class, 'AddExpensesHead'])->name('add-expenses-head');
        Route::get('/priceblade', [DailyProcess::class, 'PriceList'])->name('priceblade');
    });

    // inventory
    Route::group(['prefix' => 'inventory'], function () {
        Route::get('/branch', [InventoryController::class, 'branch'])->name('backend.inventory.branch');
        Route::get('/warhouse', [InventoryController::class, 'warehouse'])->name('backend.inventory.warehouse');
        
    });

    //user
    Route::resource('users', UserController::class);

    //Roles
    Route::resource('roles', RoleController::class);


});
