<?php
/**
 * Created by PhpStorm.
 * User: daomanhdat
 * Date: 9/20/18
 * Time: 2:17 PM
 */

namespace Tests;


use MyLearnLaravel5x\Box;

class BoxTest extends TestCase
{
    public function testHasItemInBox()
    {
        $box = new Box(['cat', 'toy', 'torch']);
        $this->assertTrue($box->has('toy'));
        $this->assertFalse($box->has('ball'));
    }

    public function testTakeOneFromTheBox()
    {
        $box = new Box(['torch']);
        $this->assertEquals('torch', $box->takeOne());

        //Null, now the box is empty
        $this->assertNull($box->takeOne());
    }

    public function testStartsWithALetter()
    {
        $box = new Box(['toy', 'torch', 'ball', 'cat', 'tissue']);
        $results = $box->startsWith('t');

        $this->assertCount(3, $results);
        $this->assertContains('toy', $results);
        $this->assertContains('torch', $results);
        $this->assertContains('tissue', $results);

        // Empty array if passed even
        $this->assertEmpty($box->startsWith('s'));
    }

}
