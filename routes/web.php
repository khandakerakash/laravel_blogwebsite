<?php

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

Route::get('/', function () {
    return redirect(route('posts.index'));
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/posts', 'PostController');
Route::resource('/comments', 'CommentController');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/posts', 'AdminController@posts')->name('admin.posts.all');
    Route::get('/add_post', 'AdminController@postForm')->name('admin.post.add');
    Route::post('/post', 'AdminController@postSave')->name('admin.post.save');
    Route::get('/post/{post_id}', 'AdminController@postEditForm')->name('admin.post.edit');
    Route::post('/post/{post_id}', 'AdminController@postUpdateForm')->name('admin.post.update');
    Route::post('/post/{post_id}/delete', 'AdminController@postDelete')->name('admin.post.delete');
});

