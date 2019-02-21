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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/scraper-crawler-detail/{id?}', function ($id = 127235) {
//    $crawler = Goutte::request('GET', 'https://quantrimang.com/cach-khoa-pc-tu-xa-tren-windows-10-161310');
    //$crawler = Goutte::request('GET', 'https://quantrimang.com/khong-the-tim-thay-snipping-tool-tren-windows-10-day-la-cach-khac-phuc-161262');
    //$crawler = Goutte::request('GET', 'https://quantrimang.com/kich-hoat-mo-trang-cai-dat-share-page-an-tren-ung-dung-settings-windows-10-127304');
//    $crawler = Goutte::request('GET', 'https://quantrimang.com/sua-loi-these-files-cant-be-opened-tren-windows-10--81-7-127235');
    $url = sprintf('https://quantrimang.com/%d', $id);
    $crawler = Goutte::request('GET', $url);

    $crawler->filter('#adsposttop')->each(function ($crawler) {
        //remove ads
        foreach ($crawler as $node) {
            $node->parentNode->removeChild($node);
        }
    });

    $crawler->filter('#contentMain div.content.post-detail div.adbox')->each(function ($crawler) {
        //remove ads
        foreach ($crawler as $node) {
            $node->parentNode->removeChild($node);
        }
    });

    $crawler->filter('#contentMain > div.content.post-detail > div.content-detail.textview > ul')->each(function ($crawler) {
        //remove element html
        foreach ($crawler as $node) {
            $node->parentNode->removeChild($node);
        }
    });

    //#contentMain > div.content.post-detail > div.content-detail.textview > div.toc
    $crawler->filter('#contentMain > div.content.post-detail > div.content-detail.textview > div.toc')->each(function ($crawler) {
        //remove element html
        foreach ($crawler as $node) {
            $node->parentNode->removeChild($node);
        }
    });


    $crawler->filter('#contentMain > div.content.post-detail > div.content-detail.textview')->each(function ($node) {
        //get string html
        echo $node->html();
    });

//    $crawler->filter('#contentMain div.content.post-detail div.content-detail.textview img')->each(function ($node) {
////        $rc = new ReflectionClass(get_class($this));
////        echo $rc->getFileName();die;
//        //var_dump(get_class($node));
//        var_dump( $node->image()->getUri());
//    });
})->name('scraper-crawler-detail')->where('id', '[0-9]+');

Route::get('/scraper-link/{slug}/{p?}', function ($slug, $p = 1) {
    $url = sprintf('https://quantrimang.com/%s?p=%d', $slug, $p);
    $crawler = Goutte::request('GET', $url);

    $crawler->filter('#adsposttop')->each(function ($crawler) {
        //remove ads
        foreach ($crawler as $node) {
            $node->parentNode->removeChild($node);
        }
    });

    $crawler->filter('#contentMain div.content.post-detail div.adbox')->each(function ($crawler) {
        //remove ads
        foreach ($crawler as $node) {
            $node->parentNode->removeChild($node);
        }
    });

    //#contentMain > div.content.post-detail > div.content-detail.textview > div.toc
    $crawler->filter('#contentMain > div.content.post-detail > div.content-detail.textview > div.toc')->each(function ($crawler) {
        //remove element html
        foreach ($crawler as $node) {
            $node->parentNode->removeChild($node);
        }
    });


    $crawler->filter('#contentMain > div.content > div ul li')->each(function ($node) {
        //get string html
        echo $node->html();
    });

//    $crawler->filter('#contentMain div.content.post-detail div.content-detail.textview img')->each(function ($node) {
////        $rc = new ReflectionClass(get_class($this));
////        echo $rc->getFileName();die;
//        //var_dump(get_class($node));
//        var_dump( $node->image()->getUri());
//    });
})->name('scraper-link');

Route::get('scraper-category', function() {
    //https://api.symfony.com/2.7/Symfony/Component/DomCrawler/Link.html

    $crawler = Goutte::request('GET', 'https://quantrimang.com/');
    //#contentMain > div.leftbar > div > div > ul
//    $crawler->filter('#contentMain > div.leftbar > div > div > ul > li > a')->each(function ($node) {
//        //get string html
//        $re = '/(?<img><.*>)\s*(?<text>.*)/m';
//        preg_match_all($re, $node->html(), $matches, PREG_SET_ORDER, 0);
//        echo '<pre>';
//        $matches = reset($matches);
//        print_r($matches['text']);
//
//    });

    //#topnav
    $crawler->filter('#topnav > li.item')->each(function ($node) {
        echo '<pre>';
        foreach ($node->filter('a')->links() as $a) {
            print_r($a->getUri());
            print_r($a->getNode()->textContent);
            echo '<br/>';
        }

    });

    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";

    //#contentMain > div.leftbar > div.sticky.is_stuck > div > ul > li.tax-lang-cong-nghe > ul
    $crawler->filter('#contentMain > div.leftbar > div > div > ul > li')->each(function ($node) {
        //get string html
//        $re = '/(?<img><.*>)\s*(?<text>.*)/m';
//        preg_match_all($re, $node->html(), $matches, PREG_SET_ORDER, 0);
        echo '<pre>';
//        $matches = reset($matches);
//        print_r($matches['text']);
        //print_r($node->link());
//        print_r($node->filter('a')->link()->getUri());
//        print_r($node->filter('a')->html());


        foreach ($node->filter('a')->links() as $a) {
            print_r($a->getUri());
            print_r($a->getNode()->textContent);
            echo '<br/>';
        }

    });

})->name('scraper-category');
