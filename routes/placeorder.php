<?php

use App\Http\Controllers\PlaceOrder\PlaceOrderController;
use Illuminate\Support\Facades\Route;

Route::get('PlcOrdrhome',[PlaceOrderController::class,'home'])->name('place_order_home');
Route::get('PlcOrdrCreate',[PlaceOrderController::class,'create'])->name('place_order_create');
Route::get('PlcOrdrpreview',[PlaceOrderController::class,'preview'])->name('place_order_preview');
Route::get('PlcOrdrEdit',[PlaceOrderController::class,'edit'])->name('place_order_edit');

Route::post('PlcOrdrStore',[PlaceOrderController::class,'store'])->name('place_order_store');
Route::post('PlcOrdrUpdate',[PlaceOrderController::class,'update'])->name('place_order_update');
