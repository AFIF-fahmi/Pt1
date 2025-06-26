<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $ip = $request->ip();
        $alreadyLiked = $post->likes()->where('ip_address', $ip)->exists();
        if (!$alreadyLiked) {
            $post->likes()->create(['ip_address' => $ip]);
        }
        return back();
    }
}