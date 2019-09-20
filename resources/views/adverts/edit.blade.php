@extends('layouts.app')
{{----}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form method="post" action="{{ route('advert.update', $advert->id) }}">
                            @csrf
                            @method('PUT')
                            <label for="title" class="font-weight-bold mt-1 p-2 rounded">Title</label>
                            <input type="text" name="title" value="{{$advert->title}}" class="form-control">
                            <label for="content" class="font-weight-bold mt-1 p-2 rounded">Content</label>
                            <textarea name="content_text" class="form-control mt-1" value="{{$advert->content}}" style="min-height: 150px;">{{$advert->content}}</textarea>
                            <label for="price" class="font-weight-bold mt-1 p-2 rounded">Price</label>
                            <input type="number" name="price" class="form-control mt-1" value="{{$advert->price}}">
                            <label for="image" class="font-weight-bold mt-1 p-2 rounded">Image</label>
                            <input type="text" name="image" class="form-control mt-1" value="{{$advert->image}}">
                            <div style="height: 10px;"></div>
                            <p>Extra filters: </p>
                            <!--attributes-->
                            @foreach($attributes as $single)
                                {{--{{$counter++}}--}}
{{--                            {{dd($attributes)}}--}}
                                <label for="{{$single->attributes->name}}">{{ucfirst($single->attributes->name)}}</label><br>
                                <input type="radio" name="att{{$single->attribute_id}}" value="yes">yes
                                <input type="radio" class="" name="att{{$single->attribute_id}}" value="no">no<br>
{{--                                <label for="{{$single->attributes->name}}">No</label>--}}
                            @endforeach
                            <button class="btn alert-success mt-1">Update</button>
                        </form>
                        <a href="{{  route('advert.index') }}" class="nav-link btn btn-outline-dark mt-3">Go back to advert list</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
