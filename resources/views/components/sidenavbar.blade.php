<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="left-navbar" class="d-none d-lg-block col-2 min-vh-100 border-end border-secondary-subtle text-body-emphasis">
        <div class="mt-4 pt-3">
            <a href="{{ url('/') }}" class="text-decoration-none fs-3 fw-semibold text-body-emphasis">Social App</a>
            <ul class="nav flex-column mt-5 fs-6 fw-semibold mb-5">
                <li class="nav-item pb-2">
                    <a class="nav-link text-body-emphasis" aria-current="page" href="{{ url('/') }}">
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item pb-2">
                    <a type="button" class="nav-link text-body-emphasis" class="btn" data-bs-toggle="modal" data-bs-target="#create-post">Create Post</a>
                    <x-create-post />
                </li>
                <li class="nav-item pb-2">
                    <a class="nav-link text-body-emphasis" href="/explore">Explore</a>
                </li>
                <li class="nav-item pb-2">
                    <a class="nav-link text-body-emphasis">Messages</a>
                </li>
                <li class="nav-item pb-2">
                    <a class="nav-link text-body-emphasis" href="/notifications">
                        Notifications
                        <span id="total-notif" class="badge rounded-pill text-bg-danger" style="margin-left:91px;"></span>
                    </a>
                </li>
                <li class="nav-item pb-2">
                    <a class="nav-link text-body-emphasis" href="/{{ Auth::user()->username }}">Profile</a>
                </li>
                <li class="nav-item pb-2">
                    <a class="nav-link text-body-emphasis" href="/settings">Settings</a>
                </li>
            </ul>
        </div>
    </div>
    <script src="js/script.js"></script>
    <script>
        fetch('/notification/total').then(response => response.json()).then(data => {
            document.getElementById('total-notif').innerText = parseInt(data);
        });

    </script>
</body>
</html>
