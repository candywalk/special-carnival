<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index'])->name('item.index');
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::get('/item/edit/{item}', [App\Http\Controllers\ItemController::class, 'edit'])->name('item.edit');
    Route::put('/item/edit/{item}', [App\Http\Controllers\ItemController::class, 'update'])->name('item.update');
    Route::delete('/item{item}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('item.delete');
    
});
    Route::get('/type',[App\Http\Controllers\TypeController::class,'index'])->name('type.index');
    Route::post('/type/create',[App\Http\Controllers\TypeController::class,'create'])->name('type.create');
    Route::get('/type/edit/{type}', [App\Http\Controllers\TypeController::class, 'edit'])->name('type.edit');
    Route::put('/types/{type}', [App\Http\Controllers\TypeController::class, 'update'])->name('types.update');
    Route::delete('/type{type}', [App\Http\Controllers\TypeController::class, 'destroy'])->name('type.delete');