<?php

use App\Http\Controllers\apiLojaController;

use Illuminate\Support\Facades\Route;

//index
Route::get('apiLoja',[apiLojaController::class,"index"]);

//store
Route::post('apiLoja',[apiLojaController::class,"store"]);

//Update
Route::put('apiLoja/{id}',[apiLojaController::class,"update"]);

//Delete
Route::delete('apiLoja/{id}',[apiLojaController::class,"delete"]);
