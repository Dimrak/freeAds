@extends('layouts.app')
{{----}}
@section('content')
<section class="mb-4">
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @foreach($adverts as $advert)
                    @if ($advert->active != 0)
                <div class="col-md-4 border border-dark rounded">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{$advert-> image}}" class="card-img-top" alt="{{ $advert->slug}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$advert->title}}</h5>
                            <p class="card-text">{!! html_entity_decode(Str::words($advert->content,12,'....'),ENT_QUOTES, 'UTF-8')!!}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('advert.show', $advert->slug)}}" class="text-decoration-none">View</a></button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{route('advert.edit', $advert->id)}}" class="text-decoration-none">Edit</a></button>
                                </div>
                                <small class="text-muted">9 mins</small>
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
{{$adverts->links()}}

            {{--<ul class="list-group">--}}
                {{--@foreach($adverts as $advert)--}}
                {{--<li class="list-group-item">{{$advert->title}}</li>--}}
            {{--</ul>--}}
            {{--@endforeach--}}

{{--            <a href=""></a>--}}
    {{--</div>--}}


@endsection
