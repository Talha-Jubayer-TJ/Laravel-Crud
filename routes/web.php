<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InformationController;
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

//Route::get('Information/index', [InformationController::class, 'index']);

//Route::get('Information/create-user',[InformationController::class, 'create']);

//Route::get('Information/store-post/{information}',[InformationController::class, 'store']);


Route::resource('Information', InformationController::class);

Route::get('Information/edit-post/{information}',[InformationController::class, 'edit']);

Route::put('/',[InformationController::class, 'update']);

Route::delete('Information/delete-post/{information}',[InformationController::class, 'destroy']);

Route::put('Information/update/{information}', [InformationController::class, 'update'])->name('Information.update');


