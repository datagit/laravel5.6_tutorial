<?php

namespace Tests;

//use Tests\TestCase;
//use Illuminate\Foundation\Testing\RefreshDatabase;


class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->visit('/')
            ->see('Laravel');

//        $response->assertStatus(200);
    }
}
