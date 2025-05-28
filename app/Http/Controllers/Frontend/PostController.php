<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Postcategory;
use App\Models\Seosetting;
use Illuminate\Support\Facades\App;

class PostController extends Controller
{
    public function index()
    {
        $seosetting = Seosetting::first();
        $locale = App::getLocale(); // 'id' atau 'en', sesuai middleware SetLocale

        // Filter post published berdasarkan bahasa aktif
        $posts = Post::where('status', 'published')
                    ->where('language', $locale)
                    ->latest()
                    ->paginate(10);
        $categories = Postcategory::where('status', 'published')->where('language', $locale)->latest()->get();
        
        return view('frontend.posts.index', compact('posts', 'categories', 'seosetting'));
    }
    
    
    public function show($slug)
    {
        $seosetting = Seosetting::first();
        // Ambil post by slug
        $post = Post::where('url', $slug)->where('status', 'published')->firstOrFail();

        return view('frontend.posts.show', compact('post', 'seosetting'));
    }
}
