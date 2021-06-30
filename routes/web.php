<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WallController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\UserController;

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
Route::get('/category',
    [\App\Http\Controllers\CategoryController::class, 'index']
)->middleware(['auth'])->name('category');



Route::get('/films',
    [FilmController::class, 'index']
)->middleware(['auth'])->name('films');



// USER

Route::post('/create-user',
    [UserController::class, 'createUser']
)->middleware(['auth'])->name('create-user');

Route::get('/create-user',
    [UserController::class, 'formUser']
)->middleware(['auth'])->name('create-user');


Route::get('/users',
    [UserController::class, 'showUsers']
)->middleware(['auth'])->name('users');


Route::get('/delete/{user_id}', //url
    [UserController::class, 'deleteUser'] //nom de la methode
)->middleware(['auth'])->name('delete'); //Nom de la route (route('')


// ====================

Route::get('/wall',
    [WallController::class, 'index']
)->middleware(['auth'])->name('wall');

Route::post('/wall',
    [WallController::class, 'post']
)->middleware(['auth'])->name('post');

Route::get('/update/{post_id}',
    [WallController::class, 'update']
)->middleware(['auth'])->name('update');

Route::post('/save',
    [WallController::class, 'save']
)->middleware(['auth'])->name('save');


Route::get('/delete/{post_id}', //url
    [WallController::class, 'delete'] //nom de la methode
)->middleware(['auth'])->name('delete'); //Nom de la route (route('')


// ------------------------

Route::get('/plop/{truc?}', function ($truc = null){
    return 'plop '. $truc;
})->middleware(['auth'])->name('plop');


//Affiche la page plip avec le contenu du get
Route::get('/plip/{truc?}',
    [WallController::class, 'plip']
)->middleware(['auth'])->name('plip');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
