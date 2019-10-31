@extends('layouts.app')
{{----}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('category.update', $category->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="text" name="title" value="{{$category->title}}" class="form-control mt-1">
                            <select name="parent_id">
                            @foreach($categories as $cat)
                               <option class="active" value=" {{ $cat->id }}">{{ $cat->title }}</option>
                            @endforeach
                        </select>
                        {{--<select name="attribute_sets" id="">--}}
                            {{--@foreach($attribute_sets as $attribute)--}}
                                {{--<option @if($attribute->id == $advert->attribute_set_id)--}}
                                        {{--value="{{$attribute->id}}"> {{$attribute->name}}</option>--}}
                                {{--@endif--}}
                            {{--@endforeach--}}
                        {{--</select>--}}

                        {{--<div style="height: 10px;"></div>--}}

                        {{--<select name="attribute_set">--}}
                            {{--@foreach($attribute_sets as $attributeSet)--}}
                                {{--<option @if($attributeSet->id == $advert->attribute_set_id)--}}
                                        {{--selected--}}
                                        {{--@endif--}}
                                        {{--value="{{$attributeSet->id}}">{{$attributeSet->name}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                        {{--@foreach($attributes as $attribute)--}}
                        {{--<input type="{{$attribute->attributes->type->name}}" name="attributes[{{$attribute->attributes->name}}]" placeholder="{{ucfirst($attribute->attributes->label)}}">--}}
                        {{--@endforeach--}}
                        <button class="btn alert-success mt-1">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
