@extends('layouts.app')
@section('content')
    <section class="mb-4">
        <div class="album py-5 bg-light">
            <div class="container">
                <h4 class="text-center">Active adverts</h4>
                <div class="row mb-5" style="">
                    @foreach($advertsAct as $advert)
                        <div class="col-md-2 bg-success p-3">
                            <div class="card mb-4 shadow-sm">
                                <img src="{{$advert-> image}}" class="card-img-top" alt="{{ $advert->slug}}" style="height: 100px">
                                <div class="card-body">
                                    <h5 class="card-title">{{$advert->title}}</h5>
{{--                                    <p class="card-text">{!! html_entity_decode(Str::words($advert->content,5,'....'),ENT_QUOTES, 'UTF-8')!!}</p>--}}
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><a
                                                    href="{{ route('advert.show', $advert->slug)}}"
                                                    class="text-decoration-none">View</a></button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><a
                                                    href="{{route('advert.edit', $advert->id)}}"
                                                    class="text-decoration-none">Edit</a></button>
                                        </div>
                                    </div>
                                    <form action="{{action('AdvertController@destroy',['id'=>$advert->id])}}"
                                          method="Post">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-sm p-1 bg-danger text-white mt-3 text-center" name="submit" value="Disable">
                                    </form>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <h4 class="text-center">Disabled adverts</h4>
                <div class="row">
                    @foreach($advertsDis as $advert)
                        <div class="col-md-2 bg-dark p-3">
                            <div class="card mb-4 shadow-sm">
                                <img src="{{$advert-> image}}" class="card-img-top" alt="{{ $advert->slug}}" style="height: 100px">
                                <div class="card-body">
                                    <h5 class="card-title">{{$advert->title}}</h5>
{{--                                    <p class="card-text">{!! html_entity_decode(Str::words($advert->content,12,'....'),ENT_QUOTES, 'UTF-8')!!}</p>--}}
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><a
                                                    href="{{ route('advert.show', $advert->slug)}}"
                                                    class="text-decoration-none">View</a></button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><a
                                                    href="{{route('advert.edit', $advert->id)}}"
                                                    class="text-decoration-none">Edit</a></button>
                                        </div>
                                        {{--<form action="{{action('AdvertController@destroy',['id'=>$advert->id])}}"--}}
                                        {{--<form action="{{route('AdvertController@disable', $advert->id)}}"--}}
                                              {{--method="post">--}}
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-sm p-1 bg-danger text-white mt-3 text-center" value="Disable">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="badge badge-success p-2 mt-2" href="{{route('admin.index')}}">Back admin page</a>
                <a class="badge badge-warning p-2" href="{{route('category.create')}}">Create advert</a>
            </div>
        </div>
    </section>
@endsection
