@extends('layouts.app')

@section('content')
<div class="container card p-4 shadow-sm mx-auto elegant-card fade-in-anim">
    <h1 class="h4 fw-bold elegant-accent mb-4"><span style="font-size:1.3em">📝</span> Buat Postingan Baru</h1>
    <form action="{{ route('posts.store') }}" method="POST" class="space-y-3">
        @csrf
        <div class="align-items-center mb-3">
            <label for="title" class="col-sm-2 col-form-label elegant-accent">Judul</label>
            <input id="title" name="title" class="form-control mb-1" placeholder="Judul" required>
        </div>
        <div class="align-items-center mb-3">
            <label for="content" class="col-sm-2 col-form-label elegant-accent">Konten</label>
            <div class="">
                <textarea id="content" name="content" class="form-control mb-1" placeholder="Isi" rows="7" required></textarea>
            </div>
        </div>
        <div class="text-end">
            <button class="btn elegant-btn shadow-sm px-4 py-2">Simpan</button>
        </div>
    </form>
</div>
<script src="{{ asset('js/animasi.js') }}"></script>
@endsection