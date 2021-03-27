<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function(){

	Route::get('/users', [UsersController::class, 'index'])->name('users');
	Route::get('/users/create', [UsersController::class, 'create'])->name('createUser');
	Route::post('/users/store', [UsersController::class, 'store'])->name('storeUser');
	Route::get('/users/show/{id}', [UsersController::class, 'show'])->name('showUser');
	Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('editUser');
	Route::post('/users/update/{id}', [UsersController::class, 'update'])->name('updateUser');
	Route::get('/users/destroy/{id}', [UsersController::class, 'destroy'])->name('destroyUser');

	Route::get('/dashboard', function () {
	    return view('dashboard');
	})->name('dashboard');

});

require __DIR__.'/auth.php';
