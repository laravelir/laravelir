<?php

namespace App\Http\Controllers\Api\V1\Site;

use App\Http\Controllers\Api\v1\BaseApiController;
use App\Models\Sponsor;

class SponsorApiController extends BaseApiController
{
    public function index()
    {
        $sponsors = Sponsor::latest()->get();
    }
}
