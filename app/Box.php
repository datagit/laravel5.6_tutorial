<?php
/**
 * Created by PhpStorm.
 * User: daomanhdat
 * Date: 9/20/18
 * Time: 2:08 PM
 */

namespace MyLearnLaravel5x;


class Box
{
    /**
     * @var array 
     */
    protected $items = [];

    /**
     * Box constructor.
     * @param array $items
     */
    public function __construct($items = [])
    {
        $this->items = $items;
    }

    /**
     * @param $item
     * @return bool
     */
    public function has($item)
    {
        return in_array($item, $this->items);
    }

    /**
     * Remove an item in the box, or null if the box is empty
     * @return string or null
     */
    public function takeOne()
    {
        return array_shift($this->items);
    }

    /**
     * @param $letter
     * @return array
     */
    public function startsWith($letter)
    {
        return array_filter($this->items, function ($item) use ($letter) {
            return stripos($item, $letter) === 0;
        });
    }
    
}
