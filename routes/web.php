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

    Route::get('/posts/index', 'PostController@index');
    Route::post('/posts', 'PostController@store');
    Route::get('/', 'PostController@create');
    Route::get('/posts/{post}', 'PostController@show');
    Route::put('/posts/{post}', 'PostController@update');
    Route::delete('/posts/{post}', 'PostController@delete');
    Route::get('/posts/{post}/edit', 'PostController@edit');
    Route::get('/categories/{category}', 'CategoryController@index');
    Route::get('/conditions/{condition}', 'ConditionController@index');
    Route::get('/types/{type}', 'TypeController@index');
    Route::get('/frequencies/{frequency}', 'FrequencyController@index');
   
