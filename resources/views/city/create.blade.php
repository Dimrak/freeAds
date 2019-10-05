@extends('layouts.app')
{{----}}

@section('content')
    @hasrole('admin')
    @include('admin.nav-admin');
    @endhasrole
    <div class="container mt-3">
        @if(session()->has('message'))
            <div class="alert alert-success w-25 d-block mr-auto ml-auto text-center" role="alert">
                {{session()->get('message')}}
            </div>
        @endif
        @if ($errors->any())
{{--            {{dd($errors)}}--}}
                <div class="alert alert-danger w-75 d-block mr-auto ml-auto" role="alert">
                    @foreach ($errors->all() as $error)
                        <p>{{$error}}</p>
                        @endforeach
                </div>
            @endif
{{--            @error('cityName')--}}
{{--            {{dd($message  )}}--}}
{{--            <div class="alert alert-danger w-25 mr-auto ml-auto" role="alert">{{ $message }}</div>--}}
{{--            @enderror--}}

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>
                    <div class="card-body">
                        <form method="post" action=" {{ route('city.store') }}">
                            @csrf
                            <input type="text" name="name" placeholder="Title" class="form-control mt-1" autofocus>

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
