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

// Auth::routes();


/* Customer Routings */
require __DIR__ .'/customer.php';

/* Product Routings */
require __DIR__ .'/product.php';

/* Free issues Routings */
require __DIR__ .'/freeissue.php';

/* Place Order Routings */
require __DIR__ .'/placeorder.php';
