<?php
/**
 * Created by PhpStorm.
 * User: daomanhdat
 * Date: 5/24/19
 * Time: 9:59 AM
 */

namespace MyLearnLaravel5x\Services;


use MyLearnLaravel5x\Contracts\DogContract;

class DemoClassService
{
    private $_dog;
    public function __construct(DogContract $dog)
    {
        $this->_dog = $dog;
    }

    public function doSomething()
    {
        var_dump('doSomething');
    }
    public function doSomethingForDog()
    {
        var_dump($this->_dog);
        $this->_dog->go();
        $this->_dog->eat();
        $this->_dog->sleep();
    }
}
