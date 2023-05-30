<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemsController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/*
* Product API calls
*/

Route::resource('product', ProductController::class);
// Route::get('/product', [ProductController::class, 'index']);                // display product details
// Route::get('/product/{product}', [ProductController::class, 'show']);       // display specific product details
// Route::post('/product', [ProductController::class, 'store']);               // store product details
// Route::patch('/product/{product}', [ProductController::class, 'update']);   // update product details
// Route::delete('/product/{product}', [ProductController::class, 'destroy']); // delete product by id

/*
* End Product API calls
*/

/*
* Order API calls 
*/
Route::get('/orders', [OrderController::class, 'index']);                            // display order details
Route::get('/order/{order}', [OrderController::class, 'show']);                      // display specific order details
Route::post('/order', [OrderController::class, 'store']);                            // store order details
Route::patch('/order/{order}', [OrderController::class, 'update']);                  // update order details, data: customer_id
Route::patch('/order-item/{order_item}', [OrderItemsController::class, 'update']);   // update order item details, data: product_id, quantity, order_id

/*
* End Order API calls 
*/

/*
* Customer API calls 
*/
Route::get('/customers', [CustomerController::class, 'index']);                  // display customer details
Route::post('/customer', [CustomerController::class, 'store']);                  // store customer details
Route::patch('/customer/{customer}', [CustomerController::class, 'update']);     // update customer details
Route::delete('/customer/{customer}', [CustomerController::class, 'destroy']);   // delete customer by id
/*
* End Customer API calls
*/