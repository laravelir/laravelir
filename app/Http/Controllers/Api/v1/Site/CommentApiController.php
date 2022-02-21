<?php

namespace App\Http\Controllers\Api\V1\Site;

use App\Http\Controllers\Api\v1\BaseApiController;
use App\Models\Comment;

class CommentApiController extends BaseApiController
{
    public function index()
    {
        $comments = Comment::latest()->get();
    }
}
