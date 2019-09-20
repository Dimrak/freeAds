@extends('layouts.app')
{{----}}

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>
                    <div class="card-body">
                        <form method="post" action=" {{ route('advert.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="title" placeholder="Title" class="form-control mt-1">
                            <textarea name="content_text" id="content" class="form-control mt-1" placeholder="Enter the advert content"></textarea>
                            <input type="number" name="price" class="form-control mt-1" placeholder="price">
                            <input type="text" name="image" class="form-control mt-1" placeholder="image">

                            <select name="city">
                                <option class="form-control mt-1">Choose a city</option>
                                @foreach($cities as $city)
                                    <option value=" {{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            <select name="category" id="">
                                <option class="form-control mt-1">Choose a category</option>
                                @foreach($categories as $cat)
                                    <option value=" {{ $cat->id }}">{{$cat->title }}</option>
                                    @endforeach
                            </select>
                            {{--@foreach($category as $cat)--}}
                            {{--<input type="hidden" value="{{$cat->id}}" name="cat_id">--}}
                            {{--@endforeach--}}
                            {{--<div style="height: 10px;"></div>--}}
                            {{--<p>Extra filters: </p>--}}
                            {{--<!--attributes-->--}}
                            {{--@foreach($attributes as $single)--}}
                                {{--<input type="checkbox" name="{{ucfirst($single->attributes->name)}}" value="{{$single->id}}"> {{ucfirst($single->attributes->name)}}<br>--}}
                                {{--@endforeach--}}
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
