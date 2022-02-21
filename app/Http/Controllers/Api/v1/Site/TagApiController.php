<?php

namespace App\Http\Controllers\Api\V1\Site;

use App\Http\Controllers\Api\v1\BaseApiController;
use App\Models\Tag;

class TagApiController extends BaseApiController
{
    public function index()
    {
        $tags = Tag::latest()->get();
    }
}
