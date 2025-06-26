@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold elegant-accent fluid-title">Daftar Postingan</h1>
        <a href="{{ route('posts.create') }}" class="btn elegant-btn shadow-sm">+ Buat Postingan</a>
    </div>
    <div class="row g-3">
        @foreach($posts as $post)
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100 elegant-card fade-in-anim">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title elegant-accent mb-2">{{ $post->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($post->content, 120) }}</p>
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
        @endforeach
    </div>
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
    <script src="{{ asset('js/animasi.js') }}"></script>
@endsection