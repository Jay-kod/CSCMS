<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function show($slug)
    {
        $news = News::where('slug', $slug)->where('is_published', true)->firstOrFail();
        
        return response()->json([
            'data' => $news
        ]);
    }

    public function index() {
        return response()->json([]);
    }
}
