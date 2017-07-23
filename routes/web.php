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
    return view('welcome');
});

Route::get('/todo', [
	
	'uses' => 'TodosController@index', 
	'as' => 'todo',

]);

Route::post('/create/todo', [
	
	'uses' => 'TodosController@store', 

]);

Route::get('/todo/delete/{id}', [

	'uses' => 'TodosController@delete',
	'as' => 'todo.delete'

]);


Route::get('/todo/update/{id}', [

	'uses' => 'TodosController@update',
	'as' => 'todo.update'

]);

Route::post('/todo/save/{id}', [
	
	'uses' => 'TodosController@save', 
	'as' => 'todo.save'

]);

Route::get('/todo/completed/{id}', [

	'uses' => 'TodosController@completed',
	'as' => 'todo.completed'

]);


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'admin', 'middleware' => 'auth' ],function (){


    Route::get('/home' , [

        'uses' => 'HomeController@index',
        'as' => 'home'

    ]);


    Route::get('/post/create', [

        'uses' => 'PostsController@create',
        'as' => 'post.create'

    ]);


    Route::post('/post/store', [

        'uses' => 'PostsController@store',
        'as' => 'post.store'

    ]);

});






