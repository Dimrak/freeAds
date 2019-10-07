@extends('layouts.app')

@section('content')
    <div class="container">
    <nav aria-label="breadcrumb" class="">
        <ol class="breadcrumb p-3 mt-2 w-100 mr-auto ml-auto custom-width-cats">
            <li class="breadcrumb-item"><a href="{{route('category.index')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('category.show', $category->slug)}}">{{ucfirst($category->title)}}</a></li>
        </ol>
    </nav>
        {{--FROM INDEX--}}
        <!--Would loop for the category selected to find for subcat and secondSub and will count how many
        adverts it has each of the secondSubcategories from the subcat, the counter would sum and restart
        each time it would reach a different subcat-->
        <div id="categoryIndex" class="flexBox-custom w-100">
                        <?php $counter = [];?>
                            @foreach($category->subCategories as $subcat)
                            <div class="btn btn-outline-primary p-2 rounded w-50 m-2 resize-width">
                                <h5 class="text-left"><a class="text-dark text-dark font-weight-bold" href="{{route('category.showSub',$subcat->slug)}}">{{$subcat->title}} </a>
                                    @foreach ($subcat->subCategories as $secondSub)
                                        <small class="count-hide">{{array_push($counter, count($secondSub->advertCount))}}</small>
                                    @endforeach
                                        <small class="d-inline ml-2 text-success font-weight-bolder">({{$number = array_sum($counter)}})</small>
                                   <?php unset($counter)?>
                                   <?php $counter = [];?>
                                </h5>
                            </div>
                            @endforeach
                 </div>
    <div id="advertsCategory" class="container w-100">
        <ul class="list-group container w-100">

            {{--This is only showing the adverts which are only in the secondSubcategories--}}
            @foreach($category->subCategories as $subcat)
                @foreach($subcat->subCategories as $secondSub)
                    @foreach($secondSub->advertsCat as $advert)
                    <a href="{{route('advert.show', $advert->slug)}}" class="list-group-item list-group-item-action">{{$advert->title}}</a>
                    <div class="media">
                        <img src="{{$advert->image}}" class="mr-3 img-thumbnail" alt="{{$advert->slug}}">
                        <div class="media-body">
                            <p>{!! html_entity_decode($advert->content)!!}</p>
                            <p>{{$advert->price}}</p>
                            <p>{{$advert->categoryName->title}}</p>
                        </div>
                    </div>

                    @endforeach
                @endforeach
            @endforeach
        </ul>
    </div>
    </div>
        {{--Showing the secondSub--}}

    {{--admin options--}}
    {{--@role('admin')--}}
    {{--<section id="adminCategory" class="container w-50 mb-5 text-center ">--}}
        {{--<div class="card w-50 mr-auto ml-auto">--}}
            {{--<div class="card-header bg-dark text-white">--}}
                {{--Admin options--}}
            {{--</div>--}}
            {{--<div class="card-body">--}}
                {{--<h5 class="card-title">{{$category->title}}</h5>--}}
                {{--<p class="card-text"></p>--}}
                {{--<a href="#" class="btn btn-primary">Go somewhere</a>--}}
                {{--<a href="{{ route('category.edit', $category->slug) }}" class="btn btn-primary">Edit category</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--@endrole--}}
@endsection


