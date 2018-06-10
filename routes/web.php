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

Route::get('id/{id?}', function ($id = 100) {
    echo sprintf('ID: %s', $id);
});

Route::get('abc/hello', 'AbcController@showPath');

Route::get('abc/haha/{name?}', 'AbcController@getName')->name('abc_name_haha');

Route::get('/foo/bar','UriController@index')->name('uri_name_foo_bar');

Route::post('/uri/post_test', 'UriController@postTest')->name('uri_post_test');