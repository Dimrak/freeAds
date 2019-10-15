@extends('layouts.app')

@section('content')
    @include('pages.tops')
    <div class="container w-100">
        {{--<div class="bg-info p-2 font-weight-bold rounded text-center">--}}
        <h5 class="text-center mb-2 bg-dark text-white font-weight-bolder w-75 rounded mr-auto ml-auto p-2 mt-2 resize-width">{{$keyword}}</h5>
        @foreach($results as $advert)
                @include('pages.advert-listing.template-adverts')
        @endforeach
    </div>

    <div class="pt-3 mt-5">
        {{$results->links()}}
    </div>
@endsection