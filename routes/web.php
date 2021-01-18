<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('posts', [PostController::class, 'index']);
Route::post('post', [PostController::class, 'store']);
Route::put('post', [PostController::class, 'update']);
Route::delete('post/{post_id}', [PostController::class, 'destroy']);