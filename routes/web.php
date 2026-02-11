<?php

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

Route::get('/',[UserController::class, 'index'])->name('login');
Route::post('/', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// Route::middleware(['guest'])->group(function () {
//     Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
// });

Route::get('/dashboard', function () {
    return view('dashboard.index');
});
