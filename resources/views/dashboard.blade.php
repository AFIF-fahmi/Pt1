@extends('layouts.app')

@section('content')
    <div class="mb-8">
        <h1 class="display-5 fw-bold elegant-accent mb-2 fluid-title">Dashboard Blog</h1>
        <p class="lead text-secondary">Selamat datang di dashboard blog pribadimu!</p>
    </div>
    <div class="row g-3 mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm elegant-card">
                <div class="card-body text-center">
                    <div class="h2 fw-bold elegant-accent pop-text-anim">{{ $totalPosts }}</div>
                    <div class="text-muted">Total Postingan</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm elegant-brown">
                <div class="card-body text-center">
                    <div class="h2 fw-bold pop-text-anim">{{ $totalComments }}</div>
                    <div class="text-light">Total Komentar</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm elegant-card border elegant-border">
                <div class="card-body text-center">
                    <div class="h2 fw-bold elegant-accent pop-text-anim">{{ $totalLikes }}</div>
                    <div class="text-muted">Total Like</div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 fw-bold elegant-accent mb-0">Postingan Terbaru</h2>
        <a href="{{ route('posts.create') }}" class="btn elegant-btn shadow-sm px-4 py-2">+ Buat Postingan</a>
    </div>
    <div class="row g-3">
        @forelse($posts as $post)
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100 elegant-card fade-in-anim">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title elegant-accent mb-2">{{ $post->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($post->content, 80) }}</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-end mt-3">
                            <small class="text-secondary">{{ $post->created_at->diffForHumans() }}</small>
                            <div class="btn-group gap-1">
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-view btn-sm">Lihat</a>
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-edit btn-sm">Edit</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-delete btn-sm">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">Belum ada postingan.</div>
            </div>
        @endforelse
    </div>
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
    <script src="{{ asset('js/animasi.js') }}"></script>
    @endsection


