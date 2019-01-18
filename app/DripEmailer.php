<?php
/**
 * Created by PhpStorm.
 * User: daomanhdat
 * Date: 1/18/19
 * Time: 1:57 PM
 */

namespace MyLearnLaravel5x;


class DripEmailer
{
    public function send(User $user, $queue_option)
    {
        var_dump($queue_option);
        var_dump($user->attributesToArray());
    }
}
