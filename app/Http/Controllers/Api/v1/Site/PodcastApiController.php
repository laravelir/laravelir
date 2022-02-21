<?php

namespace App\Http\Controllers\Api\V1\Site;

use App\Http\Controllers\Api\v1\BaseApiController;
use App\Models\Podcast;

class PodcastApiController extends BaseApiController
{
    public function index()
    {
        $podcasts = Podcast::latest()->get();
    }
}
