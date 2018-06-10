<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Requests;

class AbcController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showPath(Request $request) {
        //echo '<br>ID: '.$id;

        $uri = $request->path();
        echo '<br>URI: '.$uri;

        $url = $request->url();
        echo '<br>';

        echo 'URL: '.$url;
        $method = $request->method();
        echo '<br>';

        echo 'Method: '.$method;
    }

    public function getName($name = 'ABC') {
        echo 'NAME: '.$name;
        echo '<br>';
    }

}
