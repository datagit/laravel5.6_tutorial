<?php

namespace Tests;

//use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    public $baseUrl = 'http://127.0.0.1:8000';
}
