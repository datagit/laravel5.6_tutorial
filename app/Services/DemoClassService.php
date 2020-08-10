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
        // TODO: xxx
        // FIXME: yyy
        // TODO-1: fef df  ef ef f
        // CONFIRM-EN:
        // CONFIRM-JPEN
        // TODO-2:2222
        // CONFIRM-PM:222
        // CONFIRM-SPEC:222
        // TODO-3: FEF EFE F

        var_dump($this->_dog);
        $this->_dog->go();
        $this->_dog->eat();
        $this->_dog->sleep();
    }
}
