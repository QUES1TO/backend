<?php

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
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AdornoController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\PasswordResetLinkController;

Route::post('/user/login', [UserController::class, 'login']);
Route::post('/user/signUp', [UserController::class, 'signUp']);
Route::resource('product', ProductController::class);
Route::resource('categoria', CategoriaController::class);
//Route::get('/product/data', [ProductController::class, 'index']);
Route::resource('brand', BrandController::class);
Route::middleware('jwt')->group(function () {
    Route::get('/user/lista', [UserController::class, 'index']);
    Route::resource('adorno', AdornoController::class);
    Route::group(['middleware' => ['role:Admin|Seller']], function () {      
        Route::resource('cart', CartController::class); 
    });
    Route::group(['middleware' => ['role:Admin']], function () {      
        Route::resource('product', ProductController::class); 

        Route::post('/user/signUpSeller', [UserController::class, 'signUpSeller']); 
    });
});
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
