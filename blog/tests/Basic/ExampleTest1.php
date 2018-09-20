<?php
/**
 * Created by PhpStorm.
 * User: daomanhdat
 * Date: 9/20/18
 * Time: 2:57 PM
 */

namespace Tests;

class ExampleTest1 extends TestCase
{
    public function testBasicExample()
    {
        $this->visit('/')
            ->see('Laravel')
            ->dontSee('Rails');

    }
}
