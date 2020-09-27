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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/users/create', \App\Http\Livewire\User\Create::class)->name('users.create');
    Route::get('users/{id}/edit', \App\Http\Livewire\User\Edit::class)->name('users.edit');
    Route::get('/users', \App\Http\Livewire\User\Index::class)->name('users.index');

    Route::get('/categories/create', \App\Http\Livewire\Category\Create::class)->name('categories.create');
    Route::get('/categories/{id}/edit', \App\Http\Livewire\Category\Edit::class)->name('categories.edit');
    Route::get('categories', \App\Http\Livewire\Category\Index::class)->name('categories.index');


    Route::get('/products/create', \App\Http\Livewire\Product\Create::class)->name('products.create');
    Route::get('/products/{id}/edit', \App\Http\Livewire\Product\Edit::class)->name('products.edit');
    Route::get('products', \App\Http\Livewire\Product\Index::class)->name('products.index');
    Route::get('/products/{id}',\App\Http\Livewire\Product\View::class)->name('products.show');
});

