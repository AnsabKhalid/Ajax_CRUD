<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/save-User', [RegisterController::class, 'saveUser'])->name('saveUser');

Route::get('/login', [RegisterController::class, 'login']);

Route::post('/access_account', [RegisterController::class, 'access_account']);

Route::get('/dashboard', [RegisterController::class, 'clients']);

Route::get('delete/{id}', [RegisterController::class, 'delete']);

Route::get('editUser/{id}', [RegisterController::class, 'editUser']);

Route::post('/updateUser', [RegisterController::class, 'updateUser']);

