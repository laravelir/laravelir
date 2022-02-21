<?php

namespace App\Http\Controllers\Api\V1\Site;

use App\Http\Controllers\Api\v1\BaseApiController;
use App\Models\Package;

class PackageApiController extends BaseApiController
{
    public function index()
    {
        $packages = Package::latest()->get();
    }
}
