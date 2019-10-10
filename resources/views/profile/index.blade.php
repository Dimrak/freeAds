@extends('layouts.app')
{{----}}

@section('content')

    <div class="container mt-3 pt-3">

        <div class="jumbotron resize-width-40 mr-auto ml-auto">
            <h3 class="display-6 mb-3">Your personal profile</h3>
            <p class="lead"><i class="fi-cnsuxl-user-circle-solid mr-2 text-dark" style="font-size: 2em;"></i> {{$user->name}}</p>
            <hr class="my-2">
            <p> <i class="fi-xwluxl-address-card-solid mr-2" style="font-size: 2em;"></i> {{$user->email}}</p>
            <p> <i class="fi-xnsuxl-calendar-solid" style="font-size: 2em;"></i> Member since: {{$user->created_at}}</p>
            <p> <i class="fi-xnsuhl-search" style="font-size: 2em;"></i> Adverts created: {{count($adverts)}}</p>
            <a class="btn btn-primary btn-lg" href="{{route('profile.edit', $user->id)}}" role="button">Change personal details</a>
        </div>
    </div>
@endsection
