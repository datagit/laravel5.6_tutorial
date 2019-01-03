<?php

namespace MyLearnLaravel5x;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
