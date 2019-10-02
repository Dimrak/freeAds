@extends('layouts.app')
@section('content')
    <div class="container adminPanel categoryPanel w-25 pt-4">

        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">Categories</a>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    @foreach($categories as $category)
                        <h4 class="bg-dark p-2 rounded"><a href="{{route('category.show',$category->slug)}}" class="btn-link text-decoration-none text-white">{{$category->title}}</a></h4> <!--Instrument-->
                    @foreach($category->subCategories as $subcat)
                            <h6><mark class="pr-1 pl-1 border border-dark">
                                    <a href="{{route('category.showSub', $subcat->slug)}}" class="text-decoration-none text-dark">{{$subcat->title}}</a>
                                </mark></h6>
                        @foreach ($subcat->subCategories as $secondSub)
                                <p><a href="{{route('category.showSubSub',$secondSub->slug)}}">{{$secondSub->title}}</a></p>
                        @endforeach
                    @endforeach

                @endforeach
            </ol>
        </nav>
        <a class="badge badge-success p-2" href="{{route('admin.index')}}">Back admin page</a>
        <a class="badge badge-warning p-2" href="{{route('category.create')}}">Create category</a>
    </div>
    <div id="explanation" class="container bg-dark w-25">

    </div>


@endsection
