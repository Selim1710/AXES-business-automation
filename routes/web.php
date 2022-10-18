<?php

use App\Http\Controllers\Backend\InventoryController;
use App\Http\Controllers\Backend\ProductSetupController;
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

        Route::get('/add-expenses-category',[DailyProcess::class,'addExpensesCategory'])->name('add-expenses-category');
        Route::get('/new-category',[DailyProcess::class,'saveCategory'])->name('new-category');
        Route::post('/add-expenses',[DailyProcess::class,'saveExpenses'])->name('add-expenses');
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

    // product setup
    Route::group(['prefix' => 'product-setup'], function () {

        // Category
        Route::get('/manage/category', [ProductSetupController::class, 'manageCategory'])->name('admin.manage.category');
        Route::post('/store/category', [ProductSetupController::class, 'storeCategory'])->name('admin.store.category');
        Route::get('/edit/category/{id}', [ProductSetupController::class, 'editCategory'])->name('admin.edit.category');
        Route::post('/update/category/{id}', [ProductSetupController::class, 'updateCategory'])->name('admin.update.category');
        Route::get('/delete/category/{id}', [ProductSetupController::class, 'deleteCategory'])->name('admin.delete.category');

        // Sub-Category
        Route::get('/manage/subCategory', [ProductSetupController::class, 'manageSubCategory'])->name('admin.manage.subCategory');
        Route::post('/store/subCategory', [ProductSetupController::class, 'storeSubCategory'])->name('admin.store.subCategory');
        Route::get('/edit/subCategory/{id}', [ProductSetupController::class, 'editSubCategory'])->name('admin.edit.subCategory');
        Route::post('/update/subCategory/{id}', [ProductSetupController::class, 'updateSubCategory'])->name('admin.update.subCategory');
        Route::get('/delete/subCategory/{id}', [ProductSetupController::class, 'deleteSubCategory'])->name('admin.delete.subCategory');

        // Product
        Route::get('/manage/product', [ProductSetupController::class, 'manageProduct'])->name('admin.manage.product');
        Route::post('/store/product', [ProductSetupController::class, 'storeProduct'])->name('admin.store.product');
        Route::get('/edit/product/{id}', [ProductSetupController::class, 'editProduct'])->name('admin.edit.product');
        Route::post('/update/product/{id}', [ProductSetupController::class, 'updateProduct'])->name('admin.update.product');
        Route::get('/delete/product/{id}', [ProductSetupController::class, 'deleteProduct'])->name('admin.delete.product');
        Route::get('/view/product/image/{id}', [ProductSetupController::class, 'viewProduct'])->name('admin.view.product');
        Route::post('/change/product/image/{id}', [ProductSetupController::class, 'changeProduct'])->name('admin.change.product.image');

        // Stock
        Route::get('/manage/stock', [ProductSetupController::class, 'manageStock'])->name('admin.manage.stock');
        Route::post('/store/stock', [ProductSetupController::class, 'storeStock'])->name('admin.store.stock');
        Route::get('/edit/stock/{id}', [ProductSetupController::class, 'editStock'])->name('admin.edit.stock');
        Route::post('/update/stock/{id}', [ProductSetupController::class, 'updateStock'])->name('admin.update.stock');
        Route::get('/delete/stock/{id}', [ProductSetupController::class, 'deleteStock'])->name('admin.delete.stock');
        
    });

    //user
    Route::resource('users', UserController::class);

    //Roles
    Route::resource('roles', RoleController::class);


});
