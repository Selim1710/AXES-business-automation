<?php

use App\Http\Controllers\Backend\InventoryController;
use App\Http\Controllers\DailyProcess;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\RoleController;


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
        Route::get('/warehouse/table', [InventoryController::class, 'warehouseTable'])->name('inventory.warehouse.table');
        Route::post('/warehouse/add', [InventoryController::class, 'addWarehouse'])->name('inventory.warehouse.add');
        Route::get('/warehouse/edit/{id}', [InventoryController::class, 'editWarehouse'])->name('inventory.warehouse.edit');
        Route::post('/warehouse/update/{id}', [InventoryController::class, 'updateWarehouse'])->name('inventory.warehouse.update');
        Route::get('/warehouse/delete/{id}', [InventoryController::class, 'destroyWarehouse'])->name('inventory.warehouse.delete');
        
    });

    //user
    Route::resource('users', UserController::class);

    //Roles
    Route::resource('roles', RoleController::class);


});
