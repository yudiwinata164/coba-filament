<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Postcategory;
use App\Models\Page;
use App\Models\Seosetting;
use Illuminate\Support\Facades\App;

class HandleSlugController extends Controller
{
    public function handle($slug)
    {
        $seosetting = Seosetting::first();

        // Cek apakah slug cocok dengan post
        $post = Post::where('url', $slug)->where('status', 'published')->first();
        if ($post) {
            $locale = App::getLocale();
            $posts = Post::where('status', 'published')
                ->where('language', $locale)
                ->where('url', '!=', $slug)
                ->latest()
                ->take(5)
                ->get();
            $categories = Postcategory::where('status', 'published')->where('language', $locale)->latest()->get();
            return view('frontend.posts.show', compact('post', 'posts', 'categories', 'seosetting'));
        }

        // Cek apakah slug cocok dengan page
        $page = Page::where('url', $slug)->where('status', 'published')->first();
        if ($page) {
            return view('frontend.pages.index', compact('page', 'seosetting'));
        }

        $locale = App::getLocale();
        $category = Postcategory::where('url', $slug)->where('status', 'published')->where('language', $locale)->first();
        if ($category) {
            $locale = App::getLocale();
            $posts = Post::where('category_id', $category->id)
                ->where('language', $locale)
                ->where('status', 'published')
                ->latest()
                ->paginate(10);
            $categories = Postcategory::where('status', 'published')->where('language', $locale)->latest()->get();
            return view('frontend.posts.categories', compact('category', 'categories', 'posts', 'seosetting'));
        }

        // Tidak ditemukan
        abort(404);
    }
}
