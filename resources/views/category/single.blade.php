@extends('layouts.app')

@section('content')
    {{--admin options--}}
    @role('admin')
    <section id="adminCategory" class="container w-50 mb-5 text-center ">
        <div class="card w-50 mr-auto ml-auto">
            <div class="card-header bg-dark text-white">
                Admin options
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$category->title}}</h5>
                <p class="card-text"></p>
                {{--<a href="#" class="btn btn-primary">Go somewhere</a>--}}
                <a href="{{ route('category.edit', $category->slug) }}" class="btn btn-primary">Edit category</a>
            </div>
        </div>
    </section>
    @endrole


    <section id="advertsCategory" class="container bg-danger w-75">

        <ul class="list-group container bg-dark w-75">
        @foreach($category->advertsCat as $advert)
        <a href="{{route('advert.show', $advert->slug)}}" class="list-group-item list-group-item-action">{{$advert->title}}</a>
        {{--<div class="media bg-success">--}}
            <img src="{{$advert->image}}" class="mr-3 img-thumbnail" alt="{{$advert->slug}}">
            {{--<div class="media-body bg-success">--}}
                <p>{!! html_entity_decode($advert->content)!!}</p>
                <p>{{$advert->price}}</p>
            {{--</div>--}}
        {{--</div>--}}
            @endforeach
        </ul>
    </section>

@endsection


