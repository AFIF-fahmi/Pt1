<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Like;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(8);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        Post::create($request->all());
        return redirect()->route('posts.index')->with('success', 'Postingan berhasil dibuat!');
    }

    public function show(Post $post)
    {
        $post->load('comments', 'likes');
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $post->update($request->all());
        return redirect()->route('posts.index')->with('success', 'Postingan berhasil diupdate!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Postingan berhasil dihapus!');
    }

    public function dashboard()
    {
        $posts = Post::latest()->paginate(5);
        $totalPosts = Post::count();
        $totalComments = Comment::count();
        $totalLikes = Like::count();
        return view('dashboard', compact('posts', 'totalPosts', 'totalComments', 'totalLikes'));
    }
}