<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
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

Route::get('/', function () {
    return view('home');
});

// Route::get('/contact', function () {
//     return view('contact');
// });

// Route::get('about', function () {
//     return view('about');
// });

// Calling the view file in the customer folder
//  Route::get('/customers', function () {
//     return view('customers.index');
//  });

// Route::get('/customers', function () {  // Passing array arg to view
//     $customers = ['Johnny','Ronny','Monny','Lionny','Pionny'];
//          return view ('customers.index',['customerlist'=>$customers]);
//              // Passing associative array to blade view
//      });

Route::view('/contact','contact');
Route::view('about','about');

// Route::get('customers',[CustomersController::class,'index']); // Basics of Restful controllers -- Not working Laravel 9 and above
Route::get('customers','App\Http\Controllers\CustomersController@index'); // Basics of Restful controllers

// Routing for inserting the record - Calls store() in CustomersController class
Route::post('customers',[CustomersController::class,'store']);
//Route::post('customers','App\Http\Controllers\CustomersController@store'); 




