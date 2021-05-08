<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/freeze', function () {
    return view('freeze');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/');
});


Route::view('/register','register');
Route::view('/getpass','updatepassword');

Route::view('/productlist','productlist');



Route::post("orderplace",[ProductController::class,'orderPlace']);
Route::post("/productmanagement",[ProductController::class,'addProduct']);
Route::post("/updateorder/{id}",[ProductController::class,'updateOrder']);
Route::post("/updateproduct/{id}",[ProductController::class,'updateProduct']);



Route::post("/login",[UserController::class,'login']);
Route::post("/freeze",[UserController::class,'freezeUp']);
Route::post("/register",[UserController::class,'register']);
Route::post("/updatepassword",[UserController::class,'updatePassword']);
Route::post("/updateinfo/{id}",[UserController::class,'updateInfo']);
Route::post("/freezeaccount/{id}",[UserController::class,'freezeAccount']);








Route::get("usermanagement",[UserController::class,'userManagement']);
Route::get("myprofile",[UserController::class,'myProfile']);
Route::get("removeUser/{id}",[UserController::class,'removeUser']);
Route::get("removeorder/{id}",[ProductController::class,'removeOrder']);




Route::post("add_to_cart",[ProductController::class,'add_to_cart']);
Route::get("/",[ProductController::class,'index']);
Route::get("detail/{id}",[ProductController::class,'detail']);
Route::get("cartlist",[ProductController::class,'cartlist']);
Route::get("removecart/{id}",[ProductController::class,'removeCart']);

Route::get("checkout",[ProductController::class,'checkout']);
Route::get("ordernow",[ProductController::class,'confirmOrder']);

Route::get("orders",[ProductController::class,'getOrders']);
Route::get("removeProduct/{id}",[ProductController::class,'removeProduct']);
Route::get("productmanagement",[ProductController::class,'productManagement']);
Route::get("ordersmanagement",[ProductController::class,'ordersManagement']);
Route::get("/productlist",[ProductController::class,'productList']);











