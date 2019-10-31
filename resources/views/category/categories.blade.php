@extends('layouts.app')
@section('content')
    <div class="container adminPanel categoryPanel">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">Categories</a>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    @foreach($categories as $category)
                        @if($category->parent_id == 0)
                            <a href="{{route('category.show', $category->slug)}}"><strong>{{$category->title}}</strong></a>
                </li>
                <li class="breadcrumb-item" aria-labelledby="navbarDropdown">
                    @foreach($category->subCategories as $subCategory)
                        <a class="dropdown-item" href={{route('category.show', $subCategory->slug)}}>{{$subCategory->title}}</a>
                    @endforeach
                </li>
                @endif
                @endforeach
            </ol>
        </nav>
        <a class="badge badge-success" href="{{route('category.index')}}">Back to home page</a>
    </div>
@endsection
