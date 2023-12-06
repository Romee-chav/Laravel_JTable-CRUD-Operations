<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/show', [App\Http\Controllers\HomeController::class, 'show_view'])->name('view');
Route::post('/list', [App\Http\Controllers\HomeController::class, 'list'])->name('listing');
Route::post('/insert',[App\Http\Controllers\HomeController::class, 'insert'])->name('insert');
Route::post('/update',[App\Http\Controllers\HomeController::class, 'update'])->name('update');
Route::post('/delete',[App\Http\Controllers\HomeController::class, 'destroy'])->name('delete');