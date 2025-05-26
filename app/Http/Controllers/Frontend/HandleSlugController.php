<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Postcategory;
use App\Models\Page;
use App\Models\Seosetting;

class HandleSlugController extends Controller
{
    public function handle($slug)
    {
        $seosetting = Seosetting::first();

        // Cek apakah slug cocok dengan post
        $post = Post::where('url', $slug)->where('status', 'published')->first();
        if ($post) {
            $posts = Post::where('status', 'published')
                ->where('url', '!=', $slug)
                ->latest()
                ->take(5)
                ->get();
            $categories = Postcategory::where('status', 'published')->latest()->get();
            return view('frontend.posts.show', compact('post', 'posts', 'categories', 'seosetting'));
        }

        // Cek apakah slug cocok dengan page
        $page = Page::where('url', $slug)->where('status', 'published')->first();
        if ($page) {
            return view('frontend.pages.index', compact('page', 'seosetting'));
        }

        $category = Postcategory::where('url', $slug)->where('status', 'published')->first();
        if ($category) {
            $posts = Post::where('category_id', $category->id)
                ->where('status', 'published')
                ->latest()
                ->paginate(10);
            $categories = Postcategory::where('status', 'published')->latest()->get();
            return view('frontend.posts.categories', compact('category', 'categories', 'posts', 'seosetting'));
        }

        // Tidak ditemukan
        abort(404);
    }
}
