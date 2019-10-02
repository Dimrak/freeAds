@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="heading text-center pt-3 mb-5">
        <h5 class="bg-info p-2 d-inline font-weight-bold rounded ">Adverts found for {{$keyword}}</h5>
        </div>
    @foreach ($results as $advert)
        <a href="{{route('advert.show', $advert->slug)}}" class="list-group-item list-group-item-action">{{$advert->title}}</a>
        <div class="media">
            <img src="{{$advert->image}}" class="mr-3 img-thumbnail" alt="{{$advert->slug}}">
            <div class="media-body">
                <p>{!! html_entity_decode($advert->content)!!}</p>
                <p>{{$advert->price}}</p>
                <p>{{$advert->categoryName->title}}</p>
            </div>
        </div>
    @endforeach
    </div>
@endsection