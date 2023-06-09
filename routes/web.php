<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;


Auth::routes();

Route::get('/home', [App\Http\Controllers\PostController::class, 'index'])->name('home');

Route::get('/', [PostController::class, 'index']);

Route::resource('posts',  PostController::class);

Route::get('loginplz', 	[App\Http\Controllers\HomeController::class,'loginplz']);
Route::get('search', ['as' => 'search', 'uses' => 'App\Http\Controllers\PostController@searchinput']);

//Comments
Route::post('comments/{post_id}', ['uses' => 'App\Http\Controllers\CommentsController@store', 'as' => 'comments.store' ]);
Route::get('comments/{id}/edit', ['uses' => 'App\Http\Controllers\CommentsController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'App\Http\Controllers\CommentsController@update', 'as' => 'comments.update']);
Route::get('comments/{id}/delete', ['uses' => 'App\Http\Controllers\CommentsController@delete', 'as' => 'comments.delete']);
Route::delete('comments/{id}', ['uses' => 'App\Http\Controllers\CommentsController@destroy', 'as' => 'comments.destroy']);

//프사
Route::get('avatar', [PostController::class,'avatar']);
Route::post('profile', [PostController::class,'update_avatar']);

//Task
Route::resource('tasks', TaskController::class);
/* GET|HEAD tasks | tasks.index 
   GET|HEAD tasks/{task}/edit | tasks.edit 
   GET tasks/create
   PUT|PATCH tasks/{task} |tasks.update
   GET|PATCH tasks/{task} |tasks.show
   DELETE|PATCH tasks/{task} |tasks.destroy
*/
