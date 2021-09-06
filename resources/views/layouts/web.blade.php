<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Lybrarie') }} | Your favorite book store</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/web.css') }}" rel="stylesheet">
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/library') }}">
                        Profile
                        <span class="badge badge-dark">{{ Auth::user()->wallet->credits }}</span>
                    </a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="container">
            <h3 class="m-b-md text-center mt-5">
                Welcome to Lybrarie Bookstore
            </h3>
            @if ($message = Session::get('danger'))
                <div class="alert alert-danger bg-danger text-white alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {!! $message !!}
                </div>
            @endif
            @yield('content')
        </div>
    </div>

    @yield('scripts')
</body>

</html>
