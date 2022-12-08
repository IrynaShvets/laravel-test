<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Post\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::group([

    'middleware' => 'api',
    /* 'as' => 'api.', */
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
  /*   Route::get('login', 'AuthController@sessionExpired')->name('sessionExpired'); */
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['namespace' => 'Post', 'middleware' => 'jwt.auth'], function() {
    Route::get('/post', function () {
        return view('post');
    })->name('post');
    Route::get('/post/all', [PostController::class, 'allData']);
    Route::post('/post/submit', [PostController::class, 'submit']);
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin', 'middleware' => 'jwt.auth'], function () {

    Route::group(['namespace' => 'Post'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin');
        Route::get('/post', [IndexController::class, '__invoke'])->name('admin-post');
    });
});

/* Route::get('/cache', function() { 
    $exitCode = Artisan::call('config:clear'); 
    $exitCode = Artisan::call('cache:clear'); 
    $exitCode = Artisan::call('config:cache'); 
    return $exitCode; //Return anything });
});
 */

/* Route::get('/product', function () {
    return view('product');
})->name('product');

Route::get('/product/all', 
    [ProductController::class, 'index']
)->name('product-data'); */
