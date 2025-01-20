<?php

namespace App\Http\Controllers;

use App\Models\{Brand, Blog};
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAllBlogsForABrand(Brand $brand, Request $request)
    {
        $featured = $request->has('featured');
        $page = $request->get('page');
        $perPage = $request->get('perPage');

        $blogs = $brand->blogs()
            ->where([
                ['is_archived', false],
                ['is_featured', $featured]
            ])
            ->with(['tags', 'category'])
            ->paginate($perPage, page: $page);

        return response()->json($blogs);
    }

    public function show(Blog $blog)
    {
        $blog->load(['tags', 'category']);

        return response()->json([
            'blog' => $blog
        ]);
    }
}
