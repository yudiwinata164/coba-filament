<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
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
            return view('frontend.posts.show', compact('post', 'seosetting'));
        }

        // Cek apakah slug cocok dengan page
        $page = Page::where('url', $slug)->where('status', 'published')->first();
        if ($page) {
            return view('frontend.pages.index', compact('page', 'seosetting'));
        }

        // Tidak ditemukan
        abort(404);
    }
}
