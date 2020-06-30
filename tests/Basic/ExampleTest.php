<?php
/**
 * Created by PhpStorm.
 * User: daomanhdat
 * Date: 9/20/18
 * Time: 2:57 PM
 */

namespace Tests;


class ExampleTest extends TestCase
{
    public function testBasicExample()
    {
        $this->visit('/')
            ->see('Hello World')
            ->dontSee('Rails');
    }

//    public function testTable()
//    {
//        $this->visit('/')
//            ->click('login')
//            ->dontSee('dao man dat1');
//    }

    public function testAboutUs()
    {
        $this->visit('/about-us')
            ->type('Taylor', 'name')
            ->check('terms')
            ->press('Register')
            ->see('POST');
    }

    public function testSeeJsonStructure()
    {
        $this->get('/json')
            ->seeJsonStructure([
                'name',
                'pet' => [
                    'name', 'age'
                ]
            ]);
    }
}
