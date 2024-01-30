<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/newPost',BlogsController::class."@createPost")->middleware("auth:sanctum");
Route::get('/getPosts', BlogsController::class . "@getPosts");
Route::put('/updatePost/{id}', BlogsController::class . "@updatePost")->middleware("auth:sanctum");
Route::delete('/deletePost/{id}', BlogsController::class . "@deletePost")->middleware("auth:sanctum");
Route::post('/register',UsersController::class.'@Register');
Route::post('/login', UsersController::class . '@Login');
Route::get('/user/{id}',UsersController::class.'@showUser');
Route::get('/userPosts', UsersController::class . '@showUserPosts');
Route::get('/users',UsersController::class.'@showAllUsers');