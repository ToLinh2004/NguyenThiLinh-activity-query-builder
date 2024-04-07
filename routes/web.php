<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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

Route::get('/', function () {
    return view('welcome');
});

// Route to get all posts
Route::get('/posts', [PostController::class, 'getAllPosts']);

// Route to get one post by ID
Route::get('/posts/{id}', [PostController::class, 'getOnePost']);

