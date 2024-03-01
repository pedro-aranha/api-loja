<?php

use App\Http\Controllers\apiLojaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//index
Route::get('apiLoja',[apiLojaController::class,"index"]);

//store
Route::post('apiLoja',[apiLojaController::class,"store"]);
