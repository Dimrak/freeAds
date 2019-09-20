@extends('layouts.app')
@section('content')
    <div class="container adminPanel categoryPanel">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
                Categories</a>

        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <ul class="navbar-nav mr-auto">
            @foreach($categories as $category)
                {{--see if the category has any subcategories and if no extra subcatgories will display just that item with this specifications--}}
                @if(count($category->subCategories) === 0)
                    {{--Discard of subcatagories--}}
                @else
                    {{--If not will make the category a dropdown menu--}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$category->title}}</a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            {{--Which would them display the found subcategories--}}
                            @foreach($category->subCategories as $subCategory)
                                <a class="dropdown-item" href={{route('category.show', $subCategory->slug)}}>{{$subCategory->title}}</a>
                            @endforeach
                        </div>
                        @endif
                    </li>
                    @endforeach
        </ul>
        </nav>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    @foreach($categories as $category)
                        @if(count($category->subCategories) !== 0)
                            <a href="{{route('category.show', $category->slug)}}"><strong>{{$category->title}}</strong></a>
                </li>
                        <li class="breadcrumb-item" aria-labelledby="navbarDropdown">
                            {{--Which would them display the found subcategories--}}
                            @foreach($category->subCategories as $subCategory)
                                <a class="dropdown-item" href={{route('category.show', $subCategory->slug)}}>{{$subCategory->title}}</a>
                            @endforeach
                        </li>
                @endif
                @endforeach
                        {{--nothing--}}
                {{--</li>--}}

                        {{--@else--}}
                            {{--<li class="breadcrumb-item" aria-labelledby="navbarDropdown">--}}
                                {{--Which would them display the found subcategories--}}
                                {{--@foreach($category->subCategories as $subCategory)--}}
                                    {{--<a class="dropdown-item" href={{route('category.show', $subCategory->slug)}}>{{$subCategory->title}}</a>--}}
                                {{--@endforeach--}}
                            {{--</li>--}}


            </ol>
        </nav>
        <a class="badge badge-success p-2" href="{{route('admin.index')}}">Back admin page</a>
        <a class="badge badge-warning p-2" href="{{route('category.create')}}">Create category</a>
    </div>


@endsection
