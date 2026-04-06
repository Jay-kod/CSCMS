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
}
