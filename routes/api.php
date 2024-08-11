<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['auth:sanctum'])->group(function (){
    // Route::get( '/getMyData', [UserController::class, 'test']);
    Route::apiResource('posts', PostController::class);
    Route::apiResource('comments', CommentController::class);
});

// Route::get( '/users', [UserController::class, 'index']);
// Route::get('/users/{user}', [UserController::class, 'show']);
// Route::post('/users' , [UserController::class , 'store']);
// Route::put('/users/{user}', [UserController::class, 'update']);
// Route::delete('/users/{user}', [UserController::class, 'destroy']);
// Route::get( '/posts', [PostController::class, 'index']);
// Route::get('/posts/{post}', [PostController::class, 'show']);
// Route::post('/posts' , [PostController::class , 'store']);
// Route::put('/posts/{post}', [PostController::class, 'update']);
// Route::delete('/posts/{post}', [PostController::class, 'destroy']);

// Route::apiResource('users', UserController::class);

Route::get('/userPosts/{userID}', [PostController::class, 'showUserPosts']);



require __DIR__ . '/auth.php';
