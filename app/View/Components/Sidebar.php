<?php

namespace App\View\Components;

use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $CategoryCount = Category::count();
        $brandsCount = Brand::count();
        $tagsCount = Tag::count();
        $blogsCount = Blog::count();

        view()->share(compact(
            'CategoryCount',
            'brandsCount',
            'tagsCount',
            'blogsCount',
        ));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar');
    }
}
