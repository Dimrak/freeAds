@extends('layouts.app')
{{----}}

@section('content')
    @hasrole('admin')
    @include('admin.nav-admin');
    @endhasrole
    <div class="container mt-3">
        @if(session()->has('message'))

            {{session()->get('message')}}

            @endif
            @if ($errors->any())
                {{--            {{dd($errors)}}--}}
                <div class="alert alert-danger w-75 d-block mr-auto ml-auto" role="alert">
                    @foreach ($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create category</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('category.store') }}">
                            @csrf
                            <input type="text" name="title" placeholder="Title" class="form-control mt-1">
                            <input type="text" name="image" class="form-control mt-1" placeholder="image">
                            <select name="parent_id" class="form-control mt-1">
                                <option class="form-control mt-1">Choose a category</option>
                                <option value="0">New category</option>
                                @foreach($categories as $category)
                                    <option class="bg-success text-white" value=" {{ $category->id }}">Main category - {{ $category->title}}</option>
                                @foreach ($category->subCategories as $subcat)
                                    <option class="" value="{{ $subcat->id }}">{{ $subcat->title}}</option>
                                    @endforeach
                                @endforeach
                            </select>
                            <select name="attribute" id="" class="form-control mt-1">
                                <option value="0">Choose attribute family</option>
                                @foreach ($att_set as $set)
                                    <option value="{{$set->id}}" class="">{{$set->name}}</option>
                                @endforeach
                            </select>
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
