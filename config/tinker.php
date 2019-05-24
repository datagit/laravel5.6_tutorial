<?php
/*
|--------------------------------------------------------------------------
| Laravel magic begins
|--------------------------------------------------------------------------
*/
// Register toRawSql() macro which will get nice, full sql of the query (with bound values)
\Illuminate\Database\Query\Builder::macro('toRawSql', function () {
    $bindings = array_map(function ($binding) {
        return is_int($binding) || is_float($binding) ? $binding : "'{$binding}'";
    }, $this->getBindings());
    return vsprintf(str_replace('?', "%s", $this->toSql()), $bindings);
});
/*
|--------------------------------------------------------------------------
| Custom casters (presenters) and aliases registration for PsySH
|--------------------------------------------------------------------------
*/
if (!function_exists('castQuery')) {
    function castQuery($query)
    {
        if ($query instanceof \Illuminate\Database\Eloquent\Builder) {
            $query = $query->getQuery();
        }
        return [
            'sql'      => $query->toSql(),
            'bindings' => $query->getBindings(),
            'raw'      => $query->toRawSql(),
        ];
    }
}
/*
|--------------------------------------------------------------------------
| Application HTTP requests helper
|--------------------------------------------------------------------------
*/
// Why extending TestCase here? Just because it's sooo easy and consistent across all L versions ;)
if (!class_exists('_LocalRequest')) {
    class _LocalRequest extends \Tests\TestCase
    {
        function __construct()
        {
            $this->setUp();
        }
        function response()
        {
            return $this->response;
        }
        function __call($method, $params)
        {
            return call_user_func_array([$this, $method], $params);
        }
    }
}
/*
|--------------------------------------------------------------------------
| Helper functions for common tasks
|--------------------------------------------------------------------------
*/
if (!function_exists('local')) {
    // test: local('/')->getContent()
    # vendor/symfony/http-kernel/Tests/EventListener/RouterListenerTest.php
    function local($uri = null) { return $uri ? (new _LocalRequest)->get($uri) : new _LocalRequest; }
}
if (!function_exists('guzzle')) {
    function guzzle($url = null) { return $url ? (new \GuzzleHttp\Client)->get($url) : new \GuzzleHttp\Client; }
}
if (!function_exists('http')) {
    // $http = http('google.com.vn'); $http->getBody()->getContents();
    # vendor/guzzlehttp/psr7/src/Response.php
    function http($url = null) { return guzzle($url); }
}
if (!function_exists('www')) {
    function www($url = null) { return guzzle($url); }
}
if (!function_exists('now')) {
    function now($timezone = null) { return \Carbon\Carbon::now($timezone); }
}

return [
    // Sets the maximum number of entries the history can contain. If set to
    // zero, the history size is unlimited.
    'historySize' => 0,

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
        // The `parse` command is a command used in the development of PsySH.
        // Given a string of PHP code, it pretty-prints the PHP Parser parse
        // tree. It prolly won't be super useful for most of you, but it's there
        // if you want to play :)
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
    // Specify a custom prompt.
    'prompt' => 'REPL tinker >>> ',
    // Display an additional startup message. You can color and style the
    // message thanks to the Symfony Console tags. See
    // https://symfony.com/doc/current/console/coloring.html for more details.
    'startupMessage' => sprintf('<info>%s</info>', shell_exec('uptime')),
    //test casters: $query = User::where('email', 'like', 'upollich@example.org')
    'casters' => [
        'Illuminate\Database\Eloquent\Builder' => 'castQuery',
        'Illuminate\Database\Query\Builder' => 'castQuery',
    ],
];
