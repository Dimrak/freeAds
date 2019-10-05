<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.namechanged', 'FreeAds') }}</title>
    <!-- include summernote css/js -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

{{--    Del ajax--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="{{URL::asset('js/email.js')}}"></script>
    {{--<script type="text/javascript" src="{{URL::asset('js/yourapp.js')}}"></script>--}}


    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.10.6/jquery.typeahead.js"></script>--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />--}}
{{--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>--}}
{{--    --}}
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ URL::to('js/ajax-search.js') }}"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
    <div id="app" class="">

        <nav class="navbar navbar-expand-md navbar-light shadow-sm navbar-bg fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <img src="http://194.5.157.101/human.png" alt="" style="width: 60px;" class="mr-3 bg-dark rounded">

                    {{ config('app.namechanged', 'FreeAds') }}
                </a>

                <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left side of the navbar-->
                    @include('pages.menu.categories')

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links or Guest access -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            {{--This include when user has logged in--}}
                        @include('pages.menu.userOptions')

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="container-fluid p-0" style="margin-top: 91px">
                {{--<div class="search bg-warning w-100 p-2 border border-dark">--}}
                    {{--<a href="{{route('advert.create')}}" class="btn btn-primary my-2 d-inline">Create advert</a>--}}

                    {{--<form class="form-inline my-2 my-lg-0 d-inline" action="{{''}}" method="post">--}}
                        {{--<input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">--}}
                        {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
                    {{--</form>--}}
                {{--</div>--}}
{{--            @include('pages.jumbotron')--}}
            @yield('content')
            </div>
        </main>
    </div>
{{--Missing footer--}}
        @include('pages.footer');
</body>
</html>
