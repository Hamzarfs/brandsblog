<?php

namespace App\Http\Controllers;

use App\Models\{Brand, Blog};

class ApiController extends Controller
{
    public function getAllBlogsForABrand(Brand $brand)
    {
        $brand->load([
            'blogs' => fn($blogQuery) => $blogQuery->with(['tags', 'category'])
        ]);

        return response()->json([
            'blogs' => $brand->blogs
        ]);
    }

    public function show(Blog $blog) {
        $blog->load(['tags', 'category']);

        return response()->json([
            'blog' => $blog
        ]);
    }
}
