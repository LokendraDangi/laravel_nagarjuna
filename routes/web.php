<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/backend')->name('backend.')->group(function(){
   //routes for tag
    Route::delete('tag/force-delete/{id}',[TagController::class,'forceDelete'])->name('tag.force_delete');
    Route::put('/tag/restore/{id}',[TagController::class,'restore'])->name('tag.restore');
    Route::get('/tag/trash',[TagController::class,'trash'])->name('tag.trash');
    Route::resource('tag', TagController::class);

    //routes for attribute
    Route::delete('/attribute/force-delete/{id}',[AttributeController::class,'forceDelete'])->name('attribute.force_delete');
    Route::put('/attribute/restore/{id}',[AttributeController::class,'restore'])->name('attribute.restore');
    Route::get('/attribute/trash',[AttributeController::class,'trash'])->name('attribute.trash');
    Route::resource('attribute', AttributeController::class);


    //routes for category
    Route::delete('category/force-delete/{id}',[CategoryController::class,'forceDelete'])->name('category.force_delete');
    Route::put('/category/restore/{id}',[CategoryController::class,'restore'])->name('category.restore');
    Route::get('/category/trash',[CategoryController::class,'trash'])->name('category.trash');
    Route::resource('category', CategoryController::class);

    //routes for subcategory
    Route::delete('subcategory/force-delete/{id}',[SubcategoryController::class,'forceDelete'])->name('subcategory.force_delete');
    Route::put('/subcategory/restore/{id}',[SubcategoryController::class,'restore'])->name('subcategory.restore');
    Route::get('/subcategory/trash',[SubcategoryController::class,'trash'])->name('subcategory.trash');
    Route::resource('subcategory', SubcategoryController::class);

    //products
    Route::get('product/ajax/product/deleteattribute',[ProductController::class,'deleteProductattribute'])->name('ajax.product.deleteProductattribute');
    Route::get('product/ajax/product/deleteImage',[ProductController::class,'deleteProductImage'])->name('ajax.product.deleteProductImage');
    Route::delete('product/force-delete/{id}',[ProductController::class,'forceDelete'])->name('product.force_delete');
    Route::put('product/restore/{id}',[ProductController::class,'restore'])->name('product.restore');
    Route::get('product/trash',[ProductController::class,'trash'])->name('product.trash');
    Route::resource('product',ProductController::class);
});