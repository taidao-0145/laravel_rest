<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('home');
});

Route::get('/home', [ProductController::class, 'home']);

Route::get('/store', [ProductController::class, 'store']);

Route::get('/admincp/login', [AdminLoginController::class,'getLogin']);

Route::get('admincp/login', ['as' => 'getLogin', 'uses' => 'Admin\AdminLoginController@getLogin']);
Route::post('admincp/login', ['as' => 'postLogin', 'uses' => 'Admin\AdminLoginController@postLogin']);
Route::get('admincp/logout', ['as' => 'getLogout', 'uses' => 'Admin\AdminLoginController@getLogout']);

Route::group(['middleware' => 'checkAdminLogin', 'prefix' => 'admincp', 'namespace' => 'Admin'], function() {
    Route::get('/', function() {
        return view('admin.home');
    });
});
