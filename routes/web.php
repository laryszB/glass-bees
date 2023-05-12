<?php

use App\Http\Controllers\ApiaryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Apiaries
Route::get('/', [ApiaryController::class, 'index']);

// Show create apiary form
Route::get('/apiaries/create', [ApiaryController::class, 'create']);

//Show edit apiary form
Route::get('/apiaries/{apiary}/edit', [ApiaryController::class, 'edit']);

//Update apiary
Route::put('/apiaries/{apiary}', [ApiaryController::class, 'update']);

//Delete apiary
Route::delete('/apiaries/{apiary}', [ApiaryController::class, 'destroy']);

// Store apiary data
Route::post('/apiaries', [ApiaryController::class, 'store']);

//Single apiary
Route::get('/apiaries/{apiary}', [ApiaryController::class, 'show']);



//Show register/create form
Route::get('/register', [UserController::class, 'create']);

//Create new user
Route::post('/users', [UserController::class, 'store']);


