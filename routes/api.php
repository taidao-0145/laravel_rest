<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'], function () {
    Route::get('students', [StudentController::class, 'index']);
    Route::post('students', [StudentController::class, 'store']);
    Route::get('students/{id}', [StudentController::class, 'show']);
    Route::get('students/{id}/edit', [StudentController::class, 'edit']);
    Route::put('students/edit/{id}', [StudentController::class, 'update']);
    Route::delete('students/delete/{id}', [StudentController::class, 'destroy']);
    Route::get('students-list/{id}',[StudentController::class, 'list']);
    Route::get('students-find/{id}',[StudentController::class, 'find']);
});

Route::group(['prefix' => 'v1'], function () {
    Route::get('posts', [PostController::class, 'index']);
    Route::post('posts', [PostController::class, 'store']);
    Route::get('get-posts-tag', [PostController::class, 'getPostTag']);
});

Route::group(['prefix' => 'v1'], function () {
    Route::get('tags', [TagController::class, 'index']);
    Route::post('tags', [TagController::class, 'store']);
    Route::get('get-tag-post/{id}', [TagController::class, 'getTagPost']);
});

