<?php
/**
 * Created by PhpStorm.
 * User: daomanhdat
 * Date: 10/5/18
 * Time: 4:28 PM
 */

namespace MyLearnLaravel5x\Facades;


class DemoClassFacade extends \Illuminate\Support\Facades\Facade
{
    public static function getFacadeAccessor()
    {
        //demo.class
        return Config::get('services')['demo_class_service'];
    }
}
