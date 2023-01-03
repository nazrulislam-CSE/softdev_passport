<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\HomeController;

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

/* ============== Login Routes =================*/ 
Route::post('/login',[AuthController::class, 'Login']);

/* ============== Register Routes =================*/
Route::post('/register',[AuthController::class, 'Register']);

/* ============== User Index/Create Routes =================*/
Route::get('/user/view', [HomeController::class, 'index'])->name('user.index');
Route::post('/user/store', [HomeController::class, 'store'])->name('user.store');
Route::get('/profile/view',[HomeController::class, 'profileview'])->name('admin.profile');


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
