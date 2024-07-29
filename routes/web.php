<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\Auth;
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

Route::middleware([Auth::class])->group(function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::prefix('dashboard')->group(function(){
        Route::get('/',function(){
            return view('dashboard.index');
        })->name('dashboard');
        // Route::get('/profile',[DashboardController::class,'editUser'])->name('user.edit');
        // Route::put('/profile',[DashboardController::class,'updateUser'])->name('user.update');
    });
});


Route::get('/login',[LoginController::class,'index'])->name('login.view');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
