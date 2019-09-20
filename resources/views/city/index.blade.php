@extends('layouts.app')
{{----}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Skelbimai</div>

                    <div class="card-body">
                        @foreach($cities as $city)
                            <div class="card">
                                {{--                                {{ route('advert.show/$advert->id') }}--}}
                                <a href="{{ route('advert.show', $city->id)}}" class="text-body"
                                   style="text-decoration: none"></a>
                                <div class="card-body">
                                    <div class="card-columns">{{ $city->name}}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
