<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WallController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;



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

Route::get('/delete-category/{category_id}', //url
    [\App\Http\Controllers\CategoryController::class, 'delete'] //nom de la methode
)->middleware(['auth'])->name('delete'); //Nom de la route (route('')

Route::post('/create-category',
    [\App\Http\Controllers\CategoryController::class, 'post']
)->middleware(['auth'])->name('create-category');

Route::post('/save-category',
    [\App\Http\Controllers\CategoryController::class, 'save']
)->middleware(['auth'])->name('save-category');

Route::get('/update/{category_id}',
    [\App\Http\Controllers\CategoryController::class, 'update']
)->middleware(['auth'])->name('update');

Route::post('/save',
    [\App\Http\Controllers\CategoryController::class, 'save']
)->middleware(['auth'])->name('save');


Route::get('/livres',
    [\App\Http\Controllers\BookController::class, 'index']
)->middleware(['auth'])->name('books');

Route::post('/livres',
    [\App\Http\Controllers\BookController::class, 'saveBook']
)->middleware(['auth'])->name('saveBook');

Route::get('/suppresion-livre/{book_id}',
    [\App\Http\Controllers\BookController::class, 'deleteBook']
)->middleware(['auth'])->name('deleteBook');

Route::get('/modification-livre/{book_id}',
    [\App\Http\Controllers\BookController::class, 'updateDisplayBook']
)->middleware(['auth'])->name('updateDisplayBook');

Route::post('/sauvegarde-livres',
    [\App\Http\Controllers\BookController::class, 'updateBook']
)->middleware(['auth'])->name('updateBook');



Route::get('/films',
    [FilmController::class, 'index']
)->middleware(['auth'])->name('films');



// USER

// CREATE USER
Route::post('/create-user',
    [UserController::class, 'createUser']
)->middleware(['auth'])->name('create-user');

Route::get('/create-user',
    [UserController::class, 'formUser']
)->middleware(['auth'])->name('create-user');

Route::post('/create-author',
    [UserController::class, 'createAuthor']
)->middleware(['auth'])->name('create-author');

Route::get('/create-author',
    [UserController::class, 'formAuthor']
)->middleware(['auth'])->name('create-author');


//LIST OF USERS

Route::get('/users',
    [UserController::class, 'showUsers']
)->middleware(['auth'])->name('users');

Route::get('/authors',
    [UserController::class, 'showAuthors']
)->middleware(['auth'])->name('authors');

//DELETE

Route::get('/delete-user/{user_id}', //url
    [UserController::class, 'deleteUser'] //nom de la methode
)->middleware(['auth'])->name('delete-user'); //Nom de la route (route('')

Route::get('/delete-author/{author_id}', //url
    [UserController::class, 'deleteAuthor'] //nom de la methode
)->middleware(['auth'])->name('delete-author'); //Nom de la route (route('')

//UPDATE USER

Route::post('/update-user/{user_id}',
    [UserController::class, 'updateUser']
)->middleware(['auth'])->name('update-user');

Route::get('/update-user/{user_id}',
    [UserController::class, 'formUserUpdate']
)->middleware(['auth'])->name('update-user');

Route::post('/update-author/{author_id}',
    [UserController::class, 'updateAuthor']
)->middleware(['auth'])->name('update-author');

Route::get('/update-author/{author_id}',
    [UserController::class, 'formAuthorUpdate']
)->middleware(['auth'])->name('update-author');


// ====================

Route::get('/wall',
    [WallController::class, 'index']
)->middleware(['auth'])->name('wall');

Route::post('/wall',
    [WallController::class, 'post']
)->middleware(['auth'])->name('post');

/*Route::get('/update/{post_id}',
    [WallController::class, 'update']
)->middleware(['auth'])->name('update');

Route::post('/save',
    [WallController::class, 'save']
)->middleware(['auth'])->name('save');
*/

/*Route::get('/delete/{post_id}', //url
    [WallController::class, 'delete'] //nom de la methode
)->middleware(['auth'])->name('delete'); //Nom de la route (route('')*/


// ------------------------

Route::get('/plop/{truc?}', function ($truc = null){
    return 'plop '. $truc;
})->middleware(['auth'])->name('plop');


//Affiche la page plip avec le contenu du get
Route::get('/plip/{truc?}',
    [WallController::class, 'plip']
)->middleware(['auth'])->name('plip');


Route::get('/',
    [BookController::class, 'displayBooks']
)->name('displayBooks');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/livre/{book_id}',
    [BookController::class, 'displayComments']
)->name('comment');

require __DIR__.'/auth.php';
