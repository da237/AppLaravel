<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return redirect()->route('products.index');
});


route::resource('products',ProductController::class);

route::resource('categories',CategoryController::class);
