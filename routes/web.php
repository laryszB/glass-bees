<?php

use App\Http\Controllers\ApiaryController;
use App\Models\Apiary;
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

// Store apiary data
Route::post('/apiaries', [ApiaryController::class, 'store']);

//Single apiary
Route::get('/apiaries/{apiary}', [ApiaryController::class, 'show']);


