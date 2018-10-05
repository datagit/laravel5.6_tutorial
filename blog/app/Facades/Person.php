<?php
/**
 * Created by PhpStorm.
 * User: daomanhdat
 * Date: 10/5/18
 * Time: 4:28 PM
 */

namespace MyLearnLaravel5x\Facades;


class Person extends \Illuminate\Support\Facades\Facade
{
    public static function getFacadeAccessor()
    {
        return 'name';
    }
}
