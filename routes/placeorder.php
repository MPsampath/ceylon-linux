<?php

use App\Http\Controllers\PlaceOrder\PlaceOrderController;
use Illuminate\Support\Facades\Route;
Route::get('/',[PlaceOrderController::class,'home']);

Route::get('PlcOrdrhome',[PlaceOrderController::class,'home'])->name('place_order_home');
Route::get('PlcOrdrCreate',[PlaceOrderController::class,'create'])->name('place_order_create');

