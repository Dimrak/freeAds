@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3 mt-2 w-100 mr-auto ml-auto custom-width-cats">
                <li class="breadcrumb-item"><a href="{{route('category.index')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('category.show', $father )}}">{{ucfirst($father)}}</a></li>
                <li class="breadcrumb-item"><a
                        href="{{route('category.showSub', $subCategory->slug)}}">{{ucfirst($subCategory->title)}}</a>
                </li>
            </ol>
        </nav>
        {{--   <div class="container">--}}
        <div id="categoryIndex" class="flexBox-custom w-100">
            <?php $counter = [];?>
            @foreach($subCategory->subCategories as $subcat)
                <div class="btn btn-outline-primary p-2 rounded w-50 m-2 resize-width">
                    <h5 class="text-left"><a class="text-dark text-dark font-weight-bold"
                                             href="{{route('category.showSubSub',$subcat->slug)}}">{{$subcat->title}}</a>
                        <small class="count-hide">{{array_push($counter, count($subcat->advertCount))}}</small>
                        <small class="d-inline ml-2 text-success font-weight-bolder">({{$number = array_sum($counter)}}
                            )
                        </small>
                        <?php unset($counter)?>
                        <?php $counter = [];?>
                    </h5>
                </div>
            @endforeach
        </div>
        <div id="advertsCategory" class="container w-100">
            <ul class="list-group container w-100">
                {{--This is only showing the adverts which are only in the secondSubcategories, FORD,TOYOTA--}}
                @foreach($subCategory->subCategories as $subcat)
                    @foreach($subcat->advertsCat as $advert)
                        <a href="{{route('advert.show', $advert->slug)}}"
                           class="list-group-item list-group-item-action">{{$advert->title}}</a>
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
            </ul>
        </div>
    </div>
    {{--    </div>--}}
@endsection


