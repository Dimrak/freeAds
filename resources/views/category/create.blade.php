@extends('layouts.app')
{{----}}

@section('content')
    <div class="container">
        @if(session()->has('message'))

            {{session()->get('message')}}

            @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create category</div>

                    <div class="card-body">
                        {{--                        route specified with blade syntax--}}
                        <form method="post" action="{{ route('category.store') }}">
                            @csrf
                            <input type="text" name="title" placeholder="Title" class="form-control mt-1">
                            <input type="text" name="image" class="form-control mt-1" placeholder="image">

                            <select name="parent_id" class="form-control mt-1">
                                <option class="form-control mt-1">Choose a category</option>
                                <option value="0">New category</option>
                                @foreach($categories as $category)
                                    <option value=" {{ $category->id }}">{{ $category->title}}</option>
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
