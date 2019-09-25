@extends('layouts.app')
{{--@exclude('jumbotron')--}}
@section('content')
    @role('admin')
    <div class="container adminPanel">
        @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{session()->get('message')}}
        </div>
        @endif
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active text-center font-weight-bold text-uppercase">
                    Admin panel
                </a>
                <a href="{{route('category.create')}}" class="list-group-item list-group-item-action">Create category</a>
                <a href="{{route('advert.create')}}" class="list-group-item list-group-item-action">Create advert</a>
                <a href="{{route('city.create')}}" class="list-group-item list-group-item-action">Add city</a>
                <a href="{{route('admin.create')}}" class="list-group-item list-group-item-action">Message-center</a>
                <a href="{{route('admin.adverts')}}" class="list-group-item list-group-item-action">All adverts</a>
                <a href="{{route('admin.categories')}}" class="list-group-item list-group-item-action">All Categories</a>
                <a href="{{route('admin.attributes')}}" class="list-group-item list-group-item-action">Attributes</a>
            </div>
            <a class="badge badge-success p-2 mt-2" href="{{route('category.index')}}">Back home page</a>

    </div>
    @endrole







@endsection
