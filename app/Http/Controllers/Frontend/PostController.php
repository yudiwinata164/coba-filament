<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Seosetting;

class PostController extends Controller
{
    public function index()
    {
        $seosetting = Seosetting::first();
        // Ambil semua post published
        $posts = Post::where('status', 'published')->latest()->get();
        
        return view('frontend.posts.index', compact('posts', 'seosetting'));
    }
    
    
    public function show($slug)
    {
        $seosetting = Seosetting::first();
        // Ambil post by slug
        $post = Post::where('url', $slug)->where('status', 'published')->firstOrFail();

        return view('frontend.posts.show', compact('post', 'seosetting'));
    }
}
