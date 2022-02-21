<?php

namespace App\Http\Controllers\Api\V1\Site;

use App\Http\Controllers\Api\v1\BaseApiController;
use App\Models\Category;

class CategoryApiController extends BaseApiController
{
    public function index()
    {
        $categories = Category::latest()->get();
    }

    public function show(Category $category)
    {
        # code...
    }
}
