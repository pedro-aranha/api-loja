<?php

use App\Http\Controllers\apiLojaController;
use App\Http\Controllers\productsController;

use Illuminate\Support\Facades\Route;

//index
Route::get('apiLoja',[apiLojaController::class,"index"]);

//Find specific
Route::get('apiLoja/findbyid/{sales_id}',[apiLojaController::class,"getSpecific"]);

//store
Route::post('apiLoja',[apiLojaController::class,"store"]);

//Update
Route::put('apiLoja',[apiLojaController::class,"update"]);

//Cancel a sale
Route::put('apiLoja/cancel/{sales_id}',[apiLojaController::class,"cancelSale"]);

//Delete
Route::delete('apiLoja/{sales_id}',[apiLojaController::class,"delete"]);

//Products Routes
//Index
Route::get('apiLoja/products',[apiLojaController::class,"getProducts"]);

