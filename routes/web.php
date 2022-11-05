<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;


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

Route::get("/" , function() {
     if(Auth::check()) {
          return view("pages.Home");
     }

     return redirect("/login");
});


Route::get("/login" , [AuthController::class,  'loginView']);
Route::post("/login" , [AuthController::class,  'login']);

Route::get("/register" , [AuthController::class , "registerView"]);
Route::post("/register" , [AuthController::class, "register"]);