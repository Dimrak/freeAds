@extends('layouts.app')
{{--@exclude('jumbotron')--}}
@section('content')
    @role('admin')
    @include('admin.nav-admin');
{{--    @include('admin2.nav-admin');--}}
    <div class="container adminPanel mt-3">

            <div class="jumbotron mt-3">
                <h1 class="display-4">Hello, admin!</h1>
                <p class="lead">Week statistics;</p>
                <hr class="my-4">
                <p>There are a total of {{count($adverts)}} new adverts</p>
                <p>There are a total of {{count($users)}} new users registered
                {{--<div class="w-50 mr-auto ml-auto ">--}}
                    {{--{!! $chartjs->render() !!}--}}
                {{--</div>--}}
            </div>

{{--            <div class="list-group">--}}
{{--                <a href="#" class="list-group-item list-group-item-action active text-center font-weight-bold text-uppercase">--}}
{{--                    Admin panel--}}
{{--                </a>--}}
{{--                <a href="{{route('category.create')}}" class="list-group-item list-group-item-action">Create category</a>--}}
{{--                <a href="{{route('advert.create')}}" class="list-group-item list-group-item-action">Create advert</a>--}}
{{--                <a href="{{route('city.create')}}" class="list-group-item list-group-item-action">Add city</a>--}}
{{--                <a href="{{route('admin.create')}}" class="list-group-item list-group-item-action">Message-center</a>--}}
{{--                <a href="{{route('admin.adverts')}}" class="list-group-item list-group-item-action">All adverts</a>--}}
{{--                <a href="{{route('admin.categories')}}" class="list-group-item list-group-item-action">All Categories</a>--}}
{{--                <a href="{{route('admin.attributes')}}" class="list-group-item list-group-item-action">Attributes</a>--}}
{{--            </div>--}}
    <a class="badge badge-success p-2 mt-2" href="{{url('/')}}">Back home page</a>
    @endrole
    </div>

    <a href=""></a>




@endsection
{{--<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.2/Chart.min.js"></script>--}}
