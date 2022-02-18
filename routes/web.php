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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);
Route::get('/categories', [App\Http\Controllers\WelcomeController::class, 'list']);
Route::post('/categories_add', [App\Http\Controllers\WelcomeController::class, 'add']);
Route::get('/category_edit/{id}', [App\Http\Controllers\WelcomeController::class, 'edit']);
Route::post('/category_update/{id}', [App\Http\Controllers\WelcomeController::class, 'update']);
Route::get('/category_delete/{id}', [App\Http\Controllers\WelcomeController::class, 'delete']);
//Route::match(['get', 'post'],'/categories' [App\Http\Controllers\WelcomeController::class, 'list']);

Route::get('/category/{slug}', [App\Http\Controllers\PostController::class, 'category']);
//Add posts
Route::get('/add_post', [App\Http\Controllers\HomeController::class, 'add']);
Route::post('/store_post', [App\Http\Controllers\HomeController::class, 'store']);
Route::get('/edit_post/{id}', [App\Http\Controllers\HomeController::class, 'edit']);
Route::post('/update_post/{id}', [App\Http\Controllers\HomeController::class, 'update']);
Route::get('/delete_post/{id}', [App\Http\Controllers\HomeController::class, 'delete']);

//Read More button route
Route::get('/blog_post/{id}', [App\Http\Controllers\HomeController::class, 'view_blog']);

//all posts by author
Route::get('/author_posts/{user_id}', [App\Http\Controllers\HomeController::class, 'author_posts']);

//search feature
