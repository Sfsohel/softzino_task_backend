<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\product\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', [AuthController::class, 'createUser'])->name('admin.register');
Route::post('/login', [AuthController::class, 'loginUser'])->name('admin.login');
// Route::apiResource('product',  ProductController::class)->middleware('auth:sanctum');
Route::get('/get-category', [ProductController::class, 'categories'])->name('admin.categories');
Route::apiResource('product',  ProductController::class);