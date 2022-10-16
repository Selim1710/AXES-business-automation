<?php

use App\Http\Controllers\Backend\InventoryController;
use App\Http\Controllers\DailyProcess;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;


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
        // branch
        Route::get('/branch/table', [InventoryController::class, 'branchTable'])->name('inventory.branch.table');
        Route::post('/branch/add', [InventoryController::class, 'addBranch'])->name('inventory.branch.add');
        Route::get('/branch/edit/{id}', [InventoryController::class, 'editBranch'])->name('inventory.branch.edit');
        Route::post('/branch/update/{id}', [InventoryController::class, 'updateBranch'])->name('inventory.branch.update');
        Route::get('/branch/delete/{id}', [InventoryController::class, 'destroyBranch'])->name('inventory.branch.delete');
        
        // warehouse
        Route::get('/warhouse', [InventoryController::class, 'warehouseTable'])->name('inventory.warehouse.table');
        
    });

    //user
    Route::namespace('App\Http\Controllers\Backend')->group(function () {
        Route::resource('users', 'UserController');
    });

});
