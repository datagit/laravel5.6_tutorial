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

Route::get('foo', function () {
    //using way1:
    $object = array(1,2,3,);
    Debugbar::info($object);
    Debugbar::error('Error!');
    Debugbar::warning('Watch out…');
    Debugbar::addMessage('Another message', 'mylabel');


    //using way2:
    try {
        throw new Exception('foobar');
    } catch (Exception $e) {
        Debugbar::addThrowable($e);
    }


    //using way3:
    // All arguments will be dumped as a debug message
    $var1 = "Dao Man Dat";
    $someString = "some string";
    $intValue = rand(1,10);
    debug($var1, $someString, $intValue, $object);
    Debugbar::startMeasure('render','Time for rendering');
    Debugbar::stopMeasure('render');
    Debugbar::addMeasure('now', LARAVEL_START, microtime(true));
    Debugbar::measure('My long operation', function() {
        // Do something…
        sleep(2);
    });

    return 'Hello World';
});
