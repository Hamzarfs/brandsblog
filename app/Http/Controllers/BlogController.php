<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\{Arr, Str};
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Laravel\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.blogs.index', [
            'blogs' => Blog::with(['tags', 'brand', 'category'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create', [
            'brands' => Brand::all(['id', 'name']),
            'categories' => Category::all(['id', 'name']),
            'tags' => Tag::all(['id', 'name']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'slug' => ['nullable', 'string', Rule::unique('blogs')],
            'content' => ['required', 'string'],
            'brand' => ['required', 'exists:brands,id'],
            'category' => ['required', 'exists:categories,id'],
            'tags' => ['required', 'array'],
            'tags.*' => ['required', 'exists:tags,id'],
            'image' => ['required', 'file', 'image'],
            'is_archived' => ['boolean'],
            'is_featured' => ['boolean'],
        ]);

        $imagePath = $data['image']->store('blogs/images');

        $attributes = [
            'title' => $data['title'],
            'slug' => Str::slug($data['slug'] ? Str::lower($data['slug']) : $data['title']),
            'content' => $data['content'],
            'is_archived' => Arr::exists($data, 'is_archived') && $data['is_archived'] == 1,
            'is_featured' => Arr::exists($data, 'is_featured') && $data['is_featured'] == 1,
            'image' => $imagePath,
            'image_url' => Storage::disk()->url($imagePath),
        ];

        $thumbnail = Image::read($data['image'])
            ->scale(150, 150)
            ->encode();

        $thumbnailPath = sprintf("blogs/thumbnails/%s", basename($attributes['image']));

        if (Storage::disk()->put($thumbnailPath, $thumbnail)) {
            $attributes['thumbnail'] = $thumbnailPath;
            $attributes['thumbnail_url'] = Storage::disk()->url($thumbnailPath);
        }

        $blog = new Blog($attributes);

        $blog->brand()->associate($data['brand']);
        $blog->category()->associate($data['category']);

        $blog->save();

        $blog->tags()->sync($data['tags']);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $blog->load(['tags', 'brand', 'category']);

        return view('admin.blogs.edit', [
            'blog' => $blog,
            'tags' => Tag::all(['id', 'name']),
            'brands' => Brand::all(['id', 'name']),
            'categories' => Category::all(['id', 'name']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'slug' => ['nullable', 'string', Rule::unique('blogs')->ignoreModel($blog)],
            'content' => ['required', 'string'],
            'brand' => ['required', 'exists:brands,id'],
            'category' => ['required', 'exists:categories,id'],
            'tags' => ['required', 'array'],
            'tags.*' => ['required', 'exists:tags,id'],
            'image' => ['file', 'image'],
            'is_archived' => ['boolean'],
            'is_featured' => ['boolean'],
        ]);


        $attributes = [
            'title' => $data['title'],
            'slug' => Str::slug($data['slug'] ? Str::lower($data['slug']) : $data['title']),
            'content' => $data['content'],
            'is_archived' => Arr::exists($data, 'is_archived') && $data['is_archived'] == 1,
            'is_featured' => Arr::exists($data, 'is_featured') && $data['is_featured'] == 1,
        ];

        if (isset($data['image'])) {
            // delete previous image & thumbnail if they exists
            if (Storage::disk()->exists($blog->image))
                Storage::disk()->delete($blog->image);

            if (Storage::disk()->exists($blog->thumbnail))
                Storage::disk()->delete($blog->thumbnail);

            $imagePath = $data['image']->store('blogs/images');

            $attributes['image'] = $imagePath;
            $attributes['image_url'] = Storage::disk()->url($imagePath);

            $thumbnail = Image::read($data['image'])
                ->scale(150, 150)
                ->encode();

            $thumbnailPath = sprintf("blogs/thumbnails/%s", basename($attributes['image']));

            if (Storage::disk()->put($thumbnailPath, $thumbnail)) {
                $attributes['thumbnail'] = $thumbnailPath;
                $attributes['thumbnail_url'] = Storage::disk()->url($thumbnailPath);
            }
        }

        $blog->brand()->associate($data['brand']);
        $blog->category()->associate($data['category']);

        $blog->update($attributes);

        $blog->tags()->sync($data['tags']);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->tags()->detach();

        if (Storage::disk()->exists($blog->image))
            Storage::disk()->delete($blog->image);

        if (Storage::disk()->exists($blog->thumbnail))
            Storage::disk()->delete($blog->thumbnail);

        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully!');
    }
}
