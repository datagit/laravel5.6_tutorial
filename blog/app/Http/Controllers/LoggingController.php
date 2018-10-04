<?php

namespace MyLearnLaravel5x\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoggingController extends Controller
{
    public function FuncName(Request $request) {

        // log something to storage/logs/debug.log
        //Log::info(['Request'=>$request]);
        $message = "Message " . rand(1,100);
        Log::emergency($message);
        Log::alert($message);
        Log::critical($message);
        Log::error($message);
        Log::warning($message);
        Log::notice($message);
        Log::info($message);
        Log::debug($message);
        Log::channel('mydebug')->info('mydebug: Something happened!' . $message);
        return;
    }
}
