@extends('layouts.app')

@section('content')
    <div class="container card p-4 shadow-sm mx-auto elegant-card fade-in-anim">
        <!-- <div class="container p-4"> -->
            <h1 class="h4 fw-bold elegant-accent mb-4"><span style="font-size:1.3em">✏️</span> Edit Postingan</h1>
            <form action="{{ route('posts.update', $post) }}" method="POST" class="space-y-3">
                @csrf @method('PUT')
                <div class="align-items-center mb-3">
                    <label for="title" class="col-sm-2 col-form-label elegant-accent">Judul</label>
                        <input id="title" name="title" class="form-control mb-1" value="{{ $post->title }}" required>
                </div>
                <div class="align-items-center mb-3">
                    <label for="content" class="col-sm-2 col-form-label elegant-accent">Konten</label>
                    <div class="">
                        <textarea id="content" name="content" class="form-control mb-1" rows="7" required>{{ $post->content }}</textarea>
                    </div>
                </div>
                <div class="text-end">
                    <button class="btn elegant-btn shadow-sm px-4 py-2">Update</button>
                </div>
            </form>
        <!-- </div> -->
    </div>
    <script src="{{ asset('js/animasi.js') }}"></script>
@endsection
