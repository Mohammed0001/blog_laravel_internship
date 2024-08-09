<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get( '/posts', [PostController::class, 'index']);
// Route::get('/posts/{post}', [PostController::class, 'show']);
// Route::post('/posts' , [PostController::class , 'store']);
// Route::put('/posts/{post}', [PostController::class, 'update']);
// Route::delete('/posts/{post}', [PostController::class, 'destroy']);

Route::apiResource('posts', PostController::class);
Route::apiResource('users', UserController::class);

Route::get('/userPosts/{userID}', [PostController::class, 'showUserPosts']);


// Route::get( '/users', [UserController::class, 'index']);
// Route::get('/users/{user}', [UserController::class, 'show']);
// Route::post('/users' , [UserController::class , 'store']);
// Route::put('/users/{user}', [UserController::class, 'update']);
// Route::delete('/users/{user}', [UserController::class, 'destroy']);

