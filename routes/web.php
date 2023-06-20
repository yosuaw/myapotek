<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// Client Home
Route::get('/', 'HomeController@index')->name('home');

// Catalog
Route::get('/catalogs', 'MedicineController@catalog')->name('catalogs');
Route::get('/catalogDetail/{id}', 'MedicineController@catalogDetail')->name('catalogDetail');

// Authentication
Auth::routes();

Route::middleware(['auth'])->group(function(){
    // Categories
    Route::resource("categories","CategoryController");
    Route::post("categories/getEditForm/","CategoryController@getEditForm")->name('categories.getEditForm');
    Route::post("categories/deleteData/","CategoryController@deleteData")->name('categories.deleteData');
    Route::get('category-deleted', 'CategoryController@deleted')->name('categories.listDeleted');
    Route::get('category-restored/{id}', 'CategoryController@restore');
    Route::post("category/saveData", "CategoryController@saveData")->name("categories.saveData");

    // Medicines
    Route::resource('medicines', 'MedicineController');
    Route::post("medicines/getEditForm/","MedicineController@getEditForm")->name('medicines.getEditForm');
    Route::post('medicines/changeImage', 'MedicineController@changeImage')->name('medicines.changeImage');
    Route::post("medicines/deleteData/","MedicineController@deleteData")->name('medicines.deleteData');
    Route::post("medicines/saveData", "MedicineController@saveData")->name("medicines.saveData");
    // Route::get('medicine-deleted', 'MedicineController@deleted')->name('medicines.listDeleted');
    // Route::get('medicine-restored/{id}', 'MedicineController@restore');

    // Users
    Route::resource('users', 'UserController');
    Route::post("users/getEditForm/","UserController@getEditForm")->name('users.getEditForm');
    Route::post("users/deleteData/","UserController@deleteData")->name('users.deleteData');
    Route::post("users/saveData", "UserController@saveData")->name("users.saveData");

    // Report
    Route::get('reports/topFiveBestSeller', 'TransactionController@topFiveBestSeller')->name('reports.topFiveBestSeller');
    Route::get('reports/topThreeCustomer', 'TransactionController@topThreeCustomer')->name('reports.topThreeCustomer');

    // Transaction
    Route::resource('transactions', 'TransactionController');
    Route::post('transactions/showDetailAjax/', 'TransactionController@showDetail')->name('transactions.showDetail');

    // Cart
    Route::get('carts', 'MedicineController@cart')->name('carts');
    Route::get('add-to-cart/{id}', 'MedicineController@addToCart')->name('addToCart');
    Route::post('remove-from-cart', 'MedicineController@removeFromCart')->name('removeFromCart');
    Route::get('/checkouts', 'TransactionController@checkout')->name('checkouts');
    Route::get('thankyou', 'HomeController@thanks')->name('thankyou');

    // User Front-end
    Route::get('history', 'TransactionController@historyTransaction')->name("historyTransaction");
    Route::post('transactions/showDetailTransactionUser/', 'TransactionController@showDetailTransactionUser')->name('transactions.showDetailTransactionUser');
});