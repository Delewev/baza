<?php

namespace App\Http\Service\Post;

use App\Models\Post;

class Service
{
    public function store($data)
    {
       Post::create($data);
    }

}
