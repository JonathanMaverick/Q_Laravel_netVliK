<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Login Register
Route::middleware('guest')->group(function () {
    Route::get('/', [UserController::class, 'login_page'])->name('login_page');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::get('/register_page', [UserController::class, 'register_page'])->name('register_page');
    Route::post('/register', [UserController::class, 'register'])->name('register');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile/{id}', [UserController::class, 'profile_page'])->name('profile_page');
    Route::post('/update_profile', [UserController::class, 'update_profile'])->name('update_profile');
    Route::get('/update_profile_page/{id}', [UserController::class, 'update_profile_page'])->name('update_profile_page');

    Route::get('/home_page', [FilmController::class, 'home_page'])->name('home_page');
    Route::get('/favorite_page', [FilmController::class, 'favorite_page'])->name('favorite_page');

    Route::get('/search', [FilmController::class, 'search'])->name('search');
    Route::post('/film/{id}/favorite', [FilmController::class, 'addToFavorites'])->name('add-to-favorites');
    Route::post('/film/{id}/unfavorite', [FilmController::class, 'removeFromFavorites'])->name('remove-from-favorites');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/detail_film_page/{id}', [FilmController::class , 'detail_film_page'] )->name('detail_film_page');
});

Route::middleware('security')->group(function (){
    Route::get('/edit_film_page/{id}', [FilmController::class, 'edit_film_page'])->name('edit_film_page');
    Route::get('/insert_film_page', [FilmController::class, 'insert_film_page'])->name('insert_film_page');
    Route::post('/edit_film/{id}', [FilmController::class, 'edit_film'])->name('edit_film');
    Route::post('/insert_film', [FilmController::class, 'insert_film'])->name('insert_film');
    Route::delete('/delete_film/{id}', [FilmController::class, 'delete_film'])->name('delete_film');
});


