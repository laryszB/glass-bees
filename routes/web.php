<?php

use App\Http\Controllers\ApiaryController;
use App\Http\Controllers\BeehiveController;
use App\Http\Controllers\FeedingController;
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

//  *APIARIES*

//Apiaries
Route::get('/', [ApiaryController::class, 'index']);

// Show create apiary form
Route::get('/apiaries/create', [ApiaryController::class, 'create'])->middleware('auth')->name('apiaries_create');

// Manage apiaries
Route::get('/apiaries/manage', [ApiaryController::class, 'manage'])->middleware('auth');

//Show edit apiary form
Route::get('/apiaries/{apiary}/edit', [ApiaryController::class, 'edit'])->middleware('auth');

//Update apiary
Route::put('/apiaries/{apiary}', [ApiaryController::class, 'update'])->middleware('auth');

//Delete apiary
Route::delete('/apiaries/{apiary}', [ApiaryController::class, 'destroy'])->middleware('auth');

// Store apiary data
Route::post('/apiaries', [ApiaryController::class, 'store'])->middleware('auth');

//Single apiary
Route::get('/apiaries/{apiary}', [ApiaryController::class, 'show'])->middleware('auth');


//  *BEEHIVES*

//Beehives
Route::get('/apiaries/{apiary}/beehives', [BeehiveController::class, 'index'])->middleware('auth')->name('beehives_index');

// Store beehvie data
Route::post('/apiaries/{apiary}/beehives/store', [BeehiveController::class, 'store'])->middleware('auth')->name('beehives_store');

//Show create beehive form
Route::get('/apiaries/{apiary}/beehives/create', [BeehiveController::class, 'create'])->middleware('auth')->name('beehives_create');

//Show edit beehive form
Route::get('/apiaries/{apiary}/beehives/{beehive}/edit', [BeehiveController::class, 'edit'])->middleware('auth')->name('beehives_edit');

//Update beehive
Route::put('/apiaries/{apiary}/beehives/{beehive}', [BeehiveController::class, 'update'])->middleware('auth')->name('beehives_update');

//Delete beehive
Route::delete('/apiaries/{apiary}/beehives/{beehive}', [BeehiveController::class, 'destroy'])->middleware('auth')->name('beehives_delete');

// Manage beehives
Route::get('/beehives/manage', [BeehiveController::class, 'manage'])->middleware('auth')->name('beehives_manage');

//Single beehive
Route::get('/apiaries/{apiary}/beehives/{beehive}', [BeehiveController::class, 'show'])->middleware('auth')->name('beehives_show');


//Update beehive note
Route::put('/apiaries/{apiary}/beehives/{beehive}/note/update', [BeehiveController::class, 'updateNote'])->middleware('auth')->name('beehives_note_update');



// Show create feeding form
Route::get('/feedings', [FeedingController::class, 'create'])->middleware('auth')->name('feedings_create');

// Store feeding data
Route::post('/feedings/store', [FeedingController::class, 'store'])->middleware('auth')->name('feedings_store');

// View all feeding
Route::get('/feedings/list', [FeedingController::class, 'index'])->middleware('auth')->name('feedings_list');

// Delete feeding
Route::delete('/feedings/{beehive_id}/{food_id}/delete', [FeedingController::class, 'destroy'])->middleware('auth')->name('feedings_destroy');



//Show register/create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create new user
Route::post('/users', [UserController::class, 'store']);

//Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);




