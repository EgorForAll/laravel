<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="{{route('about.post')}}">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('contact.post')}}">Contacts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('post.index')}}">Posts</a>
            </li>
            @can('view', auth()->user())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.index')}}">Admin</a>
                </li>
            @endcan
        </ul>
    </nav>
    @yield('content')
</div>
</body>
</html>
