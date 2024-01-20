<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
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


/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/

Route::redirect('/', 'home');
Route::get('/home', [HomeController::class, 'list'])->name('home');


Route::middleware(['guest'])->group(function () {
    Route::get('/register', [UserController::class, 'create'])->name('register');
    Route::post('/register/store', [UserController::class, 'store'])->name('register.store');
    
    Route::get('/login', function () {
        return view('login');
    })->name('login');
    
    Route::post('/login/auth', [LoginController::class, 'authenticate'])->name('login.auth');
});


Route::middleware(['isGameDev'])->group(function () {
    Route::get('/game-create', [GameController::class, 'create'])->name('game.create');
    Route::post('/game/store', [GameController::class, 'store'])->name('game.store');
});

Route::post('/game-search', [GameController::class, 'search'])->name('game.search');
Route::get('/game-list', [GameController::class, 'index'])->name('game.list');
Route::get('/game-details/{game}', [GameController::class, 'show'])->name('game.show');

Route::get('/comment', [CommentController::class, 'postComment'])->name('comment.postComment');
Route::get('/edit-comment', [CommentController::class, 'editComment'])->name('comment.editComment');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



require __DIR__.'/auth.php';
