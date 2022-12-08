<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\Post\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('main');
})->name('main');

Route::get('/about', function () {
    return view('about');
})->name('about');

/**
 * Routes contacts
 */
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get(
    '/contact/all/{id}',
    [ContactController::class, 'showOneMessage']
)->name('contact-data-one');

Route::get(
    '/contact/all/{id}/update',
    [ContactController::class, 'updateMessage']
)->name('contact-update');

Route::post(
    '/contact/all/{id}/update',
    [ContactController::class, 'updateMessageSubmit']
)->name('contact-update-submit');

Route::get(
    '/contact/all/{id}/delete',
    [ContactController::class, 'deleteMessage']
)->name('contact-delete');

Route::get('/contact/all', [ContactController::class, 'allData'])->name('contact-data');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact-form');


/**
 * Routes posts
 */
Route::get('/post', function () {
    return view('post');
})->name('post');

Route::get(
    '/post/all',
    [PostController::class, 'allData']
)->name('post-data');

Route::post(
    '/post/submit',
    [PostController::class, 'submit']
)->name('post-form');

Route::get(
    '/post/all/{id}',
    [PostController::class, 'showOnePost']
)->name('post-data-one');

Route::get(
    '/post/all/{id}/update',
    [PostController::class, 'updatePost']
)->name('post-update');

Route::post(
    '/post/all/{id}/update',
    [PostController::class, 'updatePostSubmit']
)->name('post-update-submit');

Route::get(
    '/post/all/{id}/delete',
    [PostController::class, 'deletePost']
)->name('post-delete');


/**
 * Routes products
 */
Route::get('/product', function () {
    return view('product');
})->name('product');

Route::get('/product/all', 
    [ProductController::class, 'index']
)->name('product-data');

Route::post('/product/create', 
    [ProductController::class, 'create']
)->name('product-form');

Route::get('/product/all/{id}', 
    [ProductController::class, 'showOneProduct']
)->name('product-data-one');

/**
 * Routes admin
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::group(['namespace' => 'Post'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin');
        Route::get('/post', [IndexController::class, '__invoke'])->name('admin-post');
    });
});


/**
 * Routes auth
 */
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
