<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);
Route::post('/', [HomeController::class, 'storepost']);
Route::get('/savedpost/{post_id}', [HomeController::class, 'savedpost']);
Route::get('/create-post', [HomeController::class, 'create']);

Route::get('/explore', [ExploreController::class, 'showexplore']);
Route::get('/search', [ExploreController::class, 'search']);


Route::get('/follow/{user_id}', [UserController::class, 'followsystem']);
Route::get('/settings', [UserController::class, 'edit']);
Route::put('/settings/edit', [UserController::class, 'updateuser']);
Route::get('/notifications', [UserController::class, 'notif']);
Route::get('/notificationSeen', [UserController::class, 'notif_update']);
Route::get('/notification/total', [UserController::class, 'notif_total']);

Route::get('/like/{type}/{post_id}', [LikeController::class, 'toggle']);

Route::post('/{post_id}', [CommentController::class, 'storecomment']);

Route::get('/{username}', [UserController::class, 'show']);
