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

Route::get('/json', function () {
    return response()->json([
        'name' => 'Abigail',
        'state' => 'CA',
        'pet' => ['name' =>  'p1', 'age' => 10],
    ]);
})->name('json');

Route::get('/test', function () {
    return view('test');
})->name('test');

Route::get('/about-us', function () {
    return view('about_us');
})->name('about-us');

Route::post('/about-us', function () {
    $input = \Illuminate\Support\Facades\Input::all();
    return view('about_us_post', ['all' => $input]);
})->name('about-us-post');

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

Route::get('/table/{number?}', function ($number =2) {
    for ($i = 1; $i <= 10; $i++) {
        echo "$i * $number = ". $i*$number ."<br>";
    }
})->where('number', '[0-9]+')->name('table');

//Route::get('user', 'UserController@showProfile');

//Route::controller('users', 'UsersController');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/cli', function()
{
    $exitCode = \Illuminate\Support\Facades\Artisan::call('help', ['--option' => 'foo']);
    return $exitCode;
});

Route::get('logging', '\MyLearnLaravel5x\Http\Controllers\LoggingController@FuncName');

app()->bind('name', function() {
    return new MyLearnLaravel5x\Module\Person;
});

Route::get('/module', function () {
    echo Person::getName();
    echo Person::getAge();
});
