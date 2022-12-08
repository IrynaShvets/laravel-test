<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title-block')</title>

    <!-- Fonts {{ config('app.name', 'Laravel') }}-->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="{{asset('https://fonts.bunny.net/css?family=Nunito')}}" rel="stylesheet">

    <!-- Scripts -->
    {{-- 'resources/sass/app.scss' --}}
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">


        <nav class="navbar navbar-expand-md {{-- navbar-light --}} bg-warning bg-gradient shadow-sm">
            <div class="d-flex flex-column flex-md-row align-items-center p-3">
                {{--  <a class="navbar-brand" href="{{ url('/') }}"> --}}
                <a href="{{ url('/') }}"
                    class="navbar-brand d-flex align-items-center text-dark text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2"
                        viewBox="0 0 118 94" role="img">
                        <title>Bootstrap</title>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"
                            fill="currentColor"></path>
                    </svg>
                    <span class="fs-4">itPretty</span>
                    {{--   </a> --}}
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        {{-- @include('inc.header') --}}
                        @can('view', auth()->user())
                            <li>
                                <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('admin') }}">Admin</a>
                            </li>
                        @endcan

                        <li>
                            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('home') }}">Home</a>
                        </li>
                        <li>
                            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('main') }}">Main</a>
                        </li>
                        <li>
                            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('post') }}">Create
                                post</a>
                        </li>
                        <li>
                            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('post-data') }}">All
                                posts</a>
                        </li>
                        <li>
                            <a class="me-3 py-2 text-dark text-decoration-none"
                                href="{{ route('product') }}">Product</a>
                        </li>
                        <li>
                            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('product-data') }}">All
                                product</a>
                        </li>
                        <li>
                            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('about') }}">About
                                us</a>
                        </li>
                        <li>
                            <a class="me-3 py-2 text-dark text-decoration-none"
                                href="{{ route('contact') }}">Contacts</a>
                        </li>
                        <li>
                            <a class="me-3 py-2 text-dark text-decoration-none"
                                href="{{ route('contact-data') }}">Messages</a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>



                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if (Request::is('/'))
            @include('inc.hero')
        @endif

        <main class="py-4">
            {{--  @yield('content') --}}

            <div class="container mt-5">
                @include('inc.messages')
                <div class="row">
                    <div class="col-8">
                        @yield('content')
                    </div>
                    <div class="col-4">
                        @include('inc.aside')
                    </div>
                </div>
            </div>
        </main>
        @include('inc.footer')
    </div>
</body>

</html>
