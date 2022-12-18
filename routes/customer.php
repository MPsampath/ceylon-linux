<?php

use App\Http\Controllers\Customer\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('Custhome',[CustomerController::class,'home'])->name('cutomer_home');
Route::get('CustCreate',[CustomerController::class,'create'])->name('cutomer_create');
Route::get('Custpreview',[CustomerController::class,'preview'])->name('cutomer_preview');
Route::get('CustEdit',[CustomerController::class,'edit'])->name('cutomer_edit');

Route::post('CustStore',[CustomerController::class,'store'])->name('cutomer_store');
Route::post('CustUpdate',[CustomerController::class,'update'])->name('cutomer_update');
