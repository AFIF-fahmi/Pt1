@extends('layouts.app')

@section('content')
    <a href="{{ route('dashboard') }}" class="btn elegant-btn2 shadow-sm mb-3">&larr; Dashboard</a>
    <div class="card border-0 shadow-lg mb-4 elegant-card">
        <div class="card-body">
            <h1 class="h2 fw-bold elegant-accent mb-2">{{ $post->title }}</h1>
            <div class="text-muted mb-3">Diposting {{ $post->created_at->format('d M Y H:i') }}</div>
            <p class="text-dark fs-5 mb-4">{{ $post->content }}</p>
            <div class="d-flex align-items-center gap-3 mb-2">
                <form action="{{ route('posts.like', $post) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn elegant-btn shadow-sm">❤️ Like ({{ $post->likes->count() }})</button>
                </form>
                <span class="text-secondary">{{ $post->comments->count() }} Komentar</span>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow elegant-card mb-4">
        <div class="card-body">
            <h3 class="h5 fw-bold elegant-accent mb-3">Komentar</h3>
            @forelse($post->comments as $comment)
                <div class="mb-3 p-3 rounded bg-white shadow-sm">
                    <div class="fw-semibold elegant-accent">{{ $comment->name }}</div>
                    <div class="text-dark">{{ $comment->comment }}</div>
                    <div class="text-muted small">{{ $comment->created_at->diffForHumans() }}</div>
                </div>
            @empty
                <div class="alert alert-info">Belum ada komentar.</div>
            @endforelse
            <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-4">
                @csrf
                <input name="name" placeholder="Nama" class="form-control mb-2" required>
                <textarea name="comment" placeholder="Komentar" class="form-control mb-2" required></textarea>
                <button type="submit" class="btn elegant-btn shadow-sm">Kirim</button>
            </form>
        </div>
    </div>
    <a href="{{ route('dashboard') }}" class="btn elegant-btn2 shadow-sm mb-3">&larr; Kembali ke Dashboard</a>
@endsection