<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/register', [RegisterController::class, 'displayRegister']);

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::prefix('admin')->group(function () {
    Route::get('add-listing', [RoomController::class, 'createForm']);
    Route::get('listings', function() { return view('admin.listings'); });
    // Route::prefix('user')->group(function () {
    //     Route::get('create', [UserController::class, 'createForm'])->name('admin.user.create.get');
    //     Route::post('create', [UserController::class, 'create'])->name('admin.user.create.post');
    // });
    // Route::prefix('room')->group(function () {
    //     Route::get('create', [RoomController::class, 'createForm'])->name('admin.room.create.get');
    //     Route::post('create', [RoomController::class, 'create']);
    // });
});