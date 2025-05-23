<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seosetting;
use App\Models\Post;

class HomepageController extends Controller
{
        public function index()
    {
        $seosetting = Seosetting::first();
        $posts = Post::where('status', 'published')->latest()->take(4)->get();

        return view('frontend/homepage/index', compact('seosetting','posts'));
    }
}
