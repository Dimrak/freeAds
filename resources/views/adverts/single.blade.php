@extends('layouts.app')

@section('content')
{{--        @if(Auth:user()) This to check if the user is connected --}}
<div class="container">
    <div class="card mb-3 mr-auto ml-auto mt-3 border-2 border-dark p-2" style="max-width: 600px;">
        <div class="row no-gutters">
            <div class="col-md-4 border-primary">
                <img src="{{ $advert->image}}" class="img-fluid" alt="{{ $advert->slug}}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $advert->title}}</h5>
                    <p class="card-text">{!! html_entity_decode($advert->content,ENT_QUOTES, 'UTF-8')!!}</p>
                    <p class="card-text">Price: {{ $advert-> price}} €</p>
                    <p class="card-text">Person of contact: <a href="{{route('advert.byUser', $user->id)}}">{{ ucfirst($user->name)}} </a> </p>
                    <p class="card-text"><small class="text-muted">Last change: {{$advert->updated_at}}</small></p>
                </div>
            </div>

        </div>
            <div class="card-header">Comments</div>
            <div class="card-body">

                @foreach($advert->comments as $comment)
                    <h5 class="card-title">{{$comment->user->name}}</h5>
                    <p class="card-text">{{$comment->content}}</p>
                @endforeach
            <form method="post" action="{{ route('comment.store') }}">
                @csrf
                <textarea name="comment_text" cols="30" rows="2" class="commentText"></textarea>
                <small id="commentMessage" class="form-text text-muted">Anything you want to add?</small>
                <input type="hidden" value="{{$advert->id }}" name="advertId">
                <button class="btn alert-success mt-1">Send comment</button>
            </form>

        </div>
    </div>
</div>
    <div class="options mr-auto ml-auto bg-dark text-center w-25 rounded p-2 border border-white">
        @if(Auth::user()->id == $advert->user_id || Auth::user()->hasRole('admin'))
{{--            @hasrole('admin')--}}
        <a href="{{ route('advert.edit', $advert->id) }}" class="nav-link btn btn-outline-primary mt-2 mb-2">Edit advert</a>

        <form method="post" action="{{ route('advert.disable', $advert->id) }}" class="">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-warning mb-4">Tun off advert</button>
        </form>
        @endif
{{--        @endhasrole--}}
            <form method="post" action="{{ route('advert.destroy', $advert->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mb-2">Remove advert</button>
            </form>
    </div>
    <div class="back mr-auto ml-auto w-25">
        <a href="{{  route('advert.index') }}" class="nav-link btn btn-outline-light mb-2 mt-2 text-center">Go back to advert list</a>
    </div>



@endsection

