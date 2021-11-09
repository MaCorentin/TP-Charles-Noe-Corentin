<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [\App\Http\Controllers\CategorieController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::post('/categoriecreate', [\App\Http\Controllers\CategorieController::class, 'store'])->name("categoriecreate");

Route::post('/articlecreate', [\App\Http\Controllers\ArticlesController::class, 'store'])->name("articlecreate");

Route::post('/commentairecreate', [\App\Http\Controllers\CommentaireController::class, 'store'])->name("commentairecreate");
Route::post('/notecreate', [\App\Http\Controllers\NoteController::class, 'store'])->name("notecreate");
Route::post('/article', [\App\Http\Controllers\commentaireController::class, 'store'])->name("notecreate");


Route::get("/categorie/{id}", [\App\Http\Controllers\ArticlesController::class, "index"])->name("articles");

Route::get('/categorie/{id}', [\App\Http\Controllers\CategorieController::class, 'getone'])->name("selectCategorie");
Route::get('/article/{id}', [\App\Http\Controllers\ArticlesController::class, 'getone'])->name("selectArticle");
require __DIR__.'/auth.php';
