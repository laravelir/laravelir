<?php

namespace App\Http\Controllers\Api\V1\Site;

use App\Http\Controllers\Api\v1\BaseApiController;
use App\Models\Post;

class PostApiController extends BaseApiController
{
    public function index()
    {
        $posts = Post::latest()->get();
    }
}
