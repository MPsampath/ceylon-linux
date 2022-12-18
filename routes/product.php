<?php

use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('Prodcthome',[ProductController::class,'home'])->name('product_home');
Route::get('ProdctCreate',[ProductController::class,'create'])->name('product_create');
Route::get('Prodctpreview',[ProductController::class,'preview'])->name('product_preview');
Route::get('ProdctEdit',[ProductController::class,'edit'])->name('product_edit');

Route::post('ProdctStore',[ProductController::class,'store'])->name('product_store');
Route::post('ProdctUpdate',[ProductController::class,'update'])->name('product_update');
