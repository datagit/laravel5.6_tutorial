<?php

if (!function_exists('dmd')) {
    function dmd() { return 'Dao Man Dat'; }
}

if (!function_exists('guzzle')) {
    function guzzle($url = null) { return $url ? (new \GuzzleHttp\Client)->get($url) : new \GuzzleHttp\Client; }
}
if (!function_exists('http')) {
    function http($url = null) { return guzzle($url); }
}
if (!function_exists('www')) {
    function www($url = null) { return guzzle($url); }
}

return [

    /*
    |--------------------------------------------------------------------------
    | Console Commands
    |--------------------------------------------------------------------------
    |
    | This option allows you to add additional Artisan commands that should
    | be available within the Tinker environment. Once the command is in
    | this array you may execute the command in Tinker using its name.
    |
    */

    'commands' => [
        // App\Console\Commands\ExampleCommand::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Alias Blacklist
    |--------------------------------------------------------------------------
    |
    | Typically, Tinker automatically aliases classes as you require them in
    | Tinker. However, you may wish to never alias certain classes, which
    | you may accomplish by listing the classes in the following array.
    |
    */

    'dont_alias' => [],

    'startupMessage' => '<info>Using local config file (config/tinker.php)</info>',
    // Specify a custom prompt. REPL: read eval print loop
    'prompt' => 'REPL >>> ',


];
