@extends('layouts.app')
{{----}}

@section('content')
    @hasrole('admin')
    @include('admin.nav-admin');
    @endhasrole
        <h5>Guille apsirenk maike, dabar!!!!</h5>
    <div class="container mt-3">
        @if(session()->has('message'))
            <div class="alert alert-success w-25 d-block mr-auto ml-auto text-center" role="alert">
                {{session()->get('message')}}
            </div>
        @endif
        @if ($errors->any())
{{--            {{dd($errors)}}--}}
                <div class="alert alert-info w-25 d-block mr-auto ml-auto" role="alert">
                    @foreach ($errors->all() as $error)
                        <p>{{$error}}</p>
                        @endforeach
                </div>
            @endif

            <label for="title">Post Title</label>

            <input id="title" type="text" class="@error('title') is-invalid @enderror">

            @error('cityName')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>
                    <div class="card-body">
                        <form method="post" action=" {{ route('city.store') }}">
                            @csrf
                            <input type="text" name="cityName" placeholder="Title" class="form-control mt-1">

                            <button class="btn alert-success mt-1">Create</button>
                        </form>
                    </div>
                </div>
                @hasrole('admin')
                <a class="badge badge-success p-2 mt-2" href="{{route('admin.index')}}">Back admin page</a>
                @endrole
            </div>
        </div>
    </div>
@endsection
