<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seosetting;
use App\Models\Post;
use Illuminate\Support\Facades\App;

class HomepageController extends Controller
{
        public function index()
    {
        $seosetting = Seosetting::first();
        $locale = App::getLocale();
        $posts = Post::where('status', 'published')->where('language', $locale)->latest()->take(4)->get();

        return view('frontend/homepage/index', compact('seosetting','posts'));
    }
}
