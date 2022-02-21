<?php

namespace App\Http\Controllers\Api\V1\Site;

use App\Http\Controllers\Api\v1\BaseApiController;
use App\Models\User;

class UserApiController extends BaseApiController
{
    public function index()
    {
        $users = User::latest()->get();
    }
}
