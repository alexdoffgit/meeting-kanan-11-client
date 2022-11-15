<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BatchImageUploadController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\RoomDetailController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\SortController;

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

Route::get('/', [RoomsController::class, 'index']);

Route::get('/register', [RegisterController::class, 'displayRegister']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/images/{id}', [BatchImageUploadController::class, 'store']);

Route::get('rooms/grid', [RoomsController::class, 'roomGridIndex']);
Route::get('rooms/list', [RoomsController::class, 'roomListIndex']);

Route::get('rooms/sort/all', [SortController::class, 'all']);
Route::get('rooms/sort/popular', [SortController::class, 'popular']);
Route::get('rooms/sort/latest', [SortController::class, 'latest']);


Route::get('room/{id}', [RoomDetailController::class, 'index']);
Route::post('room/{id}/comment', [RoomDetailController::class, 'postReview']);

Route::post('/search', [SearchController::class, 'homeSearch']);
Route::post('search/grid', [SearchController::class, 'gridSearch']);
Route::post('/search/list', [SearchController::class, 'listSearch']);

Route::get('/cart1', [CartController::class, 'indexCart1']);
Route::get('/cart2', [CartController::class, 'indexCart2']);
Route::get('/cart3', [CartController::class, 'indexCart3']);
Route::post('/cart/add', [CartController::class, 'addToCart'])->middleware('auth');
Route::delete('/cart/delete/{id}', [CartController::class, 'deleteCartItem']);

Route::get('/wishlist', [WishlistController::class, 'index']);
Route::post('/wishlist/add', [WishlistController::class, 'add'])->middleware('auth');
Route::post('/wishlist/delete', [WishlistController::class, 'delete']);

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('add-listing', [RoomController::class, 'createForm']);
    Route::post('add-listing', [RoomController::class, 'create']);
    Route::get('listings', [RoomController::class, 'listing'])->name('listings');
    Route::get('listing/{id}', [RoomController::class, 'viewlisting']);
});