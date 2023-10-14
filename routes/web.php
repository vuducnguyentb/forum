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

Route::get('/', 'App\Http\Controllers\FrontEndController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/new-topic',function (){
    return view('client.new-topic');
});

Route::get('/category/overview/{id}','App\Http\Controllers\FrontEndController@categoryOverview')
    ->name('category.overview');
Route::get('/forum/overview/{id}','App\Http\Controllers\FrontEndController@forumOverview')
    ->name('forum.overview');

Route::get('/topic',function (){
    return view('client.topic');
});

Route::get('dashboard/home','App\Http\Controllers\DashboardController@home');

#category
Route::get('dashboard/category/new','App\Http\Controllers\CategoryController@create')
    ->name('category.new');
Route::post('dashboard/category/new','App\Http\Controllers\CategoryController@store')
    ->name('category.store');
Route::get('dashboard/categories','App\Http\Controllers\CategoryController@index')
    ->name('categories');
Route::get('dashboard/categories/{id}','App\Http\Controllers\CategoryController@show')
    ->name('category');
Route::get('dashboard/categories/edit/{id}','App\Http\Controllers\CategoryController@edit')
    ->name('category.edit');
Route::post('dashboard/categories/edit/{id}','App\Http\Controllers\CategoryController@update')
    ->name('category.update');
Route::get('dashboard/categories/delete/{id}','App\Http\Controllers\CategoryController@destroy')
    ->name('category.destroy');
#forum
Route::get('dashboard/forum/new','App\Http\Controllers\ForumController@create')
    ->name('forum.new');
Route::post('dashboard/forum/new','App\Http\Controllers\ForumController@store')
    ->name('forum.store');
Route::get('dashboard/forums','App\Http\Controllers\ForumController@index')
    ->name('forums');
Route::get('dashboard/forums/{id}','App\Http\Controllers\ForumController@show')
    ->name('forum');
Route::get('dashboard/forums/edit/{id}','App\Http\Controllers\ForumController@edit')
    ->name('forum.edit');
Route::post('dashboard/forums/edit/{id}','App\Http\Controllers\ForumController@update')
    ->name('forum.update');
Route::get('dashboard/forums/delete/{id}','App\Http\Controllers\ForumController@destroy')
    ->name('forum.destroy');

#topics
Route::get('client/topic/new/{id}','App\Http\Controllers\DiscussionController@create')
    ->name('topic.new');
Route::post('client/topic/new','App\Http\Controllers\DiscussionController@store')
    ->name('topic.store');
//Route::get('client/topics','App\Http\Controllers\ForumController@index')
//    ->name('topics');
Route::get('client/topics/{id}','App\Http\Controllers\DiscussionController@show')
    ->name('topic');
//Route::get('client/topics/edit/{id}','App\Http\Controllers\DiscussionController@edit')
//    ->name('topic.edit');
//Route::post('client/topics/edit/{id}','App\Http\Controllers\DiscussionController@update')
//    ->name('topic.update');
//Route::get('client/topics/delete/{id}','App\Http\Controllers\DiscussionController@destroy')
//    ->name('topic.destroy');
