@extends('layouts.app')

@section('content')
<section class="mb-4">
    <h4 class="p-2 text-center text-white border bg-success mb-0">All adverts from {{$user->name}}, member since <small class="text-secondary">{{$user->created_at}}</small></h4>
    <div class="album py-5 bg-light">
        <div class="container">

            @if(session()->has('message'))
                <div class="alert alert-danger w-25 d-block mr-auto ml-auto" role="alert">
                    {{session()->get('message')}}
                </div>
            @endif

            <div class="row">
                @foreach($adverts as $advert)
                    @if ($advert->active != 0)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img src="{{$advert-> image}}" class="card-img-top" alt="{{$advert->slug}}">
                                <div class="card-body">
                                    <h5 class="card-title">{{$advert->title}}</h5>
                                    <p class="card-text">{!! html_entity_decode(Str::words($advert->content,12,'....'),ENT_QUOTES, 'UTF-8')!!}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('advert.show', $advert->slug)}}" class="text-decoration-none">View</a></button>
                                            @role('admin')
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{route('advert.edit', $advert->id)}}" class="text-decoration-none">Edit</a></button>
                                            @endrole
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
{{--{{$adverts->links()}}--}}
