<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'BlogController@index')->name('index.blog');
// Route::get('/content_post', function(){
//     return view('blog.content_post');
// });

Route::get('/content/{slug}', 'BlogController@GetPost')->name('content.blog');
Route::get('/list-post', 'BlogController@ListPost')->name('list.blog');
Route::get('/list-category/{category}', 'BlogController@ListCategory')->name('category.blog');
Route::get('/search', 'BlogController@search')->name('search.blog');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/category', 'CategoryController');
    Route::resource('/tags', 'TagsController');
    Route::get('/posts/showTrash', 'PostsController@showTrash')->name('posts.showTrash');
    Route::get('/posts/restore/{id}', 'PostsController@restore')->name('posts.restore');
    Route::delete('/posts/kill/{id}', 'PostsController@kill')->name('posts.kill');
    Route::resource('/posts', 'PostsController');
    Route::resource('/user', 'UserController');
});
