<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', [AuthController::class, 'allUsers']);
Route::get('/login', [AuthController::class, 'login'])->name("login");
Route::get('/logout', [AuthController::class, 'logout'])->name("logout");
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get("/delete", [AuthController::class, "delete"])->name("delete");
Route::get("/edit", [AuthController::class, "edit"])->name("edit");

Route::post("/register-user", [AuthController::class, "registerUser"])->name("register-user");	
Route::post("/login-user", [AuthController::class, "loginUser"])->name("login-user");
Route::post("/edit-user", [AuthController::class, "editUser"])->name("edit-user");