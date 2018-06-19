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

Route::get('/kontakt', function () {
    return view('kontakt');
});

Route::get('/rezepte', 'RecipeController@index');

Route::get('/rezepte/top', 'RecipeController@topten');

Route::get('/rezepte/erstellen', 'RecipeController@create');

Route::post('/rezepte', 'RecipeController@store');

Route::post('/rezepte/{id}', 'RecipeController@update');

Route::get('/rezepte/{id}', 'RecipeController@show');

Route::get('/rezepte/{id}/bearbeiten', 'RecipeController@edit');
