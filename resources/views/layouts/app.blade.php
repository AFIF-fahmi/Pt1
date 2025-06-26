<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Blog Pribadi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="min-h-screen elegant-bg">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-8">
        <div class="container">
            <a class="navbar-brand fw-bold elegant-accent fluid-title" href="{{ route('dashboard') }}">Blog Pribadi</a>
            <ul class="navbar-nav ms-auto gap-2 flex-row">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('dashboard') ? 'active fw-bold elegant-accent' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('posts.index') ? 'active fw-bold elegant-accent' : '' }}" href="{{ route('posts.index') }}">Postingan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('posts.create') ? 'active fw-bold elegant-accent' : '' }}" href="{{ route('posts.create') }}">Buat Post</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container max-w-5xl mx-auto py-4 card p-4 shadow-lg">
        @if(session('success'))
            <div class="alert alert-success mb-4 shadow elegant-shadow">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>