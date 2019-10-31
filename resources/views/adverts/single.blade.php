@extends('layouts.app')

@section('content')

<div class="container pt-2">
    @if(session()->has('message'))
        <div class="alert alert-danger w-75 d-block mr-auto ml-auto text-center resize-width-40" role="alert">
            {{session()->get('message')}}
        </div>
    @endif
        @if(session()->has('message-correct'))
            <div class="alert alert-success w-75 d-block mr-auto ml-auto text-center resize-width-40" role="alert">
                {{session()->get('message-correct')}}
            </div>
        @endif
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 mt-2 w-100 mr-auto ml-auto custom-width-cats">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('category.show', $cat)}}">{{ucfirst($cat)}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('category.showSub', $sub)}}">{{ucfirst($sub)}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('category.showSubSub', $secondSub)}}">{{ucfirst($secondSub)}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('advert.show', $advert->title)}}">{{ucfirst($advert->title)}}</a></li>
        </ol>
    </nav>
    @if($advert->active === 0)
        <div class="card mb-3 mr-auto ml-auto mt-3 border-2 border-dark p-2" style="max-width: 600px;">
            <h4 class="bg-danger pr-2 pl-2 w-50 rounded p-2">Advert not active</h4>
        @else
    <div class="card mb-3 mr-auto ml-auto mt-3 border-2 border-dark p-2" style="max-width: 600px;">
        @endif
        <div class="row no-gutters">
            <div class="col-md-4 border-primary">
                <img src="{{ $advert->image}}" class="img-fluid" alt="{{ $advert->slug}}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $advert->title}}</h5>
                    <p class="card-text">{!! html_entity_decode($advert->content,ENT_QUOTES, 'UTF-8')!!}</p>
                    <p class="card-text">Price: {{ $advert-> price}} &euro;</p>
                    <p class="card-text">Location: {{ $advert->cityName->name}}</p>
                    <p class="card-text"><small class="text-muted">Last change: {{$advert->updated_at}}</small></p>
                    @foreach($attributes as $single)
                        <div class="mb-2">
                        <label class="d-inline mr-2 bg-dark p-1 rounded text-white font-weight-bolder" for="{{$single->attributes->name}}">{{ucfirst($single->attributes->name)}}: </label>
                        <p class="d-inline">{{$single->value}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
            <div class="card-header">Comments</div>
            <div class="card-body">
                @foreach($advert->comments as $comment)
                    @if ($comment->user->id == $advert->user_id)
                        <h6><i class="fi-snsuxl-user-tie-circle"></i>Advert owner</h6>
                        <h5 class="card-title">{{$comment->user->name}}</h5>
                        <p class="card-text">{{$comment->content}}</p>
                        @else
                        <h5 class="card-title">{{$comment->user->name}}</h5>
                        <p class="card-text">{{$comment->content}}</p>
                    @endif
                @endforeach
                @if($advert->active === 0)
                    <!--no form when disabled-->
                    @else
            <form method="post" action="{{ route('comment.store') }}">
                @endif
                @csrf
                @method('POST')
                <textarea name="comment" cols="30" rows="2" class="comment-text"></textarea>
                <small id="commentMessage" class="form-text text-muted">Anything you want to add?</small>
                <input type="hidden" value="{{$advert->id }}" name="advertId">
{{--                <input type="hidden" value="{{$advert->id }}" name="comment2">--}}
                <button class="btn alert-success mt-1">Send comment</button>
            </form>
        </div>
    </div>
</div>
    <div class="options mr-auto ml-auto bg-dark text-center w-25">
        @hasanyrole('admin|client')
        <a href="{{ route('advert.edit', $advert->id) }}" class="nav-link">Edit advert</a>
        <form method="post" action="{{ route('advert.disable', $advert->id) }}">
            @csrf
            @method('POST')
            <button type="submit" class="btn alert-danger">Tun off advert</button>
        </form>
        @endhasanyrole
        <a href="{{  url('/') }}" class="nav-link">Go back to advert list</a>
    </div>

@endsection

