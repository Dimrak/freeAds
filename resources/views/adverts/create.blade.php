@extends('layouts.app')
{{----}}

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
{{--            <div class="card-header">{{ $title }}</div>--}}
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><small class="bg-success p-1 mr-1 rounded">New</small>{{ $title }} </div>
                    <div class="card-body">
                        <form method="post" action=" {{ route('advert.store') }}" enctype="multipart/form-data">
                            @csrf
                            <select name="category" id="">
                                <option class="form-control mt-1">Choose the type</option>
                                @foreach($secondSubCategories as $cat)
                                    <option value=" {{ $cat->id }}">{{$cat->title }}</option>
                                @endforeach
                            </select>
                            <input type="text" name="title" placeholder="Title" class="form-control mt-1">
                            <textarea name="content_text" id="content" class="form-control mt-1"
                                      placeholder="Enter the advert content"></textarea>
                            <input type="number" name="price" class="form-control mt-1" placeholder="price">
                            <input type="text" name="image" class="form-control mt-1" placeholder="image">

                            <select name="city">
                                <option class="form-control mt-1">Choose a city</option>
                                @foreach($cities as $city)
                                    <option value=" {{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @foreach($attributeSetRel as $single)
                                <label for="{{$single->attributes->name}}">{{ucfirst($single->attributes->name)}}</label><br>
                                <input type="radio" name="att{{$single->attribute_id}}" value="yes">yes
                                <input type="radio" class="" name="att{{$single->attribute_id}}" value="no">no<br>
                            @endforeach
                            <input type="hidden" name="category" value="{{$category_id}}">
                            <button class="btn alert-success mt-1">Create</button>
                        </form>
                    </div>
                </div>
        </div>
        </div>
    </div>
@endsection
