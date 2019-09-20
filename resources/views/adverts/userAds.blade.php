@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="text-center">Pending to display here details about the seller</h4>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <ul>
                        @foreach($adverts as $advert)
                            <a href="{{route('advert.show', $advert->slug)}}">
                                <li>{{$advert->title}}</li>
                            </a>
                            @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
