<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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


Route::prefix('auth')->group(function () {
    Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
    Route::get('/users', [HomeController::class, 'index'])->name('home');
    
});

Route::prefix('setting')->group(function () {
    Route::get('/setting', [UserController::class, 'index'])->name('setting');
    Route::put('/setting-action', [UserController::class, 'updateProfile'])->name('profile.action');
    Route::get('/insert-setting', [UserController::class, 'insert'])->name('insert-user');
    Route::post('/insert-store',[UserController::class,'store'])->name('store.user');
    Route::get('/show-setting', [UserController::class, 'show'])->name('show-user');
    Route::get('/edit-user/{id}',[UserController::class,'edit'])->name('edit.user');   
    Route::put('/edit-user/{id}',[UserController::class,'update'])->name('update.user');
    Route::get('/delete-setting/{id}',[UserController::class, 'destroy'])->name('delete.user');
});

Route::prefix('fibonaci')->group(function () {
    Route::post('store-fibonaci', FibonnaciController::class)->name('fibonacci.store');
    
});
