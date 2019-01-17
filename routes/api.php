<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// get all articles with paginate
Route::get('articles', 'ArticleController@index');

//get single article with id
Route::get('article/{id}', 'ArticleController@show');

//post create a single article
Route::post('article', 'ArticleController@create');

//put update a single article
Route::put('article/{id}', 'ArticleController@update');

//delete delete a single article
Route::delete('article/{id}', 'ArticleController@destroy');

