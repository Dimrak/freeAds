@extends('layouts.app')
@section('content')
    <div class="container w-25">
        @if(session()->has('message'))
            {{session()->get('message')}}
        @endif
        <div class="box bg-dark p-3">
            <h4 class="text-white">Family attributess</h4>
            <ul class="list-group bg-dark">
                @foreach($att_set as $setter)
                    <div class="btn-group dropright w-25">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            {{$setter->name}}
                        </button>
                        <div class="dropdown-menu">
                            @foreach($attributesRela as $relation)
                                @if($relation->attribute_set_id == $setter->id)
                                    <li>{{$relation->attributes->name}}</li>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="container bg-dark w-25 mt-2 rounded p-3">
        <h3 class="text-white p-1 text-center">Add attribute family</h3>
        <form method="post" action="{{ route('attributes.store') }}">
            @csrf
            <input type="text" name="name" placeholder="Name" class="form-control mt-1">
            <button class="btn alert-success mt-2 mb-2">Create</button>
        </form>
    </div>
@endsection
