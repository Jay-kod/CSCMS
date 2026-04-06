<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;

class GuestEngagementController extends Controller
{
    public function react(Request $request, $slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        $reactionType = $request->input('reaction_type');
        $guestToken = $request->cookie('guest_token') ?? (string) Str::uuid();

        \DB::table('news_reactions')->updateOrInsert(
            ['news_id' => $news->id, 'guest_token' => $guestToken],
            [
                'reaction_type' => $reactionType,
                'ip_address' => $request->ip(),
                'updated_at' => now(),
            ]
        );

        return response()->json(['message' => 'Reaction recorded'], 200);
    }

    public function settings() {
        return response()->json([]);
    }
    public function heroBanners() {
        return response()->json([]);
    }
    public function calendar() {
        return response()->json([]);
    }
    public function fypTopics() {
        return response()->json([]);
    }
    public function reactions() {
        return response()->json([]);
    }
    public function comments() {
        return response()->json([]);
    }
    public function postComment() {
        return response()->json([]);
    }
    public function siwesDocuments() {
        return response()->json([]);
    }
}
