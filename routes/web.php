<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::post('/store', [UserController::class, 'store'])->name('user.store');




Route::prefix('user/')->name('user.')->group(function(){
    

    Route::middleware('guest')->group(function(){
    });

    Route::middleware(['auth'])->group(function () {
    // Route::middleware(['auth', 'user-access:' . User::TYPE_USER])->group(function () {
        Route::get('dashbord', [UserController::class, 'home'])->name('home');
        Route::post('profile/update/{uuid}', [UserController::class, 'update'])->name('user.update');
        

    });
   

});
Route::prefix('admin/')->name('admin.')->group(function(){
    

    Route::middleware('guest')->group(function(){
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('dashbord', [AdminController::class, 'index'])->name('dashbord');
        

    });
   

});
