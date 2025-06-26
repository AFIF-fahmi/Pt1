<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required',
            'comment' => 'required',
        ]);
        $post->comments()->create($request->all());
        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}