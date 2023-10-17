<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
{{--    @toastr_css--}}

</head>
<body>
<div class="container-fluid">
    <!-- First section -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <h1>
                <a href="#" class="navbar-brand">Simon's Tech School Forum</a>
            </h1>
            <form action="#" class="form-inline mr-3 mb-2 mb-sm-0">
                <input type="text" class="form-control" placeholder="search"/>
                <button type="submit" class="btn btn-success">Search Forum</button>
            </form>
            {{--            ĐĂNG NHẬP _ ĐĂNG XUẤT--}}
            @guest
                <a href="{{ route('login')}}" class="nav-link nav-item text-white btn btn-outline-info">Login</a>
                <a href="{{ route('register')}}" class="nav-link nav-item text-white btn btn-info">Register</a>
            @endguest
            <a class="nav-link nav-item text-white">
            @auth
                <form id="logout-form" action="{{route('logout')}}" method="POST" >
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                </form>
            @endauth
            </a>
            {{--            ĐĂNG NHẬP _ ĐĂNG XUẤT--}}

        </div>
    </nav>

    <!-- first section end -->
</div>
<div class="container">
    <nav class="breadcrumb">
        <a href="#" class="breadcrumb-item active"> Dashboard</a>
    </nav>
@yield('content')
</div>
<div class="container-fluid">
    <footer class="small bg-dark text-white">
        <div class="container py-4">
            <ul class="list-inline mb-0 text-center">
                <li class="list-inline-item">
                    &copy; 2021 Simon's tech school forum
                </li>
                <li class="list-inline-item">All rights reserved</li>
                <li class="list-inline-item">Terms and privacy policy</li>
            </ul>
        </div>
    </footer>
</div>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
{{--@jquery--}}
{{--@toastr_js--}}
</html>
