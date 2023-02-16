<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/categories', [CategoryController::class, 'index'])
->name('categories.index');
Route::get('/ordered', [OrderController::class, 'index'])
->name('ordered.index');
Route::get('/products', [ProductController::class, 'index'])
->name('products.index');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])
    ->name('products.edit');
 Route::put('/products/{id}', [ProductController::class, 'update'])
    ->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])
    ->name('products.destroy');
    Route::get('/products/create', [ProductController::class, 'create'])
    ->name('products.create');

Route::post('/products', [ProductController::class, 'store'])
    ->name('products.store');
