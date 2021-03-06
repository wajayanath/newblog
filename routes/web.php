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
View::share('blog', App\Blog::all());
View::share('c', App\Category::latest()->get());

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', ['as' => '/', 'uses' => 'BlogController@index']);

Auth::routes();

Route::get('/blog/bin', 'BlogController@bin');
Route::get('/blog/bin/{id}/restore', 'BlogController@restore');
Route::delete('/blog/bin/{id}/destroyBlog', 'BlogController@destroyBlog');

Route::get('/blog', 'BlogController@index');
Route::get('/blog/create', 'BlogController@create');
Route::post('/blog/store', 'BlogController@store');

Route::get('/blog/{slug}', 'BlogController@show');
Route::get('/blog/{id}/edit', 'BlogController@edit');

Route::put('/blog/{id}','BlogController@publish');

Route::patch('/blog/{id}', 'BlogController@update');

Route::delete('/blog/{id}', 'BlogController@destroy');

Route::get('admin', 'AdminController@index');

Route::resource('categories', 'CategoryController');

Route::get('userslist', 'UserController@userslist');

Route::resource('users', 'UserController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{username}', array('as' => 'show', 'uses' => 'UserController@show' ));