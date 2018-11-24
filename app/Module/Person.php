<?php
/**
 * Created by PhpStorm.
 * User: daomanhdat
 * Date: 10/5/18
 * Time: 4:30 PM
 */

namespace MyLearnLaravel5x\Module;

use Illuminate\Foundation\Application;

class Person
{
    public static function getAge()
    {
        echo Application::VERSION;
        return rand(10,100);
    }
    public function getName()
    {
        echo Application::VERSION;
        return 'AppDividend';
    }
}
